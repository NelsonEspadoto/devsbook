<<<<<<< HEAD
<?php
session_start();
$base = "http://localhost/devsbook";

$db_name = "devsbook";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);

=======
<?php
session_start();
$base = "http://localhost/devsbook";

$db_name = "devsbook";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);

>>>>>>> d59d33e0d47727acc668a1d5129e2df46371cc8b
