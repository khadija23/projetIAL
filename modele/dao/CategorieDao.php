<?php
	require_once 'ConnexionManager.php';

	/**
	 * Classe de gestion des accès aux articles
	 */
	class CategorieDao
	{
		private $id;
		private $bdd;
		private $libelle;

		public function __construct()
		{
			$this->bdd = (new ConnexionManager)->getInstance();
		}

		public function getList()
		{
			$reponse = $this->bdd->query('SELECT * FROM Categorie');
			$data = $reponse->fetchAll(PDO::FETCH_CLASS, 'Categorie');
			// $reponse->closeCursor();
			return $data;
		}

		public function getById($id)
		{
			$reponse = $this->bdd->query('SELECT * FROM Categorie WHERE id = '.$id);
			$data = $reponse->fetch(PDO::FETCH_OBJ);
			// $reponse->closeCursor();
			return $data;
		}

		public function addCategorie($id,$libelle){
			
			
    		$request = $this->bdd->prepare("INSERT into Categorie(id,libelle) values(:id,:libelle)");
   		 	$request->execute(array(
        		'id'  => $id,
        		'libelle' => $libelle
    			));
   		 
    		return 1;
			
		}

		public function editCategorie($id, $libelle){

		 $request = $this->bdd->prepare("UPDATE Categorie set id=:id, libelle=:libelle  WHERE id=:id");
    	
    	$result = $request->execute(array(
            'id' => $id,
            'libelle' => $libelle
            
    		));
    	
    	return 1;

		}

		public function deleteCategorie($id){

	    $request = $this->bdd->prepare("DELETE from Categorie  WHERE id=:id");
    	$request->execute(array(
            'id' => $id
    ));
    return 1;
}

	}
?>