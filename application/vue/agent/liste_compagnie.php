<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 30/05/2015
 * Time: 03:34
 */


foreach($compagnies as $compagnie){
    echo '<a href='.URL.'client/"'.$compagnie->getId().'">'.$compagnie->user_email.'<a>';
}