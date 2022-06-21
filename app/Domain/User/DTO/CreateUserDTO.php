<?php
namespace App\Domain\User\DTO;

final class CreateUserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password
    ) {
    }

    public static function create(array $user): CreateUserDTO
    {
        return new CreateUserDTO($user['name'], $user['email'], $user['password']);
    }
}