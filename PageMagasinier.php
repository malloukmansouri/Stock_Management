<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shorcut icon" href="images/logo.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.min.css">
    <title>Page Magasinier</title>
</head>
<body>
<?php 
          include("ClassePHP/produit.php");
          include("BD/connectDB.php");
        ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a  class="navbar-brand fw-bolder">Gestion de Stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    <li class="nav-item">
        <a class="nav-link disabled" href="#">Partie Magasinier</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">Ajouter un produit </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Vérifier le stock </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Deconnexion</button>
    </form>
  </div>
</nav>

<div class="container mt-5">
  <div class="row">
<div class="col-md-4">
        <h2 class="mb-4 fw-bolder">Ajouter un produit</h2>

<form method="post">
    <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="nom">Nom du produit</label>
              <input type="text" class="form-control" name="nom" required> 
            </div>
    </div>
    <div class="form-row">
    <div class="col-md-12 mb-3">
              <label for="com">Commande</label>
              <select name="com" class="custom-select mb-3 form-control" required>
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
    </div>
    <div class="form-row">
    <div class="col-md-12 mb-3">
              <label for="res">Responsable</label>
              <select name="res" class="custom-select mb-3 form-control" required>
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
    
  <button class="btn btn-primary btn-block btn-lg mt-2" type="submit" name="Ajouter">Valider</button>
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
       
       <div class="col-md-8">
  <h2 class="fw-bolder">Liste des produits</h2>
                       <table  class="table table-striped"> 
                    <tr class="thead-dark">
                       <th>Identifiant</th><th>Nom produit</th> <th>Nom commande</th>
                    </tr>
                    <tbody>
                  <?php

                            try {
                                        $con=Connect();
                                        $stmt=$con->prepare("SELECT * FROM produit p,commande c WHERE c.id_commande=p.id_commande") ;
                                        $stmt->execute();
                                    }catch(PDOException $e)
                                    {
                                         echo  $e->getMessage();
                                    }
                            while($ligne=$stmt->fetch()){
                              echo "<tr>";
                              echo "<td>".$ligne["id_prod"]."</td>";
                              echo "<td>".$ligne["nom_prod"]."</td>";
                              echo "<td>".$ligne["nom_com"]."</td>";
                              echo "</tr>";
                               
                            }

                                                                
                  ?>
                  </tbody>
                  </table> 
                      </div>



</div>
</div>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>