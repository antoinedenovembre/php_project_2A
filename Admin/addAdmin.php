<?php
    include '../Config/config.php';
    include '../DAL/Connection.php';
    include '../DAL/AdminsGateway.php';

    echo 'Pseudo : ';
    $pseudo = readline();
    echo 'Password : ';
    $password = readline("Password : ");
    $hashPass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

    global $dsn, $user, $pass;
    if (((new AdminsGateway(new Connection($dsn, $user, $pass)))->insertAdmin($pseudo, $hashPass)) < 0) {
        echo 'Error';
    } else {
        echo 'Admin added';
    }
