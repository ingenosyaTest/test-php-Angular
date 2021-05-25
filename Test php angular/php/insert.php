<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Methods :PUT, GET, POST, DELETE, OPTIONS");
    require_once "config.php";
    $nom=htmlentities($_POST["nom"]);
    $prenom=htmlentities($_POST["prenom"]);
    $promotion=htmlentities($_POST["promotion"]);
    $genre=htmlentities($_POST["genre"]);
    $naiss= new DateTime(htmlentities($_POST["naissance"]));
    $naissance= $naiss->format('d/m/Y');
    $query=$pdo->prepare("INSERT INTO etudiant (nom,prenom,promotion,genre,naissance) VALUES (:nom,:prenom,:promotion,:genre,:naissance)");
    $query->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'promotion' => $promotion,
        'genre' => $genre,
        'naissance' => $naissance
     ]);
     $query = $pdo->query("SELECT * FROM etudiant");
     if($query===false){
         var_dump($pdo->errorInfo());
         die('Erreur sql');
     }else{
         $listEtudiant = $query->fetchAll(PDO::FETCH_ASSOC);
     }
     echo json_encode($listEtudiant);
?>