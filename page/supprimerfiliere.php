<?php
session_start();
if(isset($_SESSION['user'])){
    require_once('connexiondb.php');
$idf=isset($_GET['idF'])?$_GET['idF']:0;
$requeteStag="select count(*) countStag from stagiaire where idfiliere=$idf";
$resultatStag=$pdo->query($requeteStag);
$tabCountSta=$resultatStag->fetch();
$nbrStag=$tabCountStag['countStag'];

if($nbrStag==0){

$requete="delete from filiere where idfiliere=?";
$params=array($idf);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:filieres.php');
  }
else
{
$msg="suppression impossible: vous devez supprimer tous les stagiaireinscris dans cette filière ";
header("location:alerte.php?message=$msg");
}
    }else{
    header('location:login.php');

}

?>