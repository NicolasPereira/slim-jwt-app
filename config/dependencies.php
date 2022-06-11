<?php

use App\Infrastructure\Factory\EntityManagerFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

return [
    EntityManager::class => DI\factory(function(ContainerInterface $container): EntityManagerInterface {
        return EntityManagerFactory::create($container);
    }),
];