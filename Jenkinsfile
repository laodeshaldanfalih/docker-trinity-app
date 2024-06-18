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
        stage("Run Migrations") {
            steps {
                bat 'docker-compose run --rm artisan migrate'
            }
        }

        stage("Populate .env file") {
            steps {
                dir("C:/ProgramData/Jenkins/.jenkins/workspace/envs/docker-trinity-app") {
                    fileOperations([fileCopyOperation(excludes: '', flattenFiles: true, includes: '.env', targetLocation: "${WORKSPACE}")])
                }
            }
        }

        stage("Run Tests") {
            steps {
                bat 'docker-compose run --rm artisan test --log-junit storage/test-results/results.xml'
            }
        }
    }
    post {
        always {
            junit 'storage/test-results/*.xml'
            archiveArtifacts artifacts: 'storage/logs/laravel.log', allowEmptyArchive: true
            bat 'docker-compose down --remove-orphans -v'
            bat 'docker-compose ps'
        }
    }
}
