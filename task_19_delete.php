<?php 




$pdo = new PDO("mysql:host=localhost;dbname=task_8;", "root", "");

$sql = "SELECT * FROM images WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);
$img = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($img as $link) {
    $link_delete = $link['image'];
}

unlink($link_delete);


$sql = "DELETE FROM images WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->execute($_GET);


header("Location: /task_18.php");
 

 ?>