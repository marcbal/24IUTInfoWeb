<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 30/05/2015
 * Time: 03:34
 */

foreach($clients as $client){
    echo '<a href='.URL.'client/"'.$client->getId().'">'.$client->user_email.'<a>';
}