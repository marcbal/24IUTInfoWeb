<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 30/05/15
 * Time: 03:09
 */
foreach($navires as $n){
    ?>
    <option value="<?php echo $n->getId();?>"><?php echo $n->nom;?></option>
<?php
}