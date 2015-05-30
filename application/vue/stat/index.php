<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 30/05/15
 * Time: 02:15
 */
?>

<select id="compagnie" name="compagnie">
    <option value=""></option>
    <?php foreach($compagnies as $compagnie){
     ?>
        <option value="<?php echo $compagnie->getId();?>" ><?php  echo $compagnie->nom ?></option>
    <?php } ?>
</select>
<div id="suite" style="display: none">
    <label for="annee">Année:</label><input id="annee" name="annee" type="num" />
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
<div style="display: none">
    <select name="escale">
        <?php foreach($escales as $escale){
            ?>
            <option value="<?php echo $escale->getId();?>" ><?php  echo $escale->date_entree." ".$escale->date_sortie ?></option>
        <?php } ?>
    </select>
</div>
<script>
        $(document).on('click','#compagnie',function(){
            var compagnie=$("#compagnie").val();
            ajaxSendRequest("POST","statistique/getNavire","compagnie="+compagnie,function(data){
                //méthod success
                var navire=$("#navire");
                $("#suite").show();
                navire.find("#selection-navire").html(data);
            },function(error){
                alert(error);
            });
        });
</script>