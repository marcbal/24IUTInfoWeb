<!-- Bootstrap core CSS -->
<link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo URL; ?>public/css/navbar-fixed-top.css" rel="stylesheet">
<section class="loginform">

    <form class="form-horizontal" role="form" action="<?php echo URL; ?>login/verification" method="post">

        <div class="form-group">
            <label for="usermail" class="col-sm-2 control-label">Nom login : </label>

            <div class="col-sm-5">
                <input type="email" class="form-control" id="usermail" name="usermail"
                       placeholder="exemple@email.com" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Mot de passe : </label>

            <div class="col-sm-5">
                <input type="password" class="form-control" id="password" name="password" placeholder="mot de passe" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="login">
                    Se Connecter
                </button>
            </div>
        </div>
    </form>

</section>