<?php

function getDBConnection(){
    try{
        $user = "Didic";
        $pass = "R*15Kk4M-8A";

        $pdo = new PDO('mysql:host=localhost;dbname=my_portfolio_php', $user,$pass);

        return $pdo;
    }
    catch (PDOException $e){
        die("Erreur lors de la connexion à la BDD");
    }
}


