<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form id="ajoutuser" role="form" action="/projetDiop/index.php" method="POST"  >

		<input type="text" name="user_id" id="user_id" value="<?php echo $user->id ?>" hidden>

		<label for="titre">Nom</label>
		<input type="text" name="nom" id="nom" value="<?php echo $user->nom ?>">
		
		<label for="contenu">Prenom</label>
		<input type="text" name="prenom" id="prenom" value="<?php echo $user->prenom ?>">
		<label for="categorie">Username</label>
		<input type="text" name="username" id="username" value="<?php echo $user->username ?>">
		<label for="categorie">Mot de passe</label>
		<input type="text" name="mdp" id="mdp" value="<?php echo $user->mdp ?>">
		

	

		 <button type="submit"  name="modifyuser" >Enregistrer les modifications</button>
	</form>
	
</body>
</html>