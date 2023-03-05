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

      <li class="nav-item">
        <a class="nav-link" href="AfficherFounisseur.php">liste des fourniseurs </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">Ajouter un fourniseur </a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" action="../index.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Deconnexion</button>
    </form>
  </div>
</nav>

<div class="container mt-5">
<h2 class="mb-4">Ajouter un fournisseur </h2>

<form method="post">
    <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom" required> 
            </div>

            <div class="col-md-6 mb-3">
              <label for="Prenom">Prenom</label>
              <input type="text" class="form-control" name="Prenom" required> 
            </div>
      
    </div>

     <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="tel">Telephone</label>
              <input type="text" class="form-control" name="tel" required> 
            </div>

            <div class="col-md-6 mb-3">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" required> 
            </div>
      
    </div>

    <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="adr">Adresse</label>
              <input type="text" class="form-control" name="adr" required> 
            </div>

         
      
    </div>
  <button class="btn btn-primary btn-lg btn-block mt-3" type="submit" name="Ajouter">Valider</button>
    </form>
</div>
</div>

<?php

if(isset($_POST["Ajouter"])){    
$fr=new fournisseur($_POST["nom"],$_POST["Prenom"],$_POST["tel"],$_POST["email"],$_POST["adr"]);
try {
        $req="INSERT INTO fournisseur(`nom_fournisseur`, `prenom_fournisseur`, `tel_fournisseur`, `email_fournisseur`, `adress_fournisseur`) 
         values('$fr->nom_fourn','$fr->prenom_fourn','$fr->tel_fourn','$fr->email_fourn','$fr->adress_fourn')";
        $con=Connect();
        $stmt=$con->prepare($req) ;
        $stmt->execute();
        header("location:AfficherFounisseur.php");          
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