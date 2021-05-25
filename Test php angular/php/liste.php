<?php
    require_once "config.php";
    header('Access-Control-Allow-Origin: *');
    $listEtudiant = [];
    $query = $pdo->query("SELECT * FROM etudiant");
    if($query===false){
        var_dump($pdo->errorInfo());
        die('Erreur sql');
    }else{
        $listEtudiant = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    echo json_encode($listEtudiant);
?>