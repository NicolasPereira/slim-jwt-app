<?php

namespace App\Action;

use App\Domain\Auth\DTO\UserLoginDTO;
use App\Domain\Auth\Service\AuthenticateUser;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginAction
{
    public function __construct(private AuthenticateUser $authenticateUser)
    {
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface
    {
        $user = json_decode($request->getBody(), true);
        $userLoginDTO = UserLoginDTO::create($user);
        $auth = $this->authenticateUser->validateUser($userLoginDTO);
        $result = [
            'token' => $auth
        ];
        $response->getBody()->write(json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}