<?php
require_once("identifier.php");
require_once('connexiondb.php');
$idf=isset($_GET['idF'])?$_GET['idF']:0;
$requete="select * from filiere where idfiliere=$idf";
$resultat=$pdo->query($requete);
$filiere=$resultat->fetch();
$nomf=$filiere['nomfiliere'];
$niveau=strtolower($filiere['niveau']);
?>
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <meta charset="utf-8"> 
        <tit> Edition d'une Filière</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </HEAD>
    <BODY>
    <?php include("menu.php"); ?>
        
        <div class="container">
        <div class="panel panel-primary margetop60">
            <div class="panel-heading">Edition de la filière: </div>
                <div class="panel-body">
                    <form method="post" action="updateFiliere.php" class="form">
                        
                       <div class="form-group">
                       
                      <label for="niveau">id de la filière : <?php echo $idf ?></label> 
                       <input type="hidden" name="idf" class="form-control" value="<?php echo $idf ?>"/>
                         </div>
                        <div class="form-group">
                       
                      <label for="niveau">Nom de la filière :</label> 
                       <input type="text" name="nomF" placeholder="taper le nom de la filière " class="form-control" value="<?php echo $nomf ?>"/>
                         </div>
                        <div class="form-group">
                          <label for="niveau">Niveau :</label> 
                       <select name="niveau" class="form-control" id="niveau"  > 
                           
                           <option  value="m" <?php if($niveau=="m") echo "selected" ?> >Master  </option>
                           <option  value="l" <?php if($niveau=="l") echo "selected" ?> >licence  </option>
                           <option  value="ts" <?php if($niveau=="ts") echo "selected" ?> >Technicien spécialisé</option>
                           <option  value="t" <?php if($niveau=="t") echo "selected" ?>  >Technicien </option>
                           <option  value="q" <?php if($niveau=="q") echo "selected" ?> >Qualification </option>
                       </select>
                             </div>
                       <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save" ></span>Enregistrer...</button>
                       
                    </form>
            
                
            </div>            
          </div>        
        </div>
    </BODY>
</HTML>