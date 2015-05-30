<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 30/05/15
 * Time: 03:09
 */
?>
    <option value=""></option>
<?php
foreach($escales as $e){
    ?>
    <option value="<?php echo $escale->getId();?>" ><?php  echo $escale->date_entree." ".$escale->date_sortie ?></option>
<?php
}