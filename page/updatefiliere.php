<?php 
require_once("identifier.php");
require_once('connexiondb.php');
$idf=isset($_post['idF'])?$_post['idF']:0;
$nomf=isset($_post['nomF'])?$_post['nomF']:"";
$niveau=isset($_post['niveau'])?strtoupper($_post['niveau']):"";
$requete="update filiere set nomfiliere=? , niveau=? where idfiliere=?";
$params=array($nomf,$noveau,$idf);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:filieres.php');
?>