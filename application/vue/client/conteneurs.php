<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 30/05/2015
 * Time: 05:02
 */


?>

<table class="table">
    <tr>
        <th> id conteneur</th>
        <th> capacite</th>
        <th> nb chargement</th>
        <th> nb dechargement</th>
    </tr>

    <?php
    foreach ($conteneurs as $conteneur) {
        echo '<tr>';

        echo '<td>' . $conteneur->getId() . '</td>';
        echo '<td>' . $conteneur->capacite . '</td>';

        echo '<td>' . $conteneur->nbC.'</td>';
            echo '<td>' . $conteneur->nbD . '</td>';

            echo '</tr>';
        }
    ?>


</table>


</table>