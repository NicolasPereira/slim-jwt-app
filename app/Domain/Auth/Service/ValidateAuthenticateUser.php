<?php

namespace App\Domain\Auth\Service;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ValidateAuthenticateUser
{
    public function __invoke(string $hash): ?int
    {
        $user = JWT::decode($hash, new Key('minha-chave-secreta', 'HS256'));
        return ($user->id);
    }
}