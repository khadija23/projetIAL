<?php
include_once '../config/ConnexionManager.php';
// include_once 'Categorie.php';

class Article{
  
    // database connection and table name
    private $conn;
    private $table_name = "Article";
  
    // object properties
        public $id;
        public $titre;
        public $contenu;
        public $categorie;
         // public $libelle;
        public $dateCreation;
        public $dateModification;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
public function read(){
  
    // select all query
    $query = 'SELECT * FROM Article' ;
 
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}
function readbyCategorie(){
    
    // select all query
     $query = "SELECT
                 c.titre as category_titre, p.id, p.titre, p.contenu, p.categorie, p.dateCreation, p.dateModification
             FROM
                 " . $this->table_name . " p
                LEFT JOIN
                    Article c
                        ON p.Categorie = c.id
                       ORDER BY
                  p.categorie DESC";
  
    // prepare query statement
      $stmt = $this->conn->prepare($query);
  
     // execute query
     $stmt->execute();
  
     return $stmt;
     }
     public function readById($categorieById){

        $categorieByIde = $_GET["categorieById"];
    
        // On écrit la requête
        $sql = "SELECT  id, titre, contenu,categorie,dateCreation, dateModification
                FROM Article
                Where categorie=$categorieById";
    
        // On prépare la requête
        $query = $this->conn->prepare( $sql );
    
        $query->execute();
    
        return $query;
      }


}

?>
