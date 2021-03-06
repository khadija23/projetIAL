<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
  
// database connection will be here
// / include database and object files

include_once '../config/ConnexionManager.php';
include_once '../modele/Article.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
// instantiate database and product object
$database = new ConnexionManager();
$db = $database->getInstance();
  
// initialize object
$article = new Article($db);


  
// query products
$stmt = $article->read();
$num = $stmt->rowCount();
//query articles

  
// check if more than 0 record found
if($num>0){
  
    // products array
    $article_arr=array();
    $article_arr["articles"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
       
        $article_item=array(
            "id" => $id,
            "titre" => $titre,
            "contenu" => html_entity_decode($contenu),
            "categorie" => $categorie,
            
         	// "libelle"=>$libelle,
            "dateCreation" => $dateCreation,
             "dateModification" => $dateModification
        );
  
        array_push($article_arr["articles"], $article_item);
    }
  
    http_response_code(200);
          
    // Affichage données au format json

    $format =$_GET["format"];

    if($format =='json')
    { 

    echo json_encode($article_arr);
    }
    else
    {
        header("Content-Type: application/xml; charset=UTF-8");

          $xml =new SimpleXmlElement('<racine/>');

          $article_node=$xml->addChild('article');

          foreach ($article_arr as $article) {

            foreach ($article as $key) {

            $article_node->addChild('id',$key['id']);
            $article_node->addChild('titre',$key['titre']);
            $article_node->addChild('contenu',$key['contenu']);
            $article_node->addChild('categorie',$key['categorie']);
            $article_node->addChild('dateCreation',$key['dateCreation']);
            $article_node->addChild('dateModification',$key['dateModification']);

            }
              
          }
         // var_dump($xml->asXML());
          echo $xml->asXML();
    }
}

else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "Aucun article trouvee.")
    );
}
}
  