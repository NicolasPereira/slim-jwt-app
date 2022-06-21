<?php
declare(strict_types=1);

namespace App\Domain\User;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table(name: 'users')]
final class User
{
    #[Id, Column(type: 'integer'), GeneratedValue(strategy: 'AUTO')]
    public readonly  int $id;
    #[Column(type: 'string', nullable: false)]
    public string $name;
    #[Column(type: 'string', unique: true, nullable: false)]
    public readonly string $email;
    #[Column(type: 'string', nullable: false)]
    public  string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->hashPassword($password);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    private function hashPassword(string $password) : void
    {
        $this->setPassword(password_hash($password, PASSWORD_ARGON2I));
    }
}
