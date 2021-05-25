<?php
    $pdo = new PDO("mysql:dbname=ingenosya;host=localhost", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
?>