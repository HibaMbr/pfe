<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gsef;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$req = $bdd->prepare('INSERT INTO preinscrit (nom, prenom, gender, dateN, lieuN, adresse, niveauEtu, telephone, formation, email, occupation, disponibilité) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$req->execute(array($_POST['name'], $_POST['lname'], $_POST['gender'], $_POST['dn'], $_POST['ln'], $_POST['adr'], $_POST['netude'], $_POST['tlf'], $_POST['type'], $_POST['email'], $_POST['occup'], $_POST['dispo']));




header('Location: formations.html');




?>