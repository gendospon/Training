 
<?php 

session_start();

$email =$_POST['email'];
$password =$_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$pdo = new PDO("mysql:host=localhost;dbname=task_8;", "root", "");

$sql = "SELECT * FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);


//var_dump($user);die;

if (empty($user)) {
   
   $_SESSION['error'] = 'Не верный логин или пароль';
   header("Location: /task_14.php");
   exit;
}

if (!password_verify($password, $user['password'])) {
    $_SESSION['error'] = 'Не верный логин или пароль';
   header("Location: /task_14.php");
   exit;
}


$_SESSION['user'] = ["email" => $user['email']];
$message = "Вы авторизованы уважаемый:";
   $_SESSION['success'] = $message;




header("Location: /task_17.php");
 

 ?>