<?php
require_once("identifier.php");
$message=isset($_GET['message'])?$_GET['message']:"erreur";
                                       
?>
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <meta charset="utf-8"> 
        <tit>Alerte</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </HEAD>
    <BODY>
    <?php include("menu.php"); ?>
                   
        
        <div class="container">
        <div class="panel panel-danger margetop">
            <div class="panel-heading"><H4>Erreur:</H4></div>
                <div class="panel-body">
                    <h3><?php echo $message ?></h3>      
                   <H4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" >Retour >>>></a></H4> 
            </div>            
          </div>        
        </div>
    </BODY>
</HTML>