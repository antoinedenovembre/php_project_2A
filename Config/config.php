<?php
    $rep = __DIR__ . '/../'; // Répertoire racine

    //Base de données
    $dsn = "mysql:host=localhost;dbname=projet;";
    $user = "root";
    $pass = "root"; // à modifier en fonction de la config du serveur

    //Vues
    $vues['Home'] = 'View/Home.php';
    $vues['Login'] = 'View/Login.php';
    $vues['AddRSS'] = 'View/ModifRSS.php';
    $vues['ModifRSS'] = 'View/ModifRSS.php';
    $vues['DeleteRSS'] = 'View/DeleteRSS.php';
    $vues['Error'] = 'View/Error.php';

	$nbelem = 10;

