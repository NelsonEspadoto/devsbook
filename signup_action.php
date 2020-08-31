<?php
require 'config.php';
require 'models/Auth.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$birthday = filter_input(INPUT_POST, 'birthday'); //00/00/0000

if ($name && $email && $password && $birthday) {
    $auth = new Auth($pdo, $base);

    $birthday = explode('/', $birthday);
    if (count($birthday) != 3) {
        $_SESSION['flash'] = 'Data de Nascimento Inválida.';
        header("Location: ".$base."/signup.php");
        exit;
    }

    $birthday = $birthday[2].'-'.$birthday[1].'-'.$birthday[0];
    if (strtotime($birthday) === false) {
        $_SESSION['flash'] = 'Data de Nascimento Inválida';
        header("Location: ".$base."/signup.php");
        exit;
    }

    if ($auth->emailExists($email) === false) {
        try {
            $auth->registerUser($name, $email, $password, $birthday);
            header("Location: ".$base);
            exit;
        } catch (PDOException $th) {
            echo $th;
            exit;
        }
    } else {
        $_SESSION['flash'] = 'E-mail já cadastrado.';
        header("Location: ".$base."/signup.php");
        exit;
    }
}

$_SESSION['flash'] = "Campos não enviados.";
header("Location: ".$base."/signup.php");
exit;
