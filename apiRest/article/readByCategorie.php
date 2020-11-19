<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
  //  include database and object files
include_once '../config/ConnexionManager.php';
include_once '../modele/Article.php';
// database connection will be here
if($_SERVER['REQUEST_METHOD'] == 'GET'){
$database = new ConnexionManager();
$db = $database->getInstance();

;
// no products found will be here
$categorie = new Article($db);
$stat = $categorie->readByCategorie();
$numero = $stat->rowCount();

if($numero>0){
  
    // products array
    $categorie_arr=array();
    $categorie_arr["categories"]=array();
    // $new_arr[$categorie_arr] =array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stat->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
       
        $article_item=array(

            "id" => $id,
            "titre" => $titre,
            "contenu" => $contenu,
            "categorie" => $categorie,
            "dateCreation" => $dateCreation,
            "dateModification" => $dateModification
        );
        array_push($categorie_arr["categories"], $article_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
    $format =$_GET["format"];

    if($format =='json')
    { 

        echo json_encode($categorie_arr);
    }
    // show products data in json format
    

else
{
    header("Content-Type: application/xml; charset=UTF-8");

      $xml =new SimpleXmlElement('<racine/>');

      $article_node=$xml->addChild('article');

      foreach ($categorie_arr as $article) {

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

?>