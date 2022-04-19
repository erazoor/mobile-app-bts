<?php
    $user="root";
    $mdp="";
    $serveur="localhost";
    $bd="mobile-app-bts";
    $dns="mysql:host=$serveur;dbname=$bd"; //dns = domaine name serveur
    try
    {
        $conn = new PDO($dns,$user,$mdp);
    }
    catch (PDOExeption $e)
    {
        echo "Erreur de connexion à la base de donnée : ".$e->getMessage();
    }
?>