<!DOCTYPE html>

<html>

    <head>
   
        <title></title>
    <link rel="stylesheet" href="vue/admin/inc/styleAjout.css">
    </head>

    <body>
     <?php require_once 'inc/entete.php';
     ?>
       
        <div id="container">
            <!-- zone de connexion -->
            
            <form id="ajout" role="form" action="/diop/index.php" method="POST"  >
            
            <label><b>Nom</b></label>
            <input type="text" name="nom" id="titre">
            
            <label><b>Prenom</b></label>
            <input type="text" name="prenom" id="prenom">
        
            <label for="login">Nom d'utilisateur</label>
            <input type="text" name="login" id="login">
        
            <label for="mdp">Mot de passe</label>
            <input type="text" name="mdp" id="mdp">

           <input type="submit"  name="creer_utilisateur" value="Créer utilisateur">

       </form>
        </div>

         
        <center>
            </body>

</html> 
<!-- //////////////////////////////////////// -->
      <!--   <form id="ajout" role="form" action="/projetDiop/index.php" method="POST"  >

            <label for="nom">Nom</label>
            <input type="text" name="nom" id="titre">
            
            <label for="prenom">Prenom</label>
            <input type="text-area" name="prenom" id="prenom">
        
            <label for="login">Login</label>
            <input type="text-area" name="login" id="login">
        
            <label for="mdp">Mot de passe</label>
            <input type="text-area" name="mdp" id="mdp">

            <button type="submit"  name="creer_utilisateur" >Créer utilisateur</button>

        </form>
        
    