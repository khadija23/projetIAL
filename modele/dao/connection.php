<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=actualites;charset=utf8', 'line', 'passer');
}
catch (Exception $e)
{
	echo "Erreur de connexion à la base de données : ".$e->getMessage();
	$bdd = "nkjlblj";
}
?>
