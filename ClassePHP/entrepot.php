<?php 

class entrepot {
    public  $id_prod;
    public  $nom_entrepot;
    public  $id_resp;

   
    public function __construct($id_prod,$nom_entrepot,$id_resp) {
        $this->id_resp= $id_resp;
        $this->nom_entrepot= $nom_entrepot;
        $this->id_prod= $id_prod;
    }
}

?>