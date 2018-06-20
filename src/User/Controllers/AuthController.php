<?php
namespace User\Controllers;

use Common\Controllers\AbstractController;

class AuthController extends AbstractController
{
    public function login()
    {
        $errors = [];
        if (array_key_exists('saved_data', $_SESSION)) {
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        $this->twig->display('@User/login.html.twig', [
            'errors' => $errors
        ]);
    }

    private function loginValidation($arr)
    {
        $errors = [];

        if (empty($arr['name']) || empty($arr['password'])) {
            $errors[] = 'All fields must be completed !';
        } else {
            $sqlQuery = sprintf('SELECT * FROM users WHERE name = "%s"', $this->mysql->escape_string($_POST['name']));
            $user = $this->mysql->query($sqlQuery)->fetch_assoc();
            if ($user['name'] !== $_POST['name'] || $user['password'] !== $_POST['password']) {
                $errors[] = 'Wrong username or password !';
            }
        }
        return $errors;
    }

    public function loginAction()
    {
        $errors = $this->loginValidation($_POST);

        if (empty($errors)) {
            $_SESSION['user_login_name'] = $_POST['name'];
            $this->redirect('/');
        } else {
            $_SESSION['saved_data']['errors'] = $errors;
            $this->redirect('/user/login');
        }
    }

    public function logoutAction()
    {
        unset($_SESSION['user_login_name']);
        $this->redirect('/');
    }

    public function registration()
    {

        $user = [];
        $errors = [];

        if (array_key_exists('saved_data', $_SESSION)) {
            $user = $_SESSION['saved_data']['user'];
            $errors = $_SESSION['saved_data']['errors'];
            unset($_SESSION['saved_data']);
        }

        $this->twig->display('@User/registration.html.twig', [
            'user'   => $user,
            'errors' => $errors
        ]);
    }

    private function registrationValidation($arr)
    {
        $errors = [];

        if (empty($arr['name']) || empty($arr['email']) || empty($arr['password']) || empty($arr['password2'])) {
            $errors[] = 'All fields must be completed !';
        }

        if ($arr['password'] !== $arr['password2']) {
            $errors[] = 'Wrong password !';
        }

        if (!empty($arr['email'])) {
            if (filter_var($arr['email'], FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'Is not a valid email address';
            } else {
                $sqlQuery = sprintf('SELECT * FROM users WHERE email = "%s"', $this->mysql->escape_string($_POST['email']));
                $result = $this->mysql->query($sqlQuery);
                if ($result->num_rows !== 0) {
                    $errors[] = 'User with this email already exists';
                }
            }
        }
        return $errors;
    }

    public function registrationAction()
    {
        $errors = $this->registrationValidation($_POST);

        if (empty($errors)) {
            $sqlQuery = sprintf(
                'INSERT INTO users SET name = "%s", email = "%s", password = "%s"',
                $this->mysql->escape_string($_POST['name']),
                $this->mysql->escape_string($_POST['email']),
                $this->mysql->escape_string($_POST['password'])
            );
            $this->mysql->query($sqlQuery);
            $this->redirect('/');
        } else {
            $_SESSION['saved_errors'] = $errors;
            $_SESSION['saved_data'] = $_POST;
            $this->redirect('/user/registration');
        }
    }
}
