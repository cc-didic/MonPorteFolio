<?php

    session_start();

    // Savoir si l'utilisateur est connecté
    function isLoggedIn(){
        return isset($_SESSION['idUser']);
    }

    function requireLogin(){
        if(!isLoggedIn()){
            header('Location: login.php');
            exit;
        }
    }
