    <div class="list-group" style="width: 25%;float:left;">
        <a href="#" class="list-group-item list-group-item-action active">
        Les nains
        </a>
    <?php
    foreach( $nains as $nain ) {
        echo'
                <a href="?c=nain&a=nain&id='.$nain->getId().'" class="list-group-item list-group-item-action">
                '.$nain->getNom().'
                </a>
        ';
    }
    echo '</div>
    <div class="list-group" style="width: 25%; float:left;">
        <a href="#" class="list-group-item list-group-item-action active">
        Les tavernes
        </a>
        ';
    foreach( $tavernes as $taverne ) {
        echo'
        <a href="?c=nain&a=taverne&id='.$taverne->getId().'" class="list-group-item list-group-item-action">
        '.$taverne->getNom().'
        </a>
        ';
    }
    echo '</div>
        <div class="list-group" style="width: 25%; float:left;">
            <a href="#" class="list-group-item list-group-item-action active">
            Les villes
            </a>
        ';
    foreach( $villes as $ville ) {
        echo'
        <a href="?c=nain&a=ville&id='.$ville->getId().'" class="list-group-item list-group-item-action">
        '.$ville->getNom().'
        </a>
        ';
        }
    echo '</div>
    <div class="list-group" style="width: 25%; float:left;">
        <a href="#" class="list-group-item list-group-item-action active">
        Les groupes
        </a>
    ';
    foreach( $groupes as $groupe ) {
        echo'
        <a href="?c=nain&a=groupe&id='.$groupe->getId().'" class="list-group-item list-group-item-action">
        Groupe n° '.$groupe->getId().'
        </a>
        ';
        }
    echo '</div>';
