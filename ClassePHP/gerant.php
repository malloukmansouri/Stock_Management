<?php 

class gerant {
    public  $id_admin;
    public  $nom_admin;
    public  $tel_admin;
    public  $email_admin;
    public  $adress_admin;


    public function __construct($id_admin,$nom_admin,$tel_admin,$email_admin,$adress_admin) {
        $this->id_admin= $id_admin;
        $this->nom_admin= $nom_admin;
        $this->tel_admin= $tel_admin;
        $this->email_admin= $email_admin;
        $this->adress_admin= $adress_admin;
    }
}

?>