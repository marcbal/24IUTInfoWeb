<?php
class User extends Query {
    public $user_password_hash;
    public $user_email;

    function __construct($user_password_hash="", $user_email="") {
        parent::__construct();
        $this->user_password_hash = $user_password_hash;
        $this->user_email = $user_email;
    }

}
?>
