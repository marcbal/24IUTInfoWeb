<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 30/05/15
 * Time: 02:15
 */
?>

<select name="compagnie">
    <?php foreach($compagnies as $compagnie){
     ?>
        <option value="<?php echo $compagnie->getId();?>" ><?php  echo $compagnie->nom ?></option>
    <?php } ?>
</select>
<label for="annee">Année:</label><input id="annee" name="annee" type="num" />
<select>
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
