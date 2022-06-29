<?php

use App\Domain\User\Repository\UserRepositoryContract;
use App\Infrastructure\DoctrineUserRepositoryContract;
use App\Infrastructure\Factory\EntityManagerFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

return [
    EntityManager::class => DI\factory(function(ContainerInterface $container): EntityManagerInterface {
        return EntityManagerFactory::create($container);
    }),
   UserRepositoryContract::class => \DI\autowire(DoctrineUserRepositoryContract::class)
];
