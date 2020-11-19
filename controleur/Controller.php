<?php
	require_once 'modele/dao/ArticleDao.php';
	require_once 'modele/dao/UserDao.php';
	require_once 'modele/dao/CategorieDao.php';
	require_once 'modele/domaine/Article.php';
	require_once 'modele/domaine/Categorie.php';
	require_once 'modele/domaine/User.php';

	/**
	 * Classe représentant notre controleur principal
	 */
	class Controller
	{
		
		function __construct()
		{
			
		}
		// afficher la page d'accueil de notre site
		public function showAccueil()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			require_once 'vue/accueil.php';

		}
		// afficher la page d'edition

		public function showAccueilEditeur()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();
			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
		
			require_once 'vue/editeur/accueilEditeur.php';
			
		}

		// afficher la page d'administration
		public function showAccueilAdmin()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();
			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
		
			require_once 'vue/admin/accueilAdmin.php';
			
		}
		// gestion de la connexion des editeurs et admin
		public function verifierProfilEtConnexion($login,$password)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();
			$userDao= new UserDao();

			$test=$userDao->verifUser($login,$password);
			
			$articles = $articleDao->getList();
				
		 	$categories = $categorieDao->getList();
			
			switch ($test) {
				case 1:
					 header("location: ?a=retouraccueil ");
				 	
				
					break;
				
				case 2:

					 header("location: ?a=accueilAdmin ");
					 break;

				case -1:

					return $test;
					

					
			}


		
		}

		// gestion des articles

		public function ajoutArticle($contenu,$categorie,$titre)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();
			$userDao= new UserDao();
			$articleDao->addArticle($contenu,$categorie,$titre);
			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			
			header("location: ?a=lister");
				
		}

		


		public function modifierArticle($id, $titre, $contenu, $categorie){

			$articleDao = new ArticleDao();

			$articleDao->editArticle($id, $titre, $contenu, $categorie);

			header("location: ?a=lister");

		}

		public function getArticle($id){

			$articleDao = new ArticleDao();

			$article = $articleDao->getById($id);

			return $article;
		}

		public function showArticle($id)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$article = $articleDao->getById($id);
			$categories = $categorieDao->getList();
			require_once 'vue/article.php';
		}

		public function showAllArticle()
		{
			$articleDao = new ArticleDao();
			

			$articles = $articleDao->getList();
			
			require_once 'vue/editeur/listerArticlePage.php';
		}

		public function deleteArticle($id){
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articleDao->deleteArticle($id);
			 $articles = $articleDao->getList();
			header("location: ?a=lister");
		}

		public function ajouterArticlePage(){
				$categorieDao = new CategorieDao();
				$categories = $categorieDao->getList();
			
			
			require_once 'vue/editeur/ajoutArticlePage.php';
		}


		//gestion des categories

		public function modifierCategorie($id, $libelle){

			$categorieDao = new CategorieDao();
			$categories = $categorieDao->getList();

			$categorieDao->editCategorie($id, $libelle);

			header("location: ?a=listercategorie");
			
		}

		public function showAllCategorie(){

			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();
			$categories = $categorieDao->getList();
			
			
			require_once 'vue/editeur/listerCategoriePage.php';
			return $categories; 
			
		}
		
		public function ajouterCategoriePage(){
			
			require_once 'vue/editeur/ajoutCategoriePage.php';
		}

		public function ajoutCategorie($id,$libelle)
		{
			
			$categorieDao = new CategorieDao();
			
			 $categorieDao->addCategorie($id,$libelle);
			
			// $articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			
			header("location: ?a=listercategorie");
				
		}
		

		

		public function getCategorie($id){

			$categorieDao = new CategorieDao();

			$categorie = $categorieDao->getById($id);

			return $categorie;
		}

		public function getCategories(){

			$categorieDao = new CategorieDao();

			$categories = $categorieDao->getList();
			
			return $categories;

		}

	

		public function showCategorie2($id,$profil)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getByCategoryId($id);
			$categories = $categorieDao->getList();
			if ($profil=='editeur') {
				require_once 'vue/editeur/articleByCategorie.php';
			}
			else
			
				require_once 'vue/admin/articleBycategorie.php';
			
		}
		public function showCategorie($id)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getByCategoryId($id);
			$categories = $categorieDao->getList();
			
				require_once 'vue/articleByCategorie.php';
		}
		
		public function deleteCategorie($id){
			
			$categorieDao = new CategorieDao();

			$categorieDao->deleteCategorie($id);
			 $categories = $categorieDao->getList();
			header("location: ?a=listercategorie");
		}

		//gestion des users

		public function deleteUser($id){
			$userDao = new UserDao();
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$userDao->deleteUser($id);
			 $users = $userDao->getUsers();
			header("location: ?a=listerutilisateur");
		}

			public function creerUtilisateur($nom, $prenom, $login, $mdp){

			$userDao = new UserDao();

			$userDao->addUser($nom, $prenom, $login, $mdp);

			header("location: ?a=listerutilisateur");

		}


		public function showUsers(){

			$userDao = new UserDao();

			$users = $userDao->getUsers();

			return $users;

		}
		public function getUser($id){

			$userDao = new UserDao();

			$user = $userDao->getUser($id);

			return $user;

		}

		public function modifierUser($id,$nom,$prenom,$username,$mdp){
			
			$userDao = new UserDao();

			$userDao->editUser($id,$nom,$prenom,$username,$mdp);

			header("location: ?a=listerutilisateur");
		}

		
	}
?>