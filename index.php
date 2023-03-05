<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>


<section class="vh-100   p-5 container bg-gray d-flex align-items-center">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
    
    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="GestionLogin.php" method="POST">
          <div class="">
            <p class="h2 text-center text-uppercase fw-bolder">Se Connecter </p>
          </div>

          <br>

          <div class="form-outline mb-4">
            <select class="custom-select custom-select-lg mb-3 form-control" name="type">
                <option value="magasinier">magasinier</option>
                <option value="responsable">responsable</option>
                <option value="gerant">gerant</option>
            </select>
          </div>
          <!-- login input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg" name="username"
              placeholder="Username" />
          </div>

          <!-- mot de passe input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg" name="password"
              placeholder="Mot de passe" />
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
              Souviens-toi de moi
              </label>
            </div>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg btn-block"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Se connecter</button>
            
          </div>

        </form>
      </div>  
    <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="images/illustration.svg" class="img-fluid">
      </div>
    </div>
  </div>
</section>

</body>
</html>