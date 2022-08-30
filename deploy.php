<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/php-fpm.php';
require 'contrib/npm.php';

// Config

set('repository', 'git@github.com:radoslavtomas/aspekt.git');
set('php_fpm_version', '8.1');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('dev')
    ->setHostname('139.177.183.107')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '/var/www/html/aspekt-dev')
    ->set('branch', 'main');

// Hooks

after('deploy:failed', 'deploy:unlock');

// import:
//   - recipe/laravel.php
//   - contrib/php-fpm.php
//   - contrib/npm.php

// config:
//   application: "aspekt"
//   remote_user: "rado"
//   repository: "git@github.com:radoslavtomas/aspekt.git"
//   base_deploy_path: "/var/www/html"
//   php_fpm_version: "8.1"

// hosts:
//   dev:
//     hostname: "139.177.183.107"
//     deploy_path: "{{base_deploy_path}}/dev.{{application}}"

// tasks:
//   deploy:
//     - deploy:prepare
//     - deploy:vendors
//     - artisan:storage:link
//     # - artisan:view:cache
//     # - artisan:config:cache
//     # - artisan:down
//     # - artisan:migrate
//     # - artisan:up
//     # - npm:install
//     # - npm:run:prod
//     - deploy:publish
//     - php-fpm:reload
//   npm:run:prod:
//     - run: "cd {{release_path}} && npm run prod"

// after:
//   deploy:failed: deploy:unlock
