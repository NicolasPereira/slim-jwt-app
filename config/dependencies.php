<?php

use App\Domain\User\Repository\UserCreatorRepository;
use App\Infrastructure\DoctrineCreateUserRepository;
use App\Infrastructure\Factory\EntityManagerFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

return [
    EntityManager::class => DI\factory(function(ContainerInterface $container): EntityManagerInterface {
        return EntityManagerFactory::create($container);
    }),
   UserCreatorRepository::class => \DI\autowire(DoctrineCreateUserRepository::class)
];
