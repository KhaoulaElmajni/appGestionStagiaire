<?php
require_once("identifier.php");
require_once('connexiondb.php');
$nomf=isset($_post['nomF'])?$_post['nomF']:"";
$niveau=isset($_post['niveau'])?strtoupper($_post['niveau']):"";
$requete="insert into filiere (nomfiliere,niveau) values(?,?)";
$params=array($nomf,$noveau);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:filieres.php');
?>