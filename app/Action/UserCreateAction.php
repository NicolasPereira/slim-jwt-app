<?php

namespace App\Action;

use App\Domain\User\DTO\CreateUserDTO;
use App\Domain\User\Service\UserCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UserCreateAction
{
    public function __construct(private UserCreator $userCreator)
    {
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface{
       $data = json_decode($request->getBody(), true);
       $createUserDTO = CreateUserDTO::create($data);
       $userId = $this->userCreator->createUser($createUserDTO);
       $result = [
           'userId' => $userId
       ];
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}