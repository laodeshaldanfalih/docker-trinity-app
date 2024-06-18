pipeline {
    agent any

    environment {
        // Terraform
        TF_VAR_aws_region = 'ap-southeast-2'
        TF_VAR_instance_ami = 'ami-080660c9757080771'
        TF_VAR_instance_type = 't2.micro'
        TF_VAR_key_name = 'key-for-ec2'

        // SonarQube
        SONARQUBE_URL = 'http://sonarqube:9000' // Adjust the URL if SonarQube is running on a different port or host
        SONARQUBE_LOGIN = credentials('sonarqube') // Replace with your actual credentials ID
    }

    stages {
        stage("Terraform Init") {
            steps {
                script {
                    sh 'terraform --version'
                    sh 'terraform init'
                }
            }
        }
        stage("Terraform Apply") {
            steps {
                script {
                    sh 'terraform apply -auto-approve'
                    sh 'terraform output -json > tf-output.json'
                }
            }
        }
        stage("Parse Terraform Output") {
            steps {
                script {
                    def output = readJSON file: 'tf-output.json'
                    env.PUBLIC_IP = output.public_ip.value
                }
            }
        }
        stage("Verify tooling") {
            steps {
                sh '''
                    docker info
                    docker version
                    docker compose version
                '''
            }
        }
        stage("Verify SSH connection to server") {
            steps {
                sshagent(credentials: ['aws-ec2']) {
                    sh """
                        ssh -o StrictHostKeyChecking=no ubuntu@${PUBLIC_IP} whoami
                    """
                }
            }
        }
        stage("Clear all running docker containers") {
            steps {
                script {
                    try {
                        sh 'docker rm -f $(docker ps -a -q)'
                    } catch (Exception e) {
                        echo 'No running container to clear up...'
                    }
                }
            }
        }
        stage("Start Docker") {
            steps {
                sh 'make up'
                sh 'docker compose ps'
            }
        }
        stage("Populate .env file") {
            steps {
                script {
                    sh 'cp .env.example .env'
                }
            }
        }
        stage("Run Composer Install") {
            steps {
                sh 'docker compose run --rm composer install'
            }
        }
        stage("Run Laravel Key") {
            steps {
                sh 'docker compose run artisan key:generate'
            }
        }
        stage("Run Laravel Migration") {
            steps {
                sh 'docker compose run artisan migrate'
            }
        }
        stage("Run Tests") {
            steps {
                sh 'docker compose run --rm artisan test'
            }
        }
        stage('SonarQube analysis') {
            steps {
                script {
                    def dockerImage = docker.image('sonarsource/sonar-scanner-cli:latest')
                    dockerImage.pull()
                    dockerImage.inside("-e SONAR_HOST_URL=${env.SONARQUBE_URL} -e SONAR_LOGIN=${env.SONARQUBE_LOGIN} -v ${WORKSPACE}:/usr/src") {
                        sh 'sonar-scanner'
                    }
                }
            }
        }
    }
    post {
        success {
            sh 'cd /Users/laodeshaldanfalih/.jenkins/workspace/trinity-app'
            sh 'rm -rf artifact.zip'
            sh 'zip -r artifact.zip . -x "*node_modules**"'
            withCredentials([sshUserPrivateKey(credentialsId: "aws-ec2", keyFileVariable: 'keyfile')]) {
                sh """
                    scp -v -o StrictHostKeyChecking=no -i ${keyfile} /Users/laodeshaldanfalih/.jenkins/workspace/trinity-app/artifact.zip ubuntu@${PUBLIC_IP}:/home/ubuntu/artifact
                """
            }
            sshagent(credentials: ['aws-ec2']) {
                sh """
                    ssh -o StrictHostKeyChecking=no ubuntu@${PUBLIC_IP} 'sudo mkdir -p /var/www/html'
                    ssh -o StrictHostKeyChecking=no ubuntu@${PUBLIC_IP} 'unzip -o /home/ubuntu/artifact/artifact.zip -d /var/www/html'
                """
                script {
                    try {
                        sh "ssh -o StrictHostKeyChecking=no ubuntu@${PUBLIC_IP} sudo chmod 777 /var/www/html/storage -R"
                    } catch (Exception e) {
                        echo 'Some file permissions could not be updated.'
                    }
                }
            }
        }
        always {
            sh 'docker compose down --remove-orphans -v'
            sh 'docker compose ps'
        }
    }
}
