<?php
namespace App\Domain\User\Repository;

use App\Domain\User\User;

interface UserCreatorRepository
{
    public function insert(User $user): int;
}
