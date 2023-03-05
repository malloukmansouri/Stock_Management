<?php
            include("../BD/connectDB.php");
			$id=$_GET['num_entrepot'];
				try {
				  
                          $con=Connect(); 
						  $req="delete  FROM entrepot where num_entrepot='".$id."'";
						  $stmt=$con->prepare($req) ;
						  $stmt->execute();
						  header("location:Afficherentrepot.php");    
				}
				catch(PDOException $e)
				    {
				         echo  $e->getMessage();
				    }
?>