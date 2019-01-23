<?php
class User {

    function generateHash($password) {
//        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
//            $salt = '$2y$11$' .substr(md5(uniqid(rand(), true)), 0, 22);
            return md5($password);
        }
    public static function checkName($name)
    {
        if (strlen($name) >= 2) return true;
        else return false;
    }
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) return true;
        else return false;
    }
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    }
    public static function checkUserEmail($email)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
        $query = 'SELECT * FROM users WHERE email = :email';
        $result = $pdo->prepare($query);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return true;
        else return false;
    }

    public static function checkUserLogin($login)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
        $query = 'SELECT * FROM users WHERE login = :login';
        $result = $pdo->prepare($query);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return true;
        else return false;
    }
    public static function checkUserPassword($password)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
        $query = 'SELECT * FROM users WHERE password = :password';
        $result = $pdo->prepare($query);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return true;
        else return false;
    }

    public static function register($login, $email, $password)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=rotator", 'root', '');
        $query = 'INSERT INTO users (login, email, password) VALUES (:login, :email, :password)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $pdo->prepare($query);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
}