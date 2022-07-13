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
    public function __construct(
        private ValidateAuthenticateUser $validateUser,
        private ResponseInterface $response
    ){
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $token = $request->getHeader('Authorization');
        $token = str_replace('Bearer ', '', $token);
        $userId = $this->decodeToken($token[0]);
        if($userId) {
            $request->withAddedHeader('userId', $userId);
            return $handler->handle($request);
        }
        $result = [
            'message' => 'Usuário não autenticado',
        ];
        $this->response->getBody()->write(json_encode($result));

        return $this->response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    private function decodeToken(string $token): ?int
    {
        return ($this->validateUser)($token);
    }
}