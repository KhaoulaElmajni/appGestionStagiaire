<?php
require_once("identifier.php");
require_once('connexiondb.php');

$requeteF="select * from filiere";
$resultatF=$pdo->query($requeteF);

?>
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <meta charset="utf-8"> 
        <tit> Nouveau Stagiaire </tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </HEAD>
    <BODY>
    <?php include("menu.php"); ?>
        
        <div class="container">
        <div class="panel panel-primary margetop60">
            <div class="panel-heading">Les informations du stagiaire : </div>
                <div class="panel-body">
                    <form method="post" action="insertStagiaire.php" class="form" enctype="multipart/form-data">
                        
                        <div class="form-group">
                       
                      <label for="nom"> Nom :</label> 
                       <input type="text" name="nom" placeholder="taper le nom " class="form-control"/>
                         </div>
                        <div class="form-group">
                       
                      <label for="prenom"> Prénom :</label> 
                       <input type="text" name="prenom" placeholder="taper le prénom " class="form-control"/>
                         </div>
                        <div class="form-group">
                       
                      <label for="civilite"> civilité :</label> 
                            <div class="radio">
                                 <label><input type="radio" name="civilite" value="F" "checked"/> F </label><br>
                                 <label><input type="radio" name="civilite" value="F" "checked"/> M </label>

                            </div>
                      
                         </div>
                        <div class="form-group">
                          <label for="idFiliere">Filière :</label> 
                       <select name="idFiliere" class="form-control" id="idFiliere"  > 
                           
                           <?php while($filiere=$resultatF->fetch()) { ?>
                               <option value=" <?php echo $filiere['idFiliere'] ?>" >
                                       
                               <?php echo $filiere['nomfiliere'] ?>
                           </option>
                           <?php }?>
                       </select>
                             </div>
                        <div class="form-group">
                       
                      <label for="prenom"> Photo :</label> 
                       <input type="file" name="photo" >
                         </div>
                       <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save" ></span>Enregistrer...</button>
                       
                    </form>
            
                
            </div>            
          </div>        
        </div>
    </BODY>
</HTML>