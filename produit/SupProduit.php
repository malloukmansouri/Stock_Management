<?php
            include("../BD/connectDB.php");
			$id=$_GET['id_prod'];
				try {
				  
                          $con=Connect(); 
						  $req="delete  FROM produit where id_prod='".$id."'";
						  $stmt=$con->prepare($req) ;
						  $stmt->execute();
						  header("location:AfficherProduit.php");    
				}
				catch(PDOException $e)
				    {
				         echo  $e->getMessage();
				    }
?>