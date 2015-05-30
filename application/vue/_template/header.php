<!DOCTYPE html>
<html lang="fr"
      dir="ltr">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <base href="<?php echo URL; ?>"/>
    <link rel="stylesheet" href="public/css/default.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/navbar-fixed-top.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="public/js/ajax.js"></script>

</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!--<a class="navbar-brand" href="<?php echo URL ?>">Agenda</a>-->
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo URL; ?>index">Accueil</a>
                </li>
                <li>
                    <?php
                    if (Session::get('user_type') == USER_TYPE_COMPAGNIE) {
                        echo '<a href="' . URL . 'compagnie">Ma Compagnie</a>';
                    } else if (Session::get('user_type') == USER_TYPE_AGENT) {
                        echo '<a href="' . URL . 'agent">Agent</a>';
                    } else if (Session::get('user_type') == USER_TYPE_CLIENT) {
                        echo '<a href="' . URL . 'client">Client</a>';
                    }


                    ?>

                </li>
                <li>
                    <a href="<?php echo URL; ?>index/about">About</a>
                </li>
                <li>
                    <a href="<?php echo URL; ?>index/contact">Contact</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Menu
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Actions</li>
                        <li>
                            <a href="<?php echo URL . 'protege/index'; ?>">Accès restreint</a>
                        </li>
                        <li>
                            <a href="<?php echo URL . 'help/index'; ?>">Aide</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (Session::isLogin()) { ?>
                    <li><p class="navbar-text">Bienvenue ! </p></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mon compte<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo URL; ?>login/showprofile">Mon profil</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>login/changeaccounttype">Change le niveau du compte</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>login/changeaccounttype">Change le niveau du compte</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>login/editusername">Change mon nom d'utilisateur</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>login/edituseremail">Change mon adresse mail</a>
                            </li>
                            <li>
                                <a href="<?php echo URL; ?>login/changepassword">Change mon mot de passe</a>
                            </li>

                        </ul>
                    </li>
                    <li><a href="connexion/disconnect">Déconnexion</a></li>
                <?php } else { ?>
                    
                    <li><a href="<?php echo URL . 'login/register'; ?>">Inscription</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="container">


</div>
