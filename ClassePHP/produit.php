<?php 

class produit {
    public  $id_commande;
    public  $id_resp;
    public  $nom_prod;
   
    public function __construct($nom_prod,$id_commande,$id_resp) {
        $this->nom_prod= $nom_prod;
        $this->id_commande= $id_commande;
        $this->id_resp= $id_resp;
       
    }
}

?>