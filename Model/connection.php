<?php

// Les 4 variables si dessous peuvent changer!!!!!
$username = "root";   //Le login pour me connecter à la DB
$password = "";     // Le mdp pour me connecter à la DB
$host = "localhost"; // Le nom du serveur ou se trouve ma DB
$dbname = "examphp"; //Le nom de la DB que je veux attaquer.




// TOUT CE QUI SE TROUVE CI-DESSOUS NE CHANGE PAS !!!!!!
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
}
catch(PDOException $ex){
    die("Failed to connect to the database: " . $ex->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


?>
