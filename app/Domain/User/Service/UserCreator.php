<?php
declare(strict_types=1);

namespace App\Domain\User\Service;


use App\Exception\ValidationException;

final class UserCreator
{
    public function __construct()
    {
    }

    public function createUser(array $data): int
    {
        $this->validateUser($data);
        //ainda falta criar a persistencia
        //$userId = $this->repository->save($data);
        //return $userId;

        return 0;
    }

    private function validateUser(): void
    {
        $errors = [];

        if (empty($data['username'])) {
            $errors['username'] = 'Input required';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'Input required';
        } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Invalid email address';
        }

        if ($errors) {
            throw new ValidationException('Please check your input', $errors, 422);
        }
    }
}