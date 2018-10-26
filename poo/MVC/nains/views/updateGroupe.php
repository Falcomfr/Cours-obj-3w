<table class="table table-hover">
<thead>
<tr>
    <th scope="col">Nain</th>
    <th scope="col">Groupe</th>
</tr>
</thead>
<tbody>
<?php
foreach( $nains as $nain ) {
    echo'
        <tr class="table-light">
            <th scope="row"><a href="?c=nain&a=nain&id='.$nain->getId().'>'. $nain->getGroupe() .'</a></th>
            <td><a href="nain.php?id="></a></td>
        </tr>
    ';
}
?>
</tbody>
</table>