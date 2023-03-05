<?php
     include("BD/connectDB.php");    
     $login=$_POST['username'];
     $psw=$_POST['password'];
     $type_user=$_POST['type'];

    
     try{  
            $con=Connect();
            $req1="select login,password from users where login='$login' and password='$psw';";
            $stmt1=$con->prepare($req1) ;
            $stmt1->execute();
          
            if($stmt1->rowCount()==1 && strcmp($type_user,"responsable") == 0) {
              header("location:PageResponsable.php");
            }else if($stmt1->rowCount()==1 && strcmp($type_user,"gerant") == 0){
              header("location:fournisseur/AfficherFounisseur.php");
            }  else if($stmt1->rowCount()==1 && strcmp($type_user,"magasinier") == 0){
              header("location:PageMagasinier.php");
            } else{
              header("location:index.php");
            }        
             
     }catch(PDOException $e)
            {
                 echo  $e->getMessage();
            }

?>