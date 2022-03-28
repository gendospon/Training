<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
      $names = [
      	       [
                 "name" => "Alex",
                 "surname" => "Jmas",
                 "role" => "admin"
               ],
                [
                 "name" => "Джек",
                 "surname" => "Смит",
                 "role" => "admin"
               ],
                [
                 "name" => "Павел",
                 "surname" => "Володарский",
                 "role" => "user"
               ],
               [
                 "name" => "Владимир",
                 "surname" => "Волков",
                 "role" => "user"
               ]

	           ];

	 ?>

<h3>Админы</h3>
	 <?php foreach ($names as $name):?>
	 	<?php if ($name["role"]=="admin"): ?>
	 		 <?php echo $name["name"]; ?> -
	         <?php echo $name["surname"]; ?> -- <?php echo $name["role"]; ?> <br>
	 	<?php endif; ?>
	   
	 <?php endforeach; ?>

<h3>User</h3>
    <?php foreach ($names as $name):?>
	 	<?php if ($name["role"]=="user"): ?>
	 		 <?php echo $name["name"]; ?> -
	         <?php echo $name["surname"]; ?> -- <?php echo $name["role"]; ?> <br>
	 	<?php endif; ?>
	   
	 <?php endforeach; ?>
	 
	
</body>
</html>