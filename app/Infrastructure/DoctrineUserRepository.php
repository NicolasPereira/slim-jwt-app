<?php
namespace App\Infrastructure;

use App\Domain\User\Repository\UserRepository;
use App\Domain\User\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class DoctrineUserRepository implements UserRepository
{
    public function __construct(private EntityManager $em)
    {
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function insert(User $user): int
    {
        $this->em->persist($user);
        $this->em->flush();
        return $user->id;
    }

    public function findBy(string $property, string $valueProperty): User | null
    {
        return $this->em->getRepository(User::class)->findOneBy(array($property => $valueProperty));
    }
}
