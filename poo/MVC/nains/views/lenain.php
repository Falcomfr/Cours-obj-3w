<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Nain</th>
        <th scope="col">Longueur Barbe</th>
        <th scope="col">Taverne</th>
        <th scope="col">Heure début</th>
        <th scope="col">Heure fin</th>
        <th scope="col">Ville natale</th>
        <th scope="col">Ville début</th>
        <th scope="col">Ville fin</th>
        <th scope="col">Groupe n°</th>
    </tr>
    </thead>
    <tbody>
<?php
    echo'
        <tr class="table-light">
            <th scope="row">'. $nain->getNom() .'</th>
            <td>'. $nain->getBarbe() .'</td>
            <td>'. $taverne->getNom() .'</td>
            <td>'. $groupe->getDebuttravail() .'</td>
            <td>'. $groupe->getFintravail() .'</td>
            <td>'. $nain->getVille()->getNom() .'</td>
            <td>'. $depart->getNom() .'</td>
            <td>'. $arrivee->getNom() .'</td>
            <td>'. $nain->getGroupe()->getId() .'</td>
            <td>
            
            <div class="form-group">
                <select name="group" class="custom-select">';
            foreach ($groupes as $key => $value) {
                echo'<option value="'.$value->getId().'">'. $value->getId() .'</option>';
            }
    echo'      </select>
            </div>
            <a href="?c=nain&a=groupe&id='.$arrivee->getNom().'">Changer son groupe</a>
            
            </td>
        </tr>
    ';

?>
    </tbody>
</table>