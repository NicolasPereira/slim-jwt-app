<?php

use App\Action\HomeAction;
use Slim\App;

return function (App $app) {
    $app->get('/', HomeAction::class)->setName('home');
    $app->get('/info', function () {
       phpinfo();
    });

};