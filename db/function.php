<?php

    require_once 'db/db_connect.php';

    function getAllProjects(){

        $pdo = getDBConnection();

        $sql = "SELECT * FROM my_portfolio_php.projects;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function getAllSkills(){

        $pdo = getDBConnection();

        $sql = "SELECT * FROM my_portfolio_php.skills;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    function echoValue($row, $name){
        echo htmlspecialchars($row[$name], ENT_QUOTES, 'UTF-8') . "\t";
    }
    