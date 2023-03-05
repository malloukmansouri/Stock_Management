<?php
            include("../BD/connectDB.php");
			$id=$_GET['id_fournisseur'];
				try {
				  
                          $con=Connect(); 
						  $req="delete  FROM fournisseur where id_fournisseur='".$id."'";
						  $stmt=$con->prepare($req) ;
						  $stmt->execute();
						  header("location:AfficherFounisseur.php");    
				}
				catch(PDOException $e)
				    {
				         echo  $e->getMessage();
				    }
?>