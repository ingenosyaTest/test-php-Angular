<?php
    require_once "config.php";
    header('Access-Control-Allow-Origin: *');
    $json = file_get_contents("students.json");
    $data= json_decode($json);
    $query=$pdo->prepare("INSERT INTO etudiant (nom,prenom,promotion,genre,naissance) VALUES (:nom,:prenom,:promotion,:genre,:naissance)");
    foreach($data as $etudiant){
        $query->execute([
           'nom' => $etudiant->last_name,
           'prenom' => $etudiant->first_name,
           'promotion' => $etudiant->promotion,
           'genre' => $etudiant->gender,
           'naissance' => $etudiant->birth
        ]);
    }
    $query = $pdo->query("SELECT * FROM etudiant");
    if($query===false){
        var_dump($pdo->errorInfo());
        die('Erreur sql');
    }else{
        $listEtudiant = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    echo json_encode($listEtudiant);
?>