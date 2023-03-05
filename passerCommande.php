
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.min.css">
</head>
<?php 
          include("ClassePHP/commande.php");
          include("BD/connectDB.php");
?>
        <div class="container mt-5">
        <h2 class="mb-4 fw-bolder">Ajouter une commande</h2>
<div class="container">
<form method="post">
    <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom" required> 
            </div>

            <div class="col-md-6 mb-3">
              <label for="type">Type</label>
              <input type="text" class="form-control" name="type" required> 
            </div>
      
    </div>

     <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="qte">Quantité</label>
              <input type="text" class="form-control" name="qte" required> 
            </div>

            <div class="col-md-6 mb-3">
              <label for="dte">Date</label>
              <input type="date" class="form-control" name="dte" required> 
            </div>
      
    </div>

    <div class="form-row">
      <div class="col-md-12 mb-3">
        <label for="res">Responsable</label>
        <select name="res" class="form-control custom-select" required>
          <option selected disabled >Choisir le responsable</option>
            <optgroup>  
              <?php    
                $con=Connect();
                $req=$con->prepare("SELECT * FROM responsabl_stock") ;
                $req->execute();       
                while($ligne=$req->fetch()) {
                  echo "<option value".$ligne['prenom_resp'].">".$ligne['prenom_resp']."</option>";
                }
              ?>   
            </optgroup>
        </select> 
      </div>

    </div>
  <button class="btn btn-primary btn-block btn-lg mt-3" type="submit" name="Ajouter">Valider</button>
</form>
        </div>

        </div>

    <?php
  
    if(isset($_POST["Ajouter"])){   
    $con=Connect(); 
       $stmt1=$con->prepare("select * from responsabl_stock where  prenom_resp='".$_POST["res"]."'") ;
       $stmt1->execute();
       $tble=$stmt1->fetch();
       $Id_res=$tble['id_resp'];

      $cm=new commande($Id_res,$_POST["nom"],$_POST["qte"],$_POST["type"],$_POST["dte"]);
        try {
                $r="INSERT INTO `commande`(`nom_com`, `qte_com`, `type`, `date_com`, `id_resp`)
                 values('$cm->nom_com','$cm->qte_com','$cm->type','$cm->date_com','$cm->resp')";
                $st=$con->prepare($r) ;
                $st->execute();
                          
           }        
        catch(PDOException $e)
            {
                 echo  $e->getMessage();
            }
    }
      
      ?>
       
            
