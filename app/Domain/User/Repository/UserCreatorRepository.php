<?php
namespace App\Domain\User\Repository;

interface UserCreatorRepository
{
    public function insert(array $user): int;
}