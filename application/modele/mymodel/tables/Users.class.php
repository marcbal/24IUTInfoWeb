<?php
class Users extends Table {

    public $user_password_hash;
    public $user_email;

    public $user_type; // ENUM agent, compagnie, client
    public $id_client;
    public $id_compagnie;
    public $id_agent;
    function __construct($user_password_hash="", $user_email="", $user_type="", $id_client="", $id_compagnie="", $id_agent="") {
        parent::__construct();
        $this->user_password_hash = $user_password_hash;
        $this->user_email = $user_email;
        $this->user_type = $user_type;
        $this->id_client = $id_client;
        $this->id_compagnie = $id_compagnie;
        $this->id_agent = $id_agent;
    }


    public function loadClient($queryClient){
        $tmp = $queryClient->findById($this->id_client);
        $this->nom = $tmp->nom;
        $this->adresse = $tmp->adresse;
    }

    public function loadCompagnie($queryCompagnie){
        $tmp = $queryCompagnie->findById($this->id_compagnie);
        $this->nom = $tmp->nom;
        $this->pays = $tmp->pays;
    }

}
?>
