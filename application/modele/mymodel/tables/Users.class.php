<?php
class User extends Query {

    public $user_password_hash;
    public $user_email;

    public $user_type;
    public $id_client;
    public $id_compagnie;
    public $id_agent;
    function __construct($user_password_hash="", $user_email="", $user_type="", $id_client="", $id_compagnie="", $id_agent="") {
        $this->user_password_hash = $user_password_hash;
        $this->user_email = $user_email;
        $this->user_type = $user_type;
        $this->id_client = $id_client;
        $this->id_compagnie = $id_compagnie;
        $this->id_agent = $id_agent;
    }
    
    


}
?>
