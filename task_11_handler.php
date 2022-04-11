 
<?php 

session_start();

$email =$_POST['email'];
$password =$_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$pdo = new PDO("mysql:host=localhost;dbname=task_8;", "root", "");

$sql = "SELECT * FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)) {
    $message = "Такая запись уже есть в базе.";
    $_SESSION['danger'] = $message;
    header("Location: /task_11.php");
    exit;
}


$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email, 'password' => $hashed_password]);


$message = "Ваша запись внесена в базу.";
   $_SESSION['success'] = $message;

header("Location: /task_11.php");
 

 ?>