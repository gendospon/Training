<?php 
$text =$_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=task_8;", "root", "");
$sql = "INSERT INTO text (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

header("Location: /task_9.php");

 ?>