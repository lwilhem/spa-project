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
            INSERT INTO `user` (`email`, `first_name`, `last_name`, `password`, `admin`)
            VALUES (:email, :first_name, :last_name, :password, :admin)
            ');

        $query->execute([
            'email' => $user->email,
            'first_name' => $user->firstname,
            'last_name' => $user->lastname,
            'password' => password_hash($user->password, PASSWORD_ARGON2I),
            'admin' => 0,
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

    public function userLogin(Auth $auth): void
    {
        //var_dump($auth);

        $query = $this->connection->query('
            SELECT * FROM `user`
            WHERE `first_name`="'. $auth->userFirstName .'" and `last_name`="'. $auth->userLastName .'"
            ');
        $count = $query->rowCount();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $verify = password_verify($auth->userPassword, $row['password']);

        if($verify === true && $count == 1 && !empty($row))
        {
            $_SESSION['isAdmin'] = $row['admin'];
            $_SESSION['userId'] = $row['id'];
            $_SESSION['userFirstName'] = $row['first_name'];
            $_SESSION['userLastName'] = $row['last_name'];
        }else{
            echo 'error';
        }

        //var_dump($count);
    }
}


