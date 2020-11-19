<?php 

include './soap-ws/nusoap-0/lib/nusoap.php';
include 'modele/dao/UserDaoSoap.php';


	$server=new soap_server();
	$server->configureWSDL('server','urn:server');
	 
	//ajouter utilisateur		
	$server->register('addUserSoap',
					array('nom'=>'xsd:string',
						'prenom'=>'xsd:string',
						'login'=>'xsd:string',
						'mdp'=>'xsd:string',
						'status'=>'xsd:int'),
					array('return'=>'xsd:int'));

	//ajouter utilisateur		
	$server->register('editUserSoap',
					array('id'=>'xsd:int',
						'nom'=>'xsd:string',
						'prenom'=>'xsd:string',
						'login'=>'xsd:string',
						'mdp'=>'xsd:string'),
					array('return'=>'xsd:int'));

//afficher l'ensemble des utilisateur
$server->register('getUsersSoap',array(),array('return'=>'xsd:string'));

//afficher un seul utilisateur
$server->register('getUserSoap',
				array('id'=>'xsd:int'),
				array('return'=>'xsd:string'));

//authentification
$server->register('verifUserSoap',
				array('username'=>'xsd:string',
						'pwd'=>'xsd:string'),
				array('return'=>'xsd:int'));


//supprimer un utilisateur
$server->register('deleteUserSoap',
				array('id'=>'xsd:int'),
				array('return'=>'xsd:int'));

		$HTTP_RAW_POST_DATA=isset($HTTP_RAW_POST_DATA)?$HTTP_RAW_POST_DATA:'';
		$server->service(file_get_contents("php://input"));
		
?>