<?php 

class responsable {
    public  $id_resp;
    public  $nom_resp;
    public  $prenom_resp;
    public  $tel_resp;
    public  $adress_resp;


    public function __construct($id_resp,$nom_resp,$prenom_resp,$email_fourn,$adress_resp) {
        $this->id_resp= $id_resp;
        $this->nom_resp= $nom_resp;
        $this->prenom_resp= $prenom_resp;
        $this->tel_resp= $tel_resp;
        $this->adress_resp= $adress_resp;
    }
}

?>