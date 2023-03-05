<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shorcut icon" href="images/logo.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Page Founisseur</title>
</head>
<body>
<?php 
          include("../ClassePHP/fournisseur.php");
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
        <a class="nav-link disabled" href="#">Partie Gerant</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">liste des fourniseurs </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="AjouterFounisseur.php">Ajouter un fourniseur </a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" action="../index.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Deconnexion</button>
    </form>
  </div>
</nav>

<div class="container mt-5">
<h2 class="mb-4">Listes des fournisseurs </h2>
      
        
      <div class="form-row">
              <div class="col-md-12 mb-3">
               <table  class="table table-hover"> 
            <tr class="thead-dark">
               <th>Identifiant</th><th>Nom</th><th>Prenom</th><th>Tel</th><th>Email</th><th>Adresse</th><th>Action</th>
            </tr>
          <?php

                    try {
                                $con=Connect();
                                $stmt=$con->prepare("SELECT * FROM fournisseur") ;
                                $stmt->execute();
                            }catch(PDOException $e)
                            {
                                 echo  $e->getMessage();
                            }
                    while($ligne=$stmt->fetch()){
                      echo "<tr>";
                      echo "<td>".$ligne["id_fournisseur"]."</td>";
                      echo "<td>".$ligne["nom_fournisseur"]."</td>";
                      echo "<td>".$ligne["prenom_fournisseur"]."</td>";
                      echo "<td>".$ligne["tel_fournisseur"]."</td>";
                      echo "<td>".$ligne["email_fournisseur"]."</td>";
                      echo "<td>".$ligne["adress_fournisseur"]."</td>";
                         echo "<td><a href='SupFournisseur.php?id_fournisseur=".$ligne["id_fournisseur"]." ' onclick='return confirm(\"Voulez vous supprimer?\");' ><img src='../images/delete.png' style='height:20px;width:20px;' /></a> <td>";
                      echo "</tr>";
                       
                    }

                                                        
          ?>
          
          </table> 
              </div>
        
      </div>
</div>

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
