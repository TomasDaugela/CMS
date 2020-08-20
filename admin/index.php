<?php
session_start();

include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])){
    ?>
<html>
	<head>
		<title>CMS Tutorial</title>
		<link rel="stylesheet" href="../assets/style.css" /> 
	</head>
	<body>

		<div class="container">
<a href="index.php" id="logo">Admin Panel</a><br>

            <li><a href="add.php">Create new Page</a></li>
            <li><a href="delete.php">Delete Page</a></li>
            <a class="admin" href="logout.php">log out</a>
		</div>
	</body>
</html>
<?php
}else{
    if(isset($_POST['username'],$_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];


        if(empty($username) or empty($password)){
           $error = "all fiels are required!";
        }else{
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

            $query->bindValue(1,$username);
            $query->bindValue(2,$password);

            $query->execute();

            $num = $query->rowCount();

            if($num == 1){
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            }else{
                $error = "incorrect details!";
            }
        }
    }
    ?>

    <html>
	<head>
		<title>CMS Tutorial</title>
		<link rel="stylesheet" href="../assets/style.css" /> 
	</head>
	<body>

		<div class="container">
<a href="index.php" id="logo">admin login</a>
<br>
		<?php if(isset($error)){ ?>
            <small style="color:red"><?php echo $error?></small>
        <?php } ?>
            <form action="index.php" method="post">
                <input type="text" name="username" placeholder="username">
                <input type="password" name="password" placeholder="password">
                <input type="submit" value="Login">
            </form>
		</div>
	</body>
</html>
<?php

        }


?>