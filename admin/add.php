<?php 
session_start();

include_once('../includes/connection.php');


if(isset($_SESSION['logged_in'])){
    if(isset($_POST['title'],$_POST['content'])){
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);

        if(empty($title) or empty($content)){
            $error = "all fiels are required!";
    }else{
        $query = $pdo->prepare("INSERT INTO articles (title, content, timestamp)VALUES(?,?,?)");

        $query->bindValue(1,$title);
        $query->bindValue(2,$content);
        $query->bindValue(3,time());

        $query->execute();

        header('Location: index.php');
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
<a href="index.php" id="logo">Create Page</a><br>
<?php if(isset($error)){ ?>
            <small style="color:red"><?php echo $error?></small>
        <?php } ?>
        
<form action="add.php" method="post">
    <input type="text" name="title" placeholder="title"><br>
    <textarea rows="20" cols="60" placeholder="content" name="content"></textarea><br>
    <input type="submit" value="create page"><br><br>
    <a class="back" href="index.php">&larr;back</a>
</form>
		
		</div>
	</body>
</html>
<?php
}else{
    header('Location: index.php');
}

?>
