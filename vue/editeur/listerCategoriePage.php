<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualités MGLSI</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
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
  line-height: 40px;
  padding: 15px 0px 15px 20px; 
}</style>
</head>
<body>
	<?php require_once 'inc/entete.php'; ?>
	<div id="">
		<?php if (!empty($categories)): ?>

			<?php foreach ($categories as $categorie): ?>
				<div class="categorie">
					<h1><?= $categorie->libelle ?></h1><button><a href="index.php?a=supprimercategorie&id=<?= $categorie->id ?>"> supprimer</a></button>
					<button><a href="../../diop/index.php?a=modifiercategorie&id=<?= $categorie->id ?>">modifier</a></button>
			<?php endforeach ?>
		<?php else: ?>
			<div class="message">Aucune Categorie</div>
		<?php endif ?>
	</div>
	
</body>
</html>