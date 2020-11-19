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
            <!-- zone de connexion -->
            
         <form id="ajout_cat" role="form" action="/diop/index.php" method="POST"  >
         
            
            <label for="Ientifiant"><b>Identifiant</b></label>
		<input type="number" name="idCat" id="idCat">
		
		<label for="libelle"><b>Libelle</b></label>
		<input type="text" name="libelle" id="libelle">
		
           <input type="submit"   name="ajouter_Cat"value="ajouter">

       </form>
        </div>

         
        <center>
 
	
</body>
</html>