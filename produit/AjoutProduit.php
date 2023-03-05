<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shorcut icon" href="images/logo.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Page Responsable</title>
</head>
<body>
<?php 
          include("../ClassePHP/produit.php");
          include("../BD/connectDB.php");
        ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a  class="navbar-brand">Gestion de Stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    <li class="nav-item">
        <a class="nav-link disabled" href="#">Partie Responsable</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../PageResponsable.php">Passer la commande </a>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Produit
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="AfficherProduit.php">liste des produits</a>
          <a class="dropdown-item" href="AjoutProduit.php">Ajouter un produit</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Entrepôts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../entrepot/Afficherentrepot.php">liste des entrepôts</a>
          <a class="dropdown-item" href="../entrepot/Ajoutentrepot.php">Ajouter entrepôt</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="../index.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Deconnexion</button>
    </form>
  </div>
</nav>



<div class="container mt-5">
        <h2 class="mb-4">Ajouter un produit</h2>

<form method="post">
    <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="nom">Nom du produit</label>
              <input type="text" class="form-control" name="nom" required> 
            </div>

            <div class="col-md-4 mb-3">
              <label for="com">Commande</label>
              <select name="com" class="form-control" required>
                <option selected disabled >Choisir commande</option>
                  <optgroup>  
                    <?php    
                      $con=Connect();
                      $req=$con->prepare("SELECT * FROM commande") ;
                      $req->execute();       
                      while($ligne=$req->fetch()) {
                        echo "<option value".$ligne['id_commande'].">".$ligne['nom_com']."</option>";
                      }
                    ?>   
                  </optgroup>
              </select> 
            </div>

            <div class="col-md-4 mb-3">
              <label for="res">Commande</label>
              <select name="res" class="form-control" required>
                <option selected disabled >Choisir responsabe</option>
                  <optgroup>  
                    <?php    
                      $con=Connect();
                      $req=$con->prepare("SELECT * FROM responsabl_stock") ;
                      $req->execute();       
                      while($ligne=$req->fetch()) {
                        echo "<option value".$ligne['id_resp'].">".$ligne['prenom_resp']."</option>";
                      }
                    ?>   
                  </optgroup>
              </select> 
            </div>
    </div>
    
  <button class="btn btn-primary btn-block btn-lg mt-5" type="submit" name="Ajouter">Valider</button>
</form>
        </div>



    <?php
  
    if(isset($_POST["Ajouter"])){   
    $con=Connect(); 
       $stmt1=$con->prepare("select * from responsabl_stock where  prenom_resp='".$_POST["res"]."'") ;
       $stmt1->execute();
       $tble=$stmt1->fetch();
       $id_res=$tble['id_resp'];

       $stmt2=$con->prepare("select * from commande where  nom_com='".$_POST["com"]."'") ;
       $stmt2->execute();
       $tble=$stmt2->fetch();
       $id_commande=$tble['id_commande'];

      $prod=new produit($_POST["nom"],$id_commande,$id_res);
        try {
                $r="INSERT INTO `produit`( `nom_prod`, `id_commande`, `id_resp`)
                 values('$prod->nom_prod','$prod->id_commande','$prod->id_resp')";
                $st=$con->prepare($r) ;
                $st->execute();
                          
           }        
        catch(PDOException $e)
            {
                 echo  $e->getMessage();
            }
    }
      
      ?>
       
            


<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

