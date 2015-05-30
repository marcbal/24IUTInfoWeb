<section class="enregistrementform">
    <form name="enregistrement" action="index_submit" method="get" accept-charset="utf-8">
        Quel est votre type ?
        <SELECT name="type" size="1" id="type_selector">
            <OPTION value="0">Agent portuaire</option>
            <OPTION value="1">Compagnie</option>
            <OPTION value="2">Client </option>
        </SELECT>
        <div id="type_0" >
            ok
        </div>
        <div id="type_1" style="display:none;">


        </div>
        <div id="type_2" style="display:none;">

                <ul>
                        <li><label for="nom">Nom : </label>
                            <input type="nom" name="clientname" placeholder="etrez le nom ici" required></li>
                        <li><label for="adresse">Adresse : </label>
                            <input type="adresse" name="adresse" placeholder="entrez l'adresse ici" required></li>
            </ul>
        </div>
    </form>
</section>