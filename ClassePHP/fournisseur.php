<?php 

class fournisseur {
    public  $nom_fourn;
    public  $prenom_fourn;
    public  $tel_fourn;
    public  $email_fourn;
    public  $adress_fourn;

    public function __construct($nom_fourn,$prenom_fourn,$tel_fourn,$email_fourn,$adress_fourn) {
        $this->nom_fourn= $nom_fourn;
        $this->prenom_fourn= $prenom_fourn;
        $this->tel_fourn= $tel_fourn;
        $this->email_fourn= $email_fourn;
        $this->adress_fourn= $adress_fourn;
    }
}

?>