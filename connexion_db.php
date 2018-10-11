<?php

$host = 'mysql:dbname=data;host=127.0.0.1';
$user = 'root';
$password = 'oumarsow';

try {
    $connexion = new PDO($host, $user, $password);
    echo "La connexion à la base est ok";
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>