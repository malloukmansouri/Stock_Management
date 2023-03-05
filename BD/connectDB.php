<?php
function Connect(){

           try{
                $conn = new PDO("mysql:host=localhost;dbname=bd_gestiondestock",'root','');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
            }
            
            catch(PDOException $e){
              echo "Message d'erreur : " . $e->getMessage();
            }
        return $conn;
}
?>