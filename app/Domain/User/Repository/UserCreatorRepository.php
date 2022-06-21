<?php
namespace App\Domain\User\Repository;

use App\Domain\User\DTO\CreateUserDTO;

interface UserCreatorRepository
{
    public function insert(CreateUserDTO $userDTO): int;
}
