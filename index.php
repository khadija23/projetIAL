<?php
	require_once 'controleur/Controller.php';
	$categ;
	$controller = new Controller();

//utilisateur simple

	//afficher les details d'un article
	if (isset($_GET['a'])) {
		if (strtolower($_GET['a']) === 'article'){

			if (isset($_GET['id'])){
				$controller->showArticle($_GET['id']);
			}
			else{
				$controller->ShowErrorPage();
			}
		}
	}
	//-------fin Affichage d'un article

	//afficher les articles d'une categorie
		if (isset($_GET['a'])) {
			if (strtolower($_GET['a']) === 'categorie'){

				if (isset($_GET['id'])){
					if (isset($_GET['profil'])){

						$controller->showCategorie2($_GET['id'],$_GET['profil']);
					}
					else{
						$controller->showCategorie($_GET['id']);
					}

				}

			}
		}
	//-------fin Affichage des articles d'une categorie

//-------fin fonctionnalite d'un utilisateur simple



//authentification admin et editeur

	 if ((isset($_POST['authentifier']))){
	 			echo "hii";
				$result=$controller->verifierProfilEtConnexion($_REQUEST['login'],$_REQUEST['password']);
				//echo $result;
				if ($result==-1) {
					 echo "username ou mot de passe incorrect";
					// require_once "./vue/connexion.php ";
				}
		}





//Editeur

	//article

		//retour vers la page d'accueil editeur apres avoir listee les articles
		if (isset($_GET['a'])) {


				if (strtolower($_GET['a']) === 'retouraccueil') {	
						
						$controller->showAccueilEditeur();

				}
			}
		

		// Ajouter des articles

			//On va d'abord rediriger l'editeur vers une page contenant un formulaire d'ajout
			if (isset($_GET['a'])) {

				if (strtolower($_GET['a']) === 'formulaireajout') {	
						
						$controller->ajouterArticlePage();

				}
			}
			// ensuite apres qu'il aie renseigne le formulaire, on effectue l'ajout dans la base
			if(isset($_POST['ajouter'])){
				
				$choix = $_REQUEST['categorie'];
				if ($choix=='politique'){
					$categ=1;
				}

				elseif ($choix=='societe'){
					$categ=2;
				}

				elseif ($choix=='religion'){
					$categ=3;
				}

			
				$controller->ajoutArticle($_REQUEST['titre'],$_REQUEST['contenu'],$categ);
			}
		//-------fin Ajout

			
		//lister les articles

			if (isset($_GET['a'])) {
				
				// lister tous les articles
				if (strtolower($_GET['a']) === 'lister') {
					
					$controller->showAllArticle();
				}
			}

		//-------fin  lister


		//modifier un article

			//redirigeons l'utilisateur d'abord vers la page de modification d'article
			if (isset($_GET['a'])) {
			
				if (strtolower($_GET['a']) === 'modifier'){

					if (isset($_GET['id'])){
						$article = $controller->getArticle($_GET['id']);
			
						$categorie = $controller->getCategorie($article->categorie);

						$categories = $controller->getCategories();

						require './vue/editeur/editArticle.php';
					}
				}
			}
			//ensuite enregistrons les nouvelles donnees de l'article

			if(isset($_POST['modifier'])){

				$id = $_POST['article_id'];

				$titre = $_POST['titre'];

				$contenu = $_POST['contenu'];

				$categorie = (int)$_POST['categorie'];

				$controller->modifierArticle($id,$titre,$contenu,$categorie);

			}

		//-------fin modification	

		//supprimer un article
			if (isset($_GET['a'])) {
				if (strtolower($_GET['a']) === 'supprimer'){

					if (isset($_GET['id'])){
						$controller->deleteArticle($_GET['id']);
					}
				}
			}
		//-------fin suppression

	//categorie

		//On va d'abord rediriger l'editeur vers une page contenant un formulaire d'ajout
			if (isset($_GET['a'])) {

				if (strtolower($_GET['a']) === 'addcategorie') {	
					echo "hola";
						
						$controller->ajouterCategoriePage();

				}
			}
			// ensuite apres qu'il aie renseigne le formulaire, on effectue l'ajout dans la base
			if(isset($_POST['ajouter_Cat'])){
			
				$controller->ajoutCategorie($_REQUEST['idCat'],$_REQUEST['libelle']);
			}
		//-------fin Ajout


			
		//lister les categories

			if (isset($_GET['a'])) {
				
				// lister tous les articles
				if (strtolower($_GET['a']) === 'listercategorie') {
					
					
					$controller->showAllCategorie();
				}
			}

		//-------fin  lister

		//modifier une categorie

			//redirigeons l'utilisateur d'abord vers la page de modification de categorie
			if (isset($_GET['a'])) {
			
				if (strtolower($_GET['a']) === 'modifiercategorie'){

					if (isset($_GET['id'])){

						$categories = $controller->getCategorie($_GET['id']);

						require './vue/editeur/editCategorie.php';
					}
				}
			}
			//ensuite enregistrons les nouvelles donnees de la categorie

			if(isset($_POST['modifiercat'])){

				$id = $_POST['id'];

				$libelle = $_POST['libelle'];

				

				$controller->modifierCategorie($id,$libelle);

			}

		//-------fin modification	

		//supprimer une categorie
			
			if (isset($_GET['a'])) {
				if (strtolower($_GET['a']) === 'supprimercategorie'){

					if (isset($_GET['id'])){
						$controller->deleteCategorie($_GET['id']);
					}
				}
			}
		//-------fin suppression

//-------fin fonctionnalite d'un editeur



//admin

	//redirection vers la page d'accueil admin
	if (isset($_GET['a'])) {


			if (strtolower($_GET['a']) === 'accueiladmin') {	
					
					$controller->showAccueilAdmin();

			}
		}

	//creer un utilisateur

		


		if (isset($_POST['creer_utilisateur'])) {


			$nom = $_POST['nom'] ;
			
			$prenom = $_POST['prenom']; 
			
			$login = $_POST['login']; 
			
			$mdp = $_POST['mdp'];			
			$controller->creerUtilisateur($nom, $prenom, $login, $mdp);

		}
		// redirection vers le formulaire d'ajout
		if (isset($_GET['a'])) {
			if(strtolower($_GET['a']) === 'ajouterutilisateur'){

				require_once './vue/admin/ajouterUtilisateur.php';

			}
		
		
		if (strtolower($_GET['a']) === 'listerutilisateur') {
				
				$users = $controller->showUsers();

				require_once './vue/admin/listerUtilisateur.php';

			}


			if (strtolower($_GET['a']) === 'supprimeruser'){

				if (isset($_GET['id'])){
					$controller->deleteUser($_GET['id']);
				}
			}
			
			if (strtolower($_GET['a']) === 'listerutilisateur') {
				
				$users = $controller->showUsers();

				require_once './vue/admin/listerUtilisateur.php';

			}

		
			if (strtolower($_GET['a']) === 'modifierutilisateur'){

				if (isset($_GET['id'])){
					$user = $controller->getUser($_GET['id']);
		

					require './vue/admin/editUser.php';
				}
			}

			
		


	
		}
		elseif(isset($_POST['modifyuser'])){
				echo "iciii";

			$id = $_POST['user_id'];

			$nom = $_POST['nom'];

			$prenom = $_POST['prenom'];

			$username = $_POST['username'];
			$mdp = $_POST['mdp'];
			

			$controller->modifierUser($id,$nom,$prenom,$username,$mdp);

		}
			

			else{
			$controller->showAccueil();
		}
	
?>