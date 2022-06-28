<?php
declare(strict_types=1);

namespace App\Domain\Auth\Service;

use App\Domain\Auth\DTO\UserLoginDTO;
use App\Domain\User\Repository\UserRepository;
use App\Domain\User\User;
use Firebase\JWT\JWT;

class AuthenticateUser
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function validateUser(UserLoginDTO $userLoginDTO)
    {
        $user = $this->repository->findBy('email', $userLoginDTO->email);

        if (is_null($user)) {
            throw new \Exception('Usuário não encontrado! Crie uma conta', 422);
        }

        if (!$user->validatePassword($userLoginDTO->password)) {
            throw new \Exception('Login ou senhas incorretos', 422);
        }
        return $this->createToken($user);

    }
    private function createToken(User $user)
    {
       return JWT::encode([
           'id' => $user->id,
           'username' => $user->name,
           'email' => $user->email,
           'login_at' =>  date("Y-m-d H:i:s"),
        ],
           //TODO melhorar essa chave de encriptação, utilizar o esquema de .env pra armazenar essa key
           "minha-chave-secreta",
           "HS256");
    }

}
