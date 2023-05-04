<?php

$dbPath = __DIR__ . '/db.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = $_GET['id'];
$sql = 'DELETE FROM videos WHERE id = ?';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1,$id);

if($stmt->execute()){
    header('location: /index.php?sucess=0');
} else {
    header('location: /index.php?sucess=1');
}

