<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gsef;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



$req = $bdd->prepare('INSERT INTO preinscrit (nom, prenom, gender, dateN, lieuN, adresse, niveauEtu, telephone, formation, email, occupation, disponibilité)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

if($_POST['nivoEtude'] == "autre"){
        $req->execute(array($_POST['name'], $_POST['lname'], $_POST['gender'], $_POST['dn'], $_POST['ln'], $_POST['adr'], $_POST['autre'], $_POST['tlf'], $_POST['type'], $_POST['mail'], $_POST['occup'], implode(", ", ($_POST['dispo']))));
}
else{
        $req->execute(array($_POST['name'], $_POST['lname'], $_POST['gender'], $_POST['dn'], $_POST['ln'], $_POST['adr'], $_POST['nivoEtude'], $_POST['tlf'], $_POST['type'], $_POST['mail'], $_POST['occup'], implode(", ", ($_POST['dispo']))));
}

header('Location: ../formations/BureautiquePack/WindowsInitiatition.html');
die;




?>