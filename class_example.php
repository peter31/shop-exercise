<?php declare(strict_types=1);

class User
{
    private $id;
    private $name;
    private $status;

    public function __construct(int $id, string $name, bool $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFirstName(): string
    {
        list($firstName) = explode(' ', $this->name);

        return $firstName;
    }

    public function getLastName(): string
    {
        list(, $lastName) = explode(' ', $this->name);

        return $lastName;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }
}

$userArr = [
    'id' => 1,
    'name' => 'Jhon Doe',
    'status' => true,
];

$user = new User($userArr['id'], $userArr['name'], $userArr['status']);
var_dump($user->getFirstName()); // Doe
