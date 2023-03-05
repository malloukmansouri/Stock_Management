<!doctype html>
<html lang="en">
  <head>
    <title>Gestion de stock</title>
    
    <link rel="shorcut icon" href="images/logo.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.min.css">
  </head>
  <body>
        <?php 
        
          include("BD/connectDB.php");
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a  class="navbar-brand fw-bolder">Gestion de Stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    <li class="nav-item active">
        <a class="nav-link disabled " href="fournisseur/AfficherFounisseur.php">Fournisseur</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Deconnexion</button>
    </form>
  </div>
</nav>
      <!-- <nav id="sidebar">
        <div class="">
          <a href="Acceuil.php" class="img logo rounded-circle mb-5" style="background-image: url(images/logo1.jpg);"></a>
          <ul class="list-unstyled components">
            
            <li>
              <a href="fournisseur/AfficherFounisseur.php">fournisseur</a>
            </li>  

            
            <li>
              <a href="index.php">Deconnexion</a>
            </li>  
          </ul>

          

        </div>
      </nav> -->

         <!-- Page Content  -->
      <div id="content" class="">

        <nav class="navbar navbar-expand-lg navbar-light  shadow p-3 mb-5 bg-white rounded border-bottom">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>

            <div class="text-dark h5 fw-light" style="margin:auto;">Liste des produits </div>
        </nav>


      
        <div class="container">
        <h2 class="mb-4 fw-bolder">Listes des produits </h2>

              <div class="row">
                      <div class="col-md-12 mb-3">
                       <table  class="table table-hover table-striped"> 
                    <tr>
                       <th>Identifiant</th><th>Nom</th><th>Action</th><th></th>
                    </tr>
                  <?php

                            try {
                                        $con=Connect();
                                        $stmt=$con->prepare("SELECT * FROM produit") ;
                                        $stmt->execute();
                                    }catch(PDOException $e)
                                    {
                                         echo  $e->getMessage();
                                    }
                            while($ligne=$stmt->fetch()){
                              echo "<tr>";
                              echo "<td>".$ligne["id_prod"]."</td>";
                              echo "<td>".$ligne["nom_prod"]."</td>";
                            
                                 echo "<td><a href='SupProduit.php?id_prod=".$ligne["id_prod"]." ' onclick='return confirm(\"Voulez vous supprimer?\");' ><img src='images/delete.png' style='height:20px;width:20px;' /></a> <td>";
                              echo "</tr>";
                               
                            }

                                                                
                  ?>
                  
                  </table> 
                      </div>
                
              </div>
              </div>
        </div>
    
                          </div>
    
       <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
            
