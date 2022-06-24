node {
    checkout scm

    // build
    stage("Build"){
        docker.image('shippingdocker/php-composer:7.4').inside('-u root') {
            sh 'rm composer.lock'
            sh 'composer install'
        }
    }


    // Testing
    stage("Test"){
        docker.image('php:7.4-cli').inside('-u root') {
            sh 'php artisan test --testsuite=Unit'
        }
    }

    // Deploy Dev
    stage("Deploy"){
        docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
            sshagent (credentials: ['ssh-dev']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$IP_DEV" > ~/.ssh/known_hosts'
                sh "rsync -rav --delete ./ ubuntu@$IP_DEV:/home/ubuntu/dev.kelasdevops.xyz/ --exclude=.env --exclude=storage --exclude=.git"
            }
        }
    }

    // Integration test
    stage("Test"){
        docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
            sshagent (credentials: ['ssh-dev']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$IP_DEV" > ~/.ssh/known_hosts'
                sh "ssh ubuntu@$IP_DEV 'cd /home/ubuntu/dev.kelasdevops.xyz/ && php artisan test --testsuite=Feature'"
            }
        }
    }
}
