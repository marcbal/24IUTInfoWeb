
<div class="col_12">

<section class="enregistrementform">
    <form name="enregistrement" action="index_submit" method="get" accept-charset="utf-8">
        Quel est votre type ?
        <SELECT name="type" size="1" id="type_selector">
            <OPTION value="0">Agent portuaire</option>
            <OPTION value="1">Compagnie</option>
            <OPTION value="2">Client</option>
        </SELECT>

        <div id="type_0">

            <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="email" name="email" placeholder="Entrez l'adresse mail ici" required>
            </div>
            <div class="form-group">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" placeholder="Entrez le mot de passe ici" required>
            </div>

        </div>
        <div id="type_1" style="display:none;">
                
            <div class="form-group">     
                <label for="nom">Nom : </label>
                <input type="nom" name="clientname" placeholder="etrez le nom ici" required>
            </div>

            <div class="form-group">
                <label for="pays">Pays : </label>
                <input type="pays" name="pays" placeholder="Entrez le pays ici" required>
            </div>

            <div class="form-group">
                <label for="email">Email : </label>
                <input type="email" name="email" placeholder="Entrez l'adresse mail ici" required>
            </div>

            <div class="form-group">            
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" placeholder="Entrez le mot de passe ici" required>
            </div>

        </div>
        <div id="type_2" style="display:none;">

            <div class="form-group">      
                <label for="nom">Nom : </label>
                <input type="nom" name="clientname" placeholder="etrez le nom ici" required>
            </div>

            <div class="form-group">        
                <label for="adresse">Adresse : </label>
                <input type="adresse" name="adresse" placeholder="entrez l'adresse ici" required>
            </div>

            <div class="form-group">
                <label for="pays">Pays : </label>
                <input type="pays" name="pays" placeholder="Entrez le pays ici" required>
            </div>

            <div class="form-group">
                <label for="email">Email : </label>
                <input type="email" name="email" placeholder="Entrez l'adresse mail ici" required>
            </div>

            <div class="form-group">        
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" placeholder="Entrez le mot de passe ici" required>
            </div>
        </div>
    </form>
</section>

</div>