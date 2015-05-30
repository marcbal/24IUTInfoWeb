<!-- Bootstrap core CSS -->
<link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo URL; ?>public/css/navbar-fixed-top.css" rel="stylesheet">
<div class="row">
<section class="enregistrementform">

    <form name="enregistrement" action="index_submit" method="get" accept-charset="utf-8">
        <div class="row">
            Quel est votre type ?
            <SELECT name="type" size="1" id="type_selector">
                <OPTION value="0">Agent portuaire</option>
                <OPTION value="1">Compagnie</option>
                <OPTION value="2">Client</option>
            </SELECT>
        </div>
        <hr>
        <div class="row">
            <div id="type_0" >
 
            </div>
            <div id="type_1" style="display:none;">
                    
               <div class="row">



                    <!-- Text input-->
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-4 control-label text-right" for="nom_compagnie">Nom : </label>  
                      <div class="col-md-4">
                      <input id="nom" name="nom_compagnie" placeholder="nom_compagnie" class="form-control input-md" type="text">

                      </div>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                    <!-- Password input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label text-right" for="pays_compagnie">Pays : </label>
                      <div class="col-md-4">
                        <input id="pays" name="pays_compagnie" placeholder="pays_compagnie" class="form-control input-md" type="text">

                      </div>
                    </div>
                    </div>

                </div>

            </div>
            <div id="type_2" style="display:none;">
              
                
                
            <div class="row">
                    <!-- Text input-->
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-4 control-label text-right" for="nom_client">Nom : </label>  
                      <div class="col-md-4">
                      <input id="nom" name="nom_client" placeholder="nom_client" class="form-control input-md" type="text">

                      </div>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                    <!-- Password input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label text-right" for="adresse_pays">Adresse : </label>
                      <div class="col-md-4">
                        <input id="pays" name="adresse_pays" placeholder="adresse_pays" class="form-control input-md" type="text">

                      </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</section>
</div>