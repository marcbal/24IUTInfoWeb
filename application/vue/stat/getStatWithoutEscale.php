<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 30/05/15
 * Time: 05:18
 */
?>
<thead>
    <th>Nom du navire</th>
    <th>Conteneur</th>
    <th>Type mouvement</th>
    <th>Capacite</th>
</thead>
<?php
foreach($conteneurs as $c){
?>
    <tr>
        <td><?php echo $n->nom;?></td>
        <td><?php echo $c->id;?></td>
        <td><?php echo "Charger: ".$nbC." Decharger ".$nbD;?></td>

    </tr>
<?php } ?>