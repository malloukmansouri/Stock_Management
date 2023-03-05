<?php 

class commande {
    public  $resp;
    public  $nom_com;
    public  $qte_com;
    public  $type;
    public  $date_com;

    public function __construct($resp,$nom_com,$qte_com,$type,$date_com) {
        $this->resp= $resp;
        $this->nom_com= $nom_com;
        $this->qte_com= $qte_com;
        $this->type= $type;
        $this->date_com= $date_com;
    }
}

?>