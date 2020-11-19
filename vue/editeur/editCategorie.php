<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form id="modif" role="form" action="/diop/index.php" method="POST"  >

		<!-- <input type="text" name="article_id" id="id" value="<?php echo $categorie->id ?>" > -->

		<label for="id">Identifiant</label>
		<input type="text" name="id" id="id" value="<?php echo $categories->id ?>">
		
		<label for="libelle">Libelle</label>
		<input type="text" name="libelle" id="libelle" value="<?php echo $categories->libelle ?>">
		

		 <button type="submit"  name="modifiercat" >Enregistrer les modifications</button>
	</form>
	
</body>
</html>