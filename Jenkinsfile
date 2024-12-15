pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/akaunting/akaunting'
            }
        }
        stage('Install Dependencies') {
            steps {
                sh 'composer install'
            }
        }
        stage('Run Tests') {
            steps {
                sh 'php artisan test'
            }
        }
        stage('Build Docker Image') {
            steps {
                sh 'docker build -t akaunting-app .'
            }
        }
        stage('Deploy to Kubernetes') {
            steps {
                sh 'kubectl apply -f deployment.yaml'
            }
        }
    }
}
