<?php
namespace App\Domain\User\Repository;

use App\Domain\User\User;

interface UserRepository
{
    public function insert(User $user): int;

    public function findBy(string $property, string $valueProperty): User | null;
}
