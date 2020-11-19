<?php

require_once 'ConnexionManager.php';
/**
     * Classe de gestion des accès utilisateur
     */
class UserDao 
{
   
    private $id;
    private $nom;
    private $prenom;
    private $username;
    private $mdp;
    private $statut;

        public function __construct()
        {
            $this->bdd = (new ConnexionManager)->getInstance();
        }
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getMdp()
    {
        return $this->mdp;
    }
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    

    public function addUser($nom, $prenom, $login, $mdp){

        $request = $this->bdd->prepare("INSERT INTO user(nom,prenom,username,mdp,statut) VALUES(:nom ,:prenom,:username,:mdp,1)");
 
        $request->execute(array(
            'nom'  => $nom,
            'prenom' => $prenom,
            'username' => $login,
            'mdp' => $mdp,
        ));
    
    return 1;

    }

    public function getUsers(){
    
        $data = $this->bdd->query('SELECT * FROM user');
        return $data->fetchAll(PDO::FETCH_CLASS, 'user');
        
    }
    public function getUser($id){
    
        $data = $this->bdd->query('SELECT * FROM user WHERE id = '.$id);
            return $data->fetch(PDO::FETCH_OBJ);
        }

    public function testEditeur($username,$pwd)
    {
        $reponse = $this->bdd->query('SELECT id FROM user WHERE username=\'' . $username . '\'  AND mdp=\'' . $pwd . '\' and statut=1');

            $donnees = $reponse->fetch();

            if($donnees)   {
                return true;
            } 
            else{
                return false;
                
            }  
    }
    public function verifUser($username,$pwd)
    {

        $reponse = $this->bdd->query('SELECT statut FROM user WHERE username=\'' . $username . '\'  AND mdp=\'' . $pwd . '\' ');

            $donnees = $reponse->fetch();

             if($donnees) {
                 
                 return (int)$donnees['statut'];
             } 
             else{

                 return -1;
                
             }  
    }
    public function editUser($id,$nom,$prenom,$username,$mdp){

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

    public function deleteUser($id){

        $request = $this->bdd->prepare("DELETE from user  WHERE id=:id");
        $request->execute(array(
            'id' => $id
    ));
    return 1;
}

}