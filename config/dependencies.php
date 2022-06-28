<?php

use App\Domain\User\Repository\UserRepository;
use App\Infrastructure\DoctrineUserRepository;
use App\Infrastructure\Factory\EntityManagerFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

return [
    EntityManager::class => DI\factory(function(ContainerInterface $container): EntityManagerInterface {
        return EntityManagerFactory::create($container);
    }),
   UserRepository::class => \DI\autowire(DoctrineUserRepository::class)
];
