<?php

$dbPath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$url = filter_input(INPUT_POST,'url', FILTER_VALIDATE_URL); 
if(!$url){
    header('location: /index.php?sucess=0');
    exit();
}

$title = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING );
if(!$title){
    header('location: /index.php?sucess=0');
    exit();
}

$sql = 'INSERT INTO videos (url, title) VALUES (?,?)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $url);
$stmt->bindValue(2, $title);

if($stmt->execute() === false){
    header('location: /index.php?sucess=0');
} else {
    header('location: /index.php?sucess=1');
}

