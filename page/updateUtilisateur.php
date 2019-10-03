<?php
require_once("identifier.php");
require_once('connexiondb.php');
$idUser=isset($_post['idUser'])?$_post['idUser']:0;
$login=isset($_post['login'])?$_post['login']:"";
$email=isset($_post['email'])?$_post['email']:"";
$role=isset($_post['role'])?$_post['role']:"F";

      $requete="update utilisateur set login=? , email=? , role=? where idutilisateur=?";
      $params=array($login,$email,$role,$idUser);

    
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:utilisateurs.php');
?>