<?php

class Database
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=127.0.0.1:3306;dbname=php-poo-bdd', 'root', 'root');
    }

    public function createUser(User $user): void
    {
        $query = $this->connection->prepare('
            INSERT INTO `user` (`email`, `first_name`, `last_name`, `password`)
            VALUES (:email, :first_name, :last_name, :password)
            ');

        $query->execute([
            'email' => $user->email,
            'first_name' => $user->firstname,
            'last_name' => $user->lastname,
            'password' => password_hash($user->password, PASSWORD_ARGON2I),
        ]);
    }

    public function getUsers(): array
    {
        $users = [];

        $query = $this->connection->query('SELECT * FROM `user`');

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['email'], $row['password'], $row['first_name'], $row['last_name']);
            $users[] = $user;
        }
        var_dump($users);
        return $users;
    }
}


