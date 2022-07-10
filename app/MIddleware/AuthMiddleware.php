<?php
declare(strict_types=1);
namespace App\Middleware;

use App\Domain\Auth\Service\ValidateAuthenticateUser;
use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{
    public function __construct(private ValidateAuthenticateUser $validateUser)
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $token = $request->getHeader('Authorization');
        $token = str_replace('Bearer', '', $token);
        if($this->decodeToken($token)) {
            return $handler->handle($request);
        }
        $response = [
            'message' => 'Usuário não autenticado',
        ]
        return $handler->
    }

    private function decodeToken(string $token): bool
    {
        return ($this->validateUser)($token);
    }
}