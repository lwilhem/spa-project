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
            INSERT INTO `user` (`email`, `username`, `password`, `admin`)
            VALUES (:email, :username , :password, :admin)
            ');

        $query->execute([
            'email' => $user->email,
            'username' => $user->username,
            'password' => password_hash($user->password, PASSWORD_ARGON2I),
            'admin' => 0,
        ]);
    }

    public function getUsers(): array
    {
        $users = [];

        $query = $this->connection->query('SELECT * FROM `user`');

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['email'], $row['password'], $row['username']);
            $users[] = $user;
        }
        //var_dump($users);
        return $users;
    }

    public function userLogin(Auth $auth): void
    {
        //var_dump($auth);

        $query = $this->connection->query('
            SELECT * FROM `user`
            WHERE `username`="'. $auth->userName .'"
            ');
        $count = $query->rowCount();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $verify = password_verify($auth->userPassword, $row['password']);

        if($verify === true && $count == 1 && !empty($row))
        {
            $_SESSION['isAdmin'] = $row['admin'];
            $_SESSION['userId'] = $row['id'];
            $_SESSION['username'] = $row['username'];
        }else{
            echo 'Incorrect Password or Username';
        }

        //var_dump($count);
    }
}


