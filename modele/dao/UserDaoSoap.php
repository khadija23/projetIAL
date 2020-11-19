<?php
    
    //ajouter utilisateur
     function addUserSoap($nom, $prenom, $login, $mdp, $status){
        require_once 'connection.php';
        $request = $this->bdd->prepare("INSERT INTO user(nom,prenom,username,mdp,statut) VALUES(:nom ,:prenom,:username,:mdp,:status)");
 
        $request->execute(array(
            'nom'  => $nom,
            'prenom' => $prenom,
            'username' => $login,
            'mdp' => $mdp,
            'status' => $status
        ));
    
    return 1;

    }
    //afficher l'ensemble des utilisateur
     function getUsersSoap(){
        require_once 'connection.php';
        $data = $this->bdd->query('SELECT * FROM user');
        $user=$data->fetchAll(PDO::FETCH_OBJ);
        return json_encode($user);
        
    }
     function getUserSoap($id){
            require_once 'connection.php';
            $data = $bdd->query('SELECT * FROM user WHERE id = '.$id);
            $user=$data->fetch(PDO::FETCH_OBJ);
            return json_encode($user);
        }


     function testEditeurSoap($username,$pwd)
    {   require_once 'connection.php';
        $reponse = $this->bdd->query('SELECT id FROM user WHERE username=\'' . $username . '\'  AND mdp=\'' . $pwd . '\' and statut=1');

            $donnees = $reponse->fetch();

            if($donnees)   {
                return true;
            } 
            else{
                return false;
                
            }  
    }

    //authentification
     function verifUserSoap($username,$pwd)
    {
        require_once 'connection.php';
        $reponse = $this->bdd->query('SELECT statut FROM user WHERE username=\'' . $username . '\'  AND mdp=\'' . $pwd . '\' ');

            $donnees = $reponse->fetch();

             if($donnees) {
                 
                 return (int)$donnees['statut'];
             } 
             else{

                 return -1;
                
             }  
    }

    //modifier utilisateur
     function editUserSoap($id,$nom,$prenom,$username,$mdp){
        require_once 'connection.php';
         $request = $this->bdd->prepare("UPDATE user set nom=:nom,prenom=:prenom,username=:username,mdp=:mdp  WHERE id=:id");
        
        $result = $request->execute(array(
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'username' => $username,
            'mdp'=> $mdp
            ));
        
        return 1;

        }
        //supprimer utilisateur
     function deleteUserSoap($id){
        require_once 'connection.php';
        $request = $this->bdd->prepare("DELETE from user  WHERE id=:id");
        $request->execute(array(
            'id' => $id
    ));
    return 1;
}
?>