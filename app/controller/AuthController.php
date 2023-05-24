<?php

require_once __DIR__ . '/../model/ModelAttendee.php';

class AuthController {
    # Return all events

    public static function login() {
        #array of ModelEvent objects


        require __DIR__ . '/../view/auth/login.php';
    }

    public static function register() {
        require __DIR__ . '/../view/auth/register.php';
    }

    public static function loginUser() {
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password'], false);

        $user = ModelAttendee::validateLogin($username, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=events&function=index');
            die();
        } 
        
        $errors['login'] = "Wrong username/password combination.";
        require __DIR__ . '/../view/auth/login.php';
    }

    public static function registerUser() {
        # check if username exists 
        ModelAttendee::createUser($_POST['username'], $_POST['password']);
        
        $user = ModelAttendee::validateLogin($_POST['username'], hash('sha256', $_POST['password'], false));
        
        $_SESSION['user'] = $user;
        
        header('Location: http://solace.ist.rit.edu/~ao3886/iste-341/Project1/index.php?route=events&function=index');
        die();
    }

    public static function logout() {
        unset($_SESSION['user']);

        require __DIR__ . '/../view/auth/login.php';
    }

}
