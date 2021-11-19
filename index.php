<html>
<body>
<?php

require_once('Controller/DAL/Connection.php');

//A CHANGER
$user= 'root';
$pass='root';
$dsn='mysql:host=localhost:8889;dbname=Projet;';
try {
    $con = new Connection($dsn,$user,$pass);
}
catch( PDOException $Exception ) {
    echo 'erreur';
    echo $Exception->getMessage();
}
?>

</body>
</html>
