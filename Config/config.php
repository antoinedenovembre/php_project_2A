<?php
    $rep = __DIR__ . '/../'; // Répertoire racine

    //Base de données
    $dsn = "mysql:host=localhost;dbname=projet;";
    $user = "root";
    $pass = "5W3PyR11YaHx!weU12l3JqCTWkT&AQersUurocMJ"; // à modifier en fonction de la config du serveur

    //Vues
    $vues['Home'] = 'View/Home.php';
    $vues['Login'] = 'View/Login.php';
    $vues['AddRSS'] = 'View/ModifRSS.php';
    $vues['ModifRSS'] = 'View/ModifRSS.php';
    $vues['ListRSS'] = 'View/ListRSS.php';
    $vues['Error'] = 'View/Error.php';

	$nbElements = 10;

