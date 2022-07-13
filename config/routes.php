<?php

use App\Action\HomeAction;
use App\Action\LoginAction;
use App\Action\UserCreateAction;
use App\Middleware\AuthMiddleware;
use Slim\App;

return function (App $app) {
    $app->post('/', HomeAction::class)
            ->setName('home')
            ->add(AuthMiddleware::class);
    $app->get('/info', function () {
       phpinfo();
    });
    $app->post('/users', UserCreateAction::class);
    $app->post('/login', LoginAction::class);
};
