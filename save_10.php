<?php 

session_start();


$text =$_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=task_8;", "root", "");

$sql = "SELECT * FROM text WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)) {
    $message = "Такая запись уже есть в базе.";
    $_SESSION['danger'] = $message;
    header("Location: /task_10.php");
    exit;
}

$sql = "INSERT INTO text (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

$message = "Ваша запись внесена в базу.";
    $_SESSION['success'] = $message;

header("Location: /task_10.php");

 ?>