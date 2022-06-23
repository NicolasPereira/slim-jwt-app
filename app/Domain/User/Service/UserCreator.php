<?php
declare(strict_types=1);

namespace App\Domain\User\Service;


use App\Domain\User\DTO\CreateUserDTO;
use App\Domain\User\Repository\UserCreatorRepository;
use App\Domain\User\User;
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
    public function createUser(CreateUserDTO $userDTO): int
    {
        $this->validateUser($userDTO);
        $user = new User($userDTO->name, $userDTO->email, $userDTO->password);
        return $this->repository->insert($user);
    }

    /**
     * @throws \Exception
     */
    private function validateUser(CreateUserDTO $userDTO): void
    {
        $errors = null;

        if (empty($userDTO->name)) {
            $errors['name'] = 'Input required';
        }

        if (empty($userDTO->password)) {
            $errors['password'] = 'Input required';
        }
        if (is_null($userDTO->email)) {
            $errors['email'] = 'Input required';
        } elseif (filter_var($userDTO->email, FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Invalid email address';
        }
        if ($errors) {
            throw new ValidationException('Please check your input', $errors, 422);
        }
    }
}
