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
          include("../ClassePHP/entrepot.php");
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

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Produit
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../produit/AfficherProduit.php">liste des produits</a>
          <a class="dropdown-item" href="../produit/AjoutProduit.php">Ajouter un produit</a>
        </div>
      </li>
      
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Entrepôts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Afficherentrepot.php">liste des entrepôts</a>
          <a class="dropdown-item" href="#">Ajouter entrepôt</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="../index.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Deconnexion</button>
    </form>
  </div>
</nav>



<div class="container mt-5">
<h2 class="mb-4">Ajouter un entrepôt</h2>

<form method="post" class="mt-5">
    <div class="form-row">
       <div class="col-md-4">
          <label for="nom">Nom de l'entrepôt</label>
          <input type="text" class="form-control" name="nom" required> 
        </div>
        <div class="col-md-4">
        <label for="prd">Produit</label>
        <select name="prd" class="form-control" required>
        <option selected disabled >selecter un produit</option>
        <optgroup>  
          <?php    
            $con=Connect();
            $req=$con->prepare("SELECT * FROM produit") ;
            $req->execute();       
            while($ligne=$req->fetch()) {
              echo "<option value".$ligne['nom_prod'].">".$ligne['nom_prod']."</option>";
            }
          ?>   
        </optgroup>
        </select> 
     </div>

     <div class="col-md-4">
    <label for="res">Responsable</label>
    <select name="res" class="form-control" required>
    <option selected disabled >selecter un responsable</option>
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

    
  <button class="btn btn-primary btn-block btn-lg mt-5" type="submit" name="Ajouter">Valider</button>
    </form>
</div>
</div>

<?php

if(isset($_POST["Ajouter"])){   
$con=Connect(); 
$st1=$con->prepare("select * from responsabl_stock where  prenom_resp='".$_POST["res"]."'") ;
$st1->execute();
$tble=$st1->fetch();
$Id_res=$tble['id_resp'];


$st2=$con->prepare("select * from produit where  nom_prod='".$_POST["prd"]."'") ;
$st2->execute();
$tble1=$st2->fetch();
$Id_prod=$tble1['id_prod'];

echo $Id_prod;
echo $Id_res;
$pr=new entrepot($Id_prod,$_POST["nom"],$Id_res);
try {
        $r="INSERT INTO `entrepot`(`nom_entrepot`, `id_resp`, `id_prod`)
         values('$pr->nom_entrepot','$pr->id_resp','$pr->id_prod')";
        $st3=$con->prepare($r) ;
        $st3->execute();
                  
   }        
catch(PDOException $e)
    {
         echo  $e->getMessage();
    }
}

?>  
</div>
       
            


<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>



        