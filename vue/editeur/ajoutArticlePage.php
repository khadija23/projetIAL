<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="./vue/admin/inc/styleAjout.css">
</head>
<body>
	 <?php require_once 'inc/entete1.php';
     ?>
       <div id="container">
	<form id="ajout" role="form" action="/diop/index.php" method="POST">

		<label for="titre"><b>Titre</b></label>
		<input type="text" name="titre" id="titre">
		
		<label for="contenu"> <b>Contenu</b></label>
		<input type="text" name="contenu" id="contenu">
		<label for="categorie"> <b>Categorie</b> </label>
	<select name="categorie" id="categorie" form="ajout">
		
		<?php foreach ($categories as $category) {
			
			if($category->id === $categorie->id){

				echo "<option value=$category->id selected>$category->libelle</option>";

			}else{

				echo "<option value=$category->id>$category->libelle</option>";

			}


		} 

		?>
		   
			
		</select>

		 <input type="submit"  name="ajouter" value="ajouter" >
	</form>
	 </div>
</body>
</html>