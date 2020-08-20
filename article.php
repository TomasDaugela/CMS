<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article();
    $articles = $article->fetch_all();
    
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $article->fetch_data($id);
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
    <h2>
            <?php echo $data['title'];?>
             <small>
				<?php echo date('l jS', $data['timestamp']); ?>
			</small>
     </h2>
     <p>
         <?php echo $data['content']; ?>
     </p>
     <a class="back" href="index.php">&larr;back</a>
		</div>
	</body>
</html>

    <?php
}else{
    header('Location: index.php');
    exit();
}

?>