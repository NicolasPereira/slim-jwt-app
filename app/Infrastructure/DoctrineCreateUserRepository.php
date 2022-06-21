<?php
namespace App\Infrastructure;

use App\Domain\User\DTO\CreateUserDTO;
use App\Domain\User\Repository\UserCreatorRepository;
use App\Domain\User\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class DoctrineCreateUserRepository implements UserCreatorRepository
{
    public function __construct(private EntityManager $em)
    {
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function insert(CreateUserDTO $userDTO): int
    {
        $userCreate = new User($userDTO->name, $userDTO->email, $userDTO->password);
        $this->em->persist($userCreate);
        $this->em->flush();
        return $userCreate->id;
    }
}
