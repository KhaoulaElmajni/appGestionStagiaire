<?php
require_once("connexiondb.php");
require_once("identifier.php");

/*$nomf=isset($_GET['nomF'])?$_GET['nomF']:"";
$niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";*/

$nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
$idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;
$size=isset($_GET['size'])?$_GET['size']:6;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$size;

$requeteFiliere="select *from filiere";

if($idfiliere==0){
    $requeteStagiaire="select idstagiaire,nom,prenom,civilite,photo,idfiliere
    from filiere as f,stagiaire as s where f.idfiliere=s.idfiliere and  (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') 
    order by idstagiaire limit $size offset $offset";
    $requeteCount="select count(*) countS from stagiaire where nom like '%$nomPrenom%' or prenom like '%$nomPrenom'";
    }else{
    $requeteStagiaire="select idstagiaire,nom,prenom,civilite,photo,idfiliere
    from filiere as f,stagiaire as s where f.idfiliere=s.idfiliere and  (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
    and f.idfiliere=$idfiliere order by idstagiaire limit $size offset $offset";
    $requeteCount="select count(*) countS from stagiaire where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') and idfiliere=$idfiliere" ;
}
$resultatFiliere=$pdo->query($requeteFiliere);

$resultatStagiaire=$pdo->query($requeteStagiaire);
$resultatCount=$pdo->query($requeteCount);

$tabCount=$resultatCount->fetch();
$nbrStagiaire=$tabCount['countS'];
$reste=$nbrStagiaire % $size;
if($reste===0)
    $nbrPage=$nbrStagiaire/$size;
else 
    $nbrPage=floor($nbrStagiaire/$size)+1;//floor= la partie entiered'un nbr decimale
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"> 
        <tit> Gestion des stagiaires </tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
    <?php include("menu.php"); ?>
        <div class="container">
          <div class="panel panel-success margetop">
            <div class="panel-heading">Rechercher des stagiaires... </div>
                <div class="panel-body">
                   <form method="get" action="stagiaires.php" class="form-inline">
                       <div class="form-group">
                       
                      
                       <input type="text" name="nomPrenom" placeholder="Nom et Prenom " class="form-control" value="<?php echo $nomPrenom ?>"/>
                         </div>
                          <label for="idfiliere">Filière :</label> 
                       <select name="idfiliere" class="form-control" id="idfiliere"
                               onchange="this.form.submit()"(> 
                           <option value=0>Toutes les filières </option>
                           <?php while($filiere=$resultatFiliere->fetch()) { ?>
                           <option value="<?php echo $filiere['idfiliere'] ?>"
                                   <?php if($filiere['idfiliere'] ===$idfiliere) echo "selected" ?> >
                               <?php echo $filiere['nomfiliere'] ?>
                           </option>
                           <?php } ?>
                       </select>
                       <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search" ></span>Chercer...</button>
                       
                       <a href="nouveauStagiaire.php"><span class="glyphicon glyphicon-plus" ></span> nouveau Stagiaire  </a>
                    </form>
            </div>            
            </div>
                <div class="panel panel-primary ">
            <div class="panel-heading">Liste des Stagiaires(<?php echo $nbrStagiaire ?> Stagiaires)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id Stagiaire</th><th>Nom</th><th>Prenom</th><th>Filière</th><th>Photo</th><th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php while($stagiaire=$resultatStagiaire->fetch()){ ?>
                               <tr>
                                    <td><?php echo $stagiaire['idstagiaire'] ?></td>  
                                    <td><?php echo $stagiaire['nom'] ?></td>  
                                    <td><?php echo $stagiaire['prenom'] ?></td>
                                    <td><?php echo $stagiaire['idfiliere'] ?></td>
                                   <td>
                                       <img src="../image/<?php echo $stagiaire['photo'] ?>" 
                                            width="50px" hieght="50px" class="img-circle">
                                   </td>
                                   <td> 
                                          <a href="editerStagiaire.php?idS=<?php echo $stagiaire['idstagiaire'] ?>">
                                       <span class="glyphicon glyphicon-edit" ></span>
                                              </a>
                                       &nbsp; &nbsp;
                                          <a onclick="return confirm('etes-vous sur de vouloir supprimer stagiaire')"
                                             href="supprimerStagiaire.php?idS=<?php echo $stagiaire['idstagiaire'] ?>">
                                       <span class="glyphicon glyphicon-trash" ></span>
                                       </a>
                                   </td>
                                </tr>
                                <?php }  ?> 
                 </tbody>
               </table>
                    <div>
                        <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                       <li class="<?php if($i==$page) echo 'active' ?>"> 
     <a href="stagiaires.php?page=<?php echo $i;?>&nomPrenom=<?php echo $nomPrenom ?>&idfiliere=<?php echo $idfiliere ?>"> 
                           <?php echo $i; ?>
                           </a>
                            </li> 
                       <?php } ?>
                            </ul>
                    </div>
            </div>            
          </div>        
        </div>
        
    </body>
    
</html>