<div id="menu">
	
	<h1>Catégories</h1><hr width="20%">
	<ul>
		<li><a href="index.php?a=accueilAdmin">Tout</a></li>
		<?php foreach ($categories as $categorie): ?>
			<li><a href="index.php?a=categorie&profil=admin&id=<?= $categorie->id ?>"><?= $categorie->libelle ?></a></li>
		<?php endforeach ?>
	</ul>
</div>

