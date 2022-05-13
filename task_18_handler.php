<?php 
session_start();

$fileresuit = pathinfo($_FILES [ "Image" ][ "name" ]);
$filename = uniqid(). "." .$fileresuit['extension'];

$pdo = new PDO("mysql:host=localhost;dbname=task_8;", "root", "");

if (empty ($_FILES [ "Image" ][ "name" ])) {
    
    $message = "Выберите файл.";
    $_SESSION['text'] = $message;
    header("Location: /task_18.php");
    exit;
    }
//var_dump();die;
$sql = "INSERT INTO images (Image) VALUES (:Image)";
$statement = $pdo->prepare($sql);
$statement->execute(['Image' => 'img/demo/gallery/'.$filename]);

move_uploaded_file($_FILES [ "Image" ][ "tmp_name" ], 'img/demo/gallery/'.$filename);

$sql = "SELECT * FROM images ";
$statement = $pdo->prepare($sql);
$statement->execute();
$img = $statement->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['img_src'] = $img;
//var_dump($img);die;

header("Location: /task_18.php");
 

 ?>