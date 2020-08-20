<?php
    include_once('includes/connection.php');
    include_once('includes/article.php');

    $article = new Article;
    $articles = $article->fetch_all();

?>
<html>
	<head>
		<title>CMS Tutorial</title>
		<link rel="stylesheet" href="assets/style.css" /> 
	</head>
	<body>

		<div class="container">
<a href="index.php" id="logo">My Website</a><br>
		
		<?php
		foreach ($articles as $article){ ?>

			<div class="list">
				<a href="article.php?id=<?php echo $article['id']?>;">
					<?php echo $article['title']; ?>
				</a>
		</div>
	<?php }?>
	<h1>Welcome to my Website</h1>
	<p>login as admin and create your first page!</p>
		<br>
		<a class="admin" href="admin">admin</a>
		</div>
	</body>
</html>
