pipeline {
    agent any
    stages {
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
                    sh '''
                        ssh -o StrictHostKeyChecking=no ec2-user@13.236.92.137 whoami
                    '''
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
        stage("Run Composer Install") {
            steps {
                sh 'docker compose run --rm composer install'
            }
        }
        stage("Populate .env file") {
            steps {
                script {
                    sh 'cp /Users/laodeshaldanfalih/.jenkins/workspace/envs/trinity-app-test/.env ${WORKSPACE}/.env'
                }
            }
        }
        stage("Run Tests") {
            steps {
                sh 'docker compose run --rm artisan test'
            }
        }
    }
    post {
        success{
            sh 'cd /Users/laodeshaldanfalih/.jenkins/workspace/trinity-app'
            sh 'rm -rf artifact.zip'
            sh 'zip -r artifact.zip . -x "*node_modules**"'
            withCredentials([sshUserPrivateKey(credentialsId: "aws-ec2", keyFileVariable: 'keyfile')]) {
                sh 'scp -v -o StrictHostKeyChecking=no -i ${keyfile} /Users/laodeshaldanfalih/.jenkins/workspace/trinity-app/artifact.zip ec2-user@13.236.92.137:/home/ec2-user/artifact'
            }
            sshagent(credentials: ['aws-ec2']) {
                sh '''
                    ssh -o StrictHostKeyChecking=no ec2-user@13.236.92.137 'sudo mkdir -p /var/www/html'
                    ssh -o StrictHostKeyChecking=no ec2-user@13.236.92.137 'unzip -o /home/ec2-user/artifact/artifact.zip -d /var/www/html'
                '''
                script {
                    try {
                        sh 'ssh -o StrictHostKeyChecking=no ec2-user@13.236.92.137 sudo chmod 777 /var/www/html/storage -R'
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
