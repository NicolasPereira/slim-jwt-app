<?php
declare(strict_types=1);

namespace App\Domain\User\Service;


use App\Domain\User\Repository\UserCreatorRepository;
use App\Exception\ValidationException;

final class UserCreator
{
    public function __construct(private UserCreatorRepository $repository)
    {
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\Exception\ORMException
     * @throws \Exception
     */
    public function createUser(array $data): int
    {
        $this->validateUser($data);
        $data['password'] = $this->hashPassword($data['password']);
        return $this->repository->insert($data);
    }

    /**
     * @throws \Exception
     */
    private function validateUser($data): void
    {
        $errors = null;

        if (empty($data['name'])) {
            $errors['name'] = 'Input required';
        }

        if (empty($data['password'])) {
            $errors['password'] = 'Input required';
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
    private function hashPassword(string $password) : string
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }
}
