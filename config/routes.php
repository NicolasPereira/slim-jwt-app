<?php

use App\Action\HomeAction;
use App\Action\LoginAction;
use App\Action\UserCreateAction;
use Slim\App;

return function (App $app) {
    $app->get('/', HomeAction::class)->setName('home');
    $app->get('/info', function () {
       phpinfo();
    });
    $app->post('/users', UserCreateAction::class);
    $app->post('/login', LoginAction::class);

};