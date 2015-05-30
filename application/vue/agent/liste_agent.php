<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 30/05/2015
 * Time: 03:34
 */

foreach($agents as $agent){
    echo '<a href='.URL.'agent/index/'.$agent->getId().'>'.$agent->user_email.'<a>';
}