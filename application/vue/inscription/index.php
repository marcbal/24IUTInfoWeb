<!-- Bootstrap core CSS -->
<link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo URL; ?>public/css/navbar-fixed-top.css" rel="stylesheet">

<section class="enregistrementform">

    <form name="enregistrement" action="index_submit" method="get" accept-charset="utf-8">
        <div class="form-group">
        Quel est votre type ?
        <SELECT name="type" size="1" id="type_selector">
            <OPTION value="0">Agent portuaire</option>
            <OPTION value="1">Compagnie</option>
            <OPTION value="2">Client</option>
        </SELECT>
        </div>

        <div id="type_0">

            <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email : </label>
                        <div class="col-sm-5">
                            <input type="email" name="email" placeholder="Entrez l'adresse mail ici" required>
                        </div>
            </div>
            <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Mot de passe : </label>
                        <div class="col-sm-5">
                            <input type="password" name="password" placeholder="Entrez le mot de passe ici" required>
                        </div>
            </div>

        </div>
        <div id="type_1" style="display:none;">
                
            <div class="form-group">     
                <label for="nom" class="col-sm-2 control-label">Nom : </label>
                <div class="col-sm-5">
                    <input type="nom" name="clientname" placeholder="etrez le nom ici" required>
                </div>
            </div>

            <div class="form-group">
                <label for="pays" class="col-sm-2 control-label">Pays : </label>
                <div class="col-sm-5">
                    <input type="pays" name="pays" placeholder="Entrez le pays ici" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email : </label>
                <div class="col-sm-5">
                    <input type="email" name="email" placeholder="Entrez l'adresse mail ici" required>
                </div>
            </div>

            <div class="form-group">            
                <label for="password" class="col-sm-2 control-label">Mot de passe : </label>
                <div class="col-sm-5">
                    <input type="password" name="password" placeholder="Entrez le mot de passe ici" required>
                </div>
            </div>

        </div>
        <div id="type_2" style="display:none;">

            <div class="form-group">      
                <label for="nom" class="col-sm-2 control-label">Nom : </label>
                <div class="col-sm-5">
                    <input type="nom" name="clientname" placeholder="etrez le nom ici" required>
                </div>
            </div>

            <div class="form-group">        
                <label for="adresse" class="col-sm-2 control-label">Adresse : </label>
                <div class="col-sm-5">
                    <input type="adresse" name="adresse" placeholder="entrez l'adresse ici" required>
                </div>
            </div>

            <div class="form-group">
                <label for="pays" class="col-sm-2 control-label">Pays : </label>
                <div class="col-sm-5">
                    <input type="pays" name="pays" placeholder="Entrez le pays ici" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email : </label>
                <div class="col-sm-5">
                    <input type="email" name="email" placeholder="Entrez l'adresse mail ici" required>
                </div>
            </div>

            <div class="form-group">        
                <label for="password" class="col-sm-2 control-label">Mot de passe : </label>
                <div class="col-sm-5">
                    <input type="password" name="password" placeholder="Entrez le mot de passe ici" required>
                </div>
            </div>
        </div>
    </form>
</section>
