<?php
spl_autoload_register(function($class){
    require_once(__DIR__."\..\models\\$class.php");
});

class UserController
{
    public function r()
    {
        $index['title'] = 'Регистрация';
        // Объявим переменые, что не возникало ошибок
        $login = false;
        $email = false;
        $password = false;
        // Обработка формы
        if (isset($_POST['register'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $user[] = $login;
            $user[] = $password;
            $password = $_POST['password'];
            if (!User::checkPassword($password)) $errors[] = 'Вы не ввели пароль, пароль меньше 6-х символов';
            if (!User::checkName($login)) $errors[] = 'Логин меньше 3-х символов';
            if (!User::checkEmail($email)) $errors[] = 'Не верно указан E-mail';
            else {
                // Проверяем существует ли пользователь
                $checkEmail = User::checkUserEmail($email);
                $checkLogin = User::checkUserLogin($login);
                if ($checkLogin == true) $errors[] = 'Пользователь с таким Логином, уже зарегистрирован, введите другой Логин';
                if ($checkEmail == true) $errors[] = 'Пользователь с таким E-mail, уже зарегистрирован, введите другой E-mail';
                else {
                    $hashed_password = User::generateHash($password); // Сохраняем Хеш пароля
                    if (User::register($login, $email, $hashed_password)) {
                        session_start();
                        $_SESSION['logged_user'] = $user;
                        header('Location:/rotator/views/');
                    }
                }
            }

        }
        if (isset($_POST['log_in'])) {
            $login = $_POST['login'];
            $password = md5($_POST['password']);
            $user[] = $login;
            $user[] = $password;

            // Проверяем существует ли пользователь
            $checkLogin = User::checkUserLogin($login);
            $checPassword = User::checkUserPassword($password);
            if ($checkLogin == false) $errors[] = 'Пользователь с таким логином, не найден';
            if ($checPassword == false) $errors[] = 'Вы ввели пароль не правельно';
            else {
                session_start();
               // echo "Вы вошли!".$_SESSION['logged_user'][0];
                $_SESSION['logged_user'] = $user;
                header('Location:/rotator/views/admin/');

            }
        }
        require_once(__DIR__ . '/../views/parts/R&L.php');

    }



    public function logout() {
        session_start();
        unset($_SESSION['logged_user']);
        header('Location:/rotator/views/');
    }
}





















