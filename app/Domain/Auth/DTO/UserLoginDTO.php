<?php
namespace App\Domain\Auth\DTO;

class UserLoginDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password
    ){
    }

    public static function create(array $payload): self
    {
        return new self($payload['email'], $payload['password']);
    }
}