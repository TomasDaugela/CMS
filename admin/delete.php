<?php 
session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if(isset($_SESSION['logged_in'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = $pdo->prepare('DELETE FROM articles WHERE id = ?');

        $query->bindValue(1,$id);
        $query->execute();

        header('Location: delete.php');
    }
    $articles = $article->fetch_all();
?>
<html>
	<head>
		<title>CMS Tutorial</title>
		<link rel="stylesheet" href="../assets/style.css" /> 
	</head>
	<body>

		<div class="container">
<a href="index.php" id="logo">Delete Page</a><br>

        
<form action="delete.php" method="get">
    <select name="id">
        <?php foreach($articles as $article){?>
        <option value="<?php echo $article['id'];?>"> 
            <?php echo $article['title'];?>
        </option>
        <?php }?>
    </select>
    <input type="submit" value="delete page"><br>
</form>
<a class="back" href="index.php">&larr;back</a>
		
		</div>
	</body>
</html>
<?php
}else{
    header('Location: index.php');
}
?>