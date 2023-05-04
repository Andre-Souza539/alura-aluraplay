<?php

$dbPath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = filter_input(INPUT_GET , 'id', FILTER_VALIDATE_INT);

if(!$id){
    header('location: /index.php?sucess=0');
    exit();
}

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

$sql = 'UPDATE videos SET url = :url, title = :title WHERE id = :id;';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':url',$url);
$stmt->bindValue(':title',$title);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);

if($stmt->execute()){
    header('location: /index.php?sucess=0');
} else {
    header('location: /index.php?sucess=1');
}

