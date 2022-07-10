<?php

namespace App\Domain\Auth\Service;

use Firebase\JWT\JWT;

class ValidateAuthenticateUser
{
    public function __invoke(string $hash): bool
    {
        $user = JWT::decode($hash, 'minha-chave-secreta');
        return (is_object($user));
    }
}