<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualités dans le monde </title>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
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
}</style>
<body>
	<?php require_once 'inc/entete.php'; ?>
	<?php 
		require_once 'inc/menu.php'; 
	?>
	<div >
		<?php if (!empty($articles)): ?>
			<?php foreach ($articles as $article): ?>
				<div class="article">
					<h1><a href="index.php?a=article&id=<?= $article->id ?>"><?= $article->titre ?></a></h1>
					<p><?= substr($article->contenu, 0, 300) . '...' ?></p>
				</div>
			<?php endforeach ?>
		<?php else: ?>
			<div class="message">Aucun article trouvé</div>
		<?php endif ?>
	</div>
	
</body>
</html>