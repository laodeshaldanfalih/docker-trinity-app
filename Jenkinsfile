pipeline {
    agent any
    stages {
        stage("Verify tooling") {
            steps {
                bat '''
                    docker info
                    docker version
                    docker-compose version
                '''
            }
        }
        // stage("Verify SSH connection to server") {
        //     steps {
        //         sshagent(credentials: ['aws-ec2']) {
        //             bat '''
        //                 "C:\\Program Files\\Git\\usr\\bin\\ssh.exe" -o StrictHostKeyChecking=no ec2-user@3.27.114.56 whoami
        //             '''
        //         }
        //     }
        // }
        stage("Clear all running docker containers") {
            steps {
                script {
                    try {
                        bat 'docker rm -f $(docker ps -a -q)'
                    } catch (Exception e) {
                        echo 'No running container to clear up...'
                    }
                }
            }
        }
        stage("Start Docker") {
            steps {
                bat 'docker-compose up -d'
                bat 'docker-compose ps'
            }
        }
        stage("Run Composer Install") {
            steps {
                bat 'docker-compose run --rm composer install'
            }
        }

        stage("Populate .env file") {
            steps {
                script {
                    bat 'copy C:\Pengembangan Sistem Operasi\docker-trinity-app\.env'
                }
            }
        }
        stage("Run Tests") {
            steps {
                bat 'docker-compose run --rm artisan test'
            }
        }
    }
    post {
        // success {
        //     bat 'cd C:\\Users\\laodeshaldanfalih\\.jenkins\\workspace\\trinity-app'
        //     bat 'del /f /q artifact.zip'
        //     bat 'tar -a -c -f artifact.zip . --exclude=*node_modules**'
        //     withCredentials([sshUserPrivateKey(credentialsId: "aws-ec2", keyFileVariable: 'keyfile')]) {
        //         bat 'scp -v -o StrictHostKeyChecking=no -i %keyfile% C:\\Users\\laodeshaldanfalih\\.jenkins\\workspace\\trinity-app\\artifact.zip ec2-user@3.27.114.56:/home/ec2-user/artifact'
        //     }
        // }
        always {
            bat 'docker-compose down --remove-orphans -v'
            bat 'docker-compose ps'
        }
    }
}
