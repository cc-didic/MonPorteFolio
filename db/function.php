<?php

    require_once 'db/db_connect.php';

    function getAllProjects(){

        $pdo = getDBConnection();

        $sql = "SELECT * FROM my_portfolio_php.projects proj
                LEFT JOIN my_portfolio_php.projects_skills projski ON proj.idprojects = projski.idprojects
                LEFT JOIN my_portfolio_php.skills ON skills.idskills = projski.idskills;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        $projects = [];

        foreach($result as $row){

            //Si mon projet n'est pas encore dans le tableau
            if(isset($projects[$row['idprojects']]) == false)
            {
                $project = [
                'idprojects' => $row['idprojects'],
                'title' => $row['title'],
                'description' => $row['description'],
                'github_link' => $row['github_link'],
                'project_link' => $row['project_link'],
                ];

                $projects[$row['idprojects']] = $project;
            }
            
            //Un skill est présent dans la row ?
            if(isset($row['idskills']))
            {
                //Je veux ajouter le skill dans le tableau skill
                $projects[$row['idprojects']]['skills'][] = $row['name'];
            }

            
        }

        return $projects;

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

    function insertProject($title, $description, $github_link, $project_link){
        $pdo = getDBConnection();

        $statement = $pdo->prepare('INSERT INTO projects (title, description, github_link, project_link)
            VALUES (:title, :description, :github_link, :project_link)');

        $success = $statement->execute([
            'title' => $title,
            'description' => $description,
            'github_link' => $github_link,
            'project_link' => $project_link,
        ]);

        return $success;
    }

    function deleteProject($idProjectToDelete){
        $pdo = getDBConnection();

        // Nettoyer l'id (important à cause du \t)
        $idProjectToDelete = intval($idProjectToDelete);

        // Supprimer les associations dans projects_skills
        $stmt = $pdo->prepare("DELETE FROM projects_skills WHERE idprojects = :id");
        $stmt->execute(['id' => $idProjectToDelete]);

        // Supprimer le projet
        $stmt = $pdo->prepare("DELETE FROM projects WHERE idprojects = :id");
        $success = $stmt->execute(['id' => $idProjectToDelete]);

        return $success;
    }

    function getUserByEmail($email){
        $pdo = getDBConnection();

        $sql = "SELECT * FROM my_portfolio_php.users WHERE email = :email;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $email
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }