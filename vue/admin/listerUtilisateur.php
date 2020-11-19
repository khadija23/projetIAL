<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<a href="/diop/vue/connexion.php">Deconnexion</a>
	<a href="index.php?a=accueilAdmin">accueil</a>
	<div id="">
		<?php if (!empty($users)): ?>

            <?php foreach ($users as $user):
            	

                echo("<p>$user->nom</p>");
                
                echo("<p>$user->prenom</p>");

                echo("<p>$user->username</p>");

                echo("<hr>");?> 

                <button>
                	<a href="index.php?a=supprimerUser&id=<?= $user->id ?>"> supprimer</a>
                </button>
					<button>
						<a href="index.php?a=modifierUtilisateur&id=<?= $user->id ?>">modifier</a>
					</button>

           <?php  endforeach ?>
		
        <?php else: ?>
			<div class="message">Aucun utilisateur trouvé</div>
		<?php endif ?>
	</div>
	
</body>
</html>