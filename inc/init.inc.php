<?php require_once "fonction.inc.php"; ?>

<?php
session_start(); // Création ou ouverture de session
// Première ligne de code, se positionne toujours en premier avant tout traitement php

// Connexion à la BDD 'TEAM'
$pdo = new PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_theo_leben', 'root', '',
    array(
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING
        )
);

// debug( $pdo );

$error = "";
$content = "";

?>