<?php
session_start();

try {
    $pdo = new PDO('mysql:host=votreBaseDeDonne.db;port=port;dbname=nomDeLaBase', 'nomDeLaSession', 'mdpDeLaSession');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e) {
    echo "Erreur : ".$e->getMessage()."<br />";
}