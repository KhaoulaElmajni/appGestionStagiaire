<?php
try{
    $pdo=new PDO("mysql:host=localhost;dbname=gestionstage","root","");
}
catch(Exception $e){
  die('erreur de connexion:'.$e->getMessage());
}
    
?>