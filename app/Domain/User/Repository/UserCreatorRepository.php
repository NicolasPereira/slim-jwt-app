<?php
namespace App\Domain\User\Repository;

use App\Domain\User\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class UserCreatorRepository
{
    public function __construct(private EntityManager $em)
    {
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function insert(array $user): int
    {
        $userCreate = new User($user['name'], $user['email'], $user['password']);
        $this->em->persist($userCreate);
        $this->em->flush();
        return $userCreate->id;
    }
}