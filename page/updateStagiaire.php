<?php
require_once("identifier.php");
require_once('connexiondb.php');
$idS=isset($_post['idS'])?$_post['idS']:0;
$nom=isset($_post['nom'])?$_post['nom']:"";
$prenom=isset($_post['prenom'])?$_post['prenom']:"";
$civilite=isset($_post['civilite'])?$_post['civilite']:"";
$idFiliere=isset($_post['idfiliere'])?$_post['idfiliere']:1;

$nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
$imageTemp=$_FILES['photo']['tmp_name'];
move_uploaded_file($imageTemp,"../image/".$nomPhoto);   

if(!empty($nomPhoto)){
      $requete="update stagiaire set nom=? , prenom=? , civilite=? , idfiliere=? , photo=? where idstagiaire=?";
      $params=array($nom,$prenom,$civilite,$idFiliere,$nomPhoto,$idS);

    }
else {
    $requete="update stagiaire set nom=? , prenom=? , civilite=? , idfiliere=? where idstagiaire=?";
      $params=array($nom,$prenom,$civilite,$idFiliere,$idS);
}
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:stagiaires.php');
?>