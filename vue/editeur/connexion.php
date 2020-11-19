<!DOCTYPE html>
<html>
<head>
	<title></title>
   <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>

 <!-- <form class="" role="form" action="../../index.php?action=connexionediteur&login=$_GET['login'];&password=$_GET['password'];" method="get"> -->
 <div id="container">
            <!-- zone de connexion -->
            
            <form  class="" role="form" action="../../index.php" method="POST" >
                <h1>Connexion</h1>
                
                <label><b>Login</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" id="login" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" id="password" required>

                <input type="submit"  name="authentifier"  value='LOGIN' >
               
            </form>
        </div>
        <center>
 <!-- //////////////// -->
 	<!-- <form  class="" role="form" action="../../index.php" method="POST" >
        <div>Login
           <input type="text" name="login" id="login"> 
        </div>
        <div>mot de passe
           <input type="password" name="password" id="password"> 
        </div>

        <button type="submit"  name="authentifier" class="">valider</button>
        
    </form> -->
                    
</body>
</html>