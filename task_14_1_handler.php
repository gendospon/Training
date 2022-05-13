<?php 

session_start();

unset($_SESSION['user']);
unset($_SESSION['success']);

header("Location: /task_14.php");

 ?>