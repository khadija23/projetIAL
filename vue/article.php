<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Affichage d'un article</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/styleArticle.css"> -->
</head>
<style>
	@import url('https://fonts.googleapis.com/css?family=Kalam');

body {
  /* color: #444; */
  font-size: 20px;
  font-family: 'Kalam', cursive;
    line-height: 28px;
  padding: 15px 0px 15px 20px; 
}

h1 {
  background: linear-gradient( 90deg, rgba(246, 114, 128, 0.6) , rgba(255, 255, 255, 0.6));
  border-left:20px #dd6673 solid;
  color: #dd6673;
  line-height: 28px;
  padding: 15px 0px 15px 20px; 

}
</style>

<body>
    <?php require_once 'inc/entete.php'; ?>
	<?php require_once 'inc/menu.php';  ?>
	<?php if (!empty($article)): ?>
		<div id="contenu">
			<h1><?= $article->titre ?></h1>
			<span>Publié le <?= $article->dateCreation ?></span>
			<p><?= $article->contenu ?></p>
		</div>
	<?php else: ?>
		<div class="message">L'article demandé n'existe pas</div>
	<?php endif ?>
	
</body>
</html>