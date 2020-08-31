<<<<<<< HEAD
<?php
require 'config.php';
require 'models/Auth.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');

if ($email && $password) {
    $auth = new Auth($pdo, $base);

    if ($auth->validateLogin($email, $password)) {
        header("Location: ".$base);
        exit;
    }
}

$_SESSION['flash'] = "E-mail e/ou Senha inválidos.";
header("Location: ".$base."/login.php");
=======
<?php
require 'config.php';
require 'models/Auth.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');

if ($email && $password) {
    $auth = new Auth($pdo, $base);

    if ($auth->validateLogin($email, $password)) {
        header("Location: ".$base);
        exit;
    }
}

$_SESSION['flash'] = "E-mail e/ou Senha inválidos.";
header("Location: ".$base."/login.php");
>>>>>>> d59d33e0d47727acc668a1d5129e2df46371cc8b
exit;