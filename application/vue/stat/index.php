<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 30/05/15
 * Time: 02:15
 */
?>

<select id="compagnie" name="compagnie">
    <option value="" selected></option>
    <?php foreach($compagnies as $compagnie){
     ?>
        <option value="<?php echo $compagnie->getId();?>" ><?php  echo $compagnie->nom ?></option>
    <?php } ?>
</select>
<div id="suite" style="display: none">
    <label for="annee">Année:</label><input id="annee" name="annee" type="number" min="1900" max="2020" value="<?php echo date("Y");?>" />
    <label for="mois">Mois:</label>
    <select name="mois">
        <option value="1">Janvier</option>
        <option value="2">Février</option>
        <option value="3">Mars</option>
        <option value="4">Avril</option>
        <option value="5">Mai</option>
        <option value="6">Juin</option>
        <option value="7">Juillet</option>
        <option value="8">Août</option>
        <option value="9">Septembre</option>
        <option value="10">Octobre</option>
        <option value="11">Novembre</option>
        <option value="12">Décembre</option>
    </select>
    <div id="navire">
        <label for="navire">Navire:</label>
        <select id="selection-navire" name="navire">

        </select>
    </div>
</div>
<div id="escale">
    <label for="escale">Escale:</label>
    <select id="escale-selection" style="display: none" name="escale">

    </select>
</div>
<script>
        $(document).on('click','#compagnie',function(){
            var compagnie=$("#compagnie").val();
            if(compagnie==""){
                $("#suite").hide();
                return;
            }
            ajaxSendRequest("POST","statistique/getNavire","compagnie="+compagnie,function(data){
                //méthod success
                var navire=$("#navire");
                $("#suite").show();
                navire.find("#selection-navire").html(data);
            },function(error){
                alert(error);
            });
        });

        $(document).on('change','#navire',function(){
            var navire=$("#selection-navire").val();
            ajaxSendRequest("POST","statistique/getEscale","navire="+navire,function(data){
                //méthod success
                var escale=$("#escale-selection");
                $("#escale").show();
                escale.html(data);

            },function(error){
                alert(error);
            });
        });
</script>