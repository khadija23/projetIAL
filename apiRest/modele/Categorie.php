<?php
include_once '../config/ConnexionManager.php';
include_once '../modele/Article.php';

class Categorie{
  
    // database connection and table name
    private $conn;
    private $table_name = "Categorie";
  
    // object properties
        public $id;
        public $libelle;
       
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    public function readByCategorie(){
  
    // select all query
    $query = "SELECT * FROM Categorie  C  JOIN Article  A   ON C.id = A.categorie " ;
 
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  return $stmt;
   

}

}