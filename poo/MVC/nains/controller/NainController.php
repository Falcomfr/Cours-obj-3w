<?php

require_once( 'vendor/Nain.php' );
require_once( 'vendor/Taverne.php' );
require_once( 'vendor/Ville.php' );
require_once( 'vendor/Groupe.php' );
require_once( 'vendor/Tunnel.php' );
require_once( 'model/NainModel.php' );
require_once( 'model/TaverneModel.php' );
require_once( 'model/VilleModel.php' );
require_once( 'model/GroupeModel.php' );
require_once( 'model/TunnelModel.php' );

class NainController {
    private $model;
    private $tav;
    private $vil;
    private $grou;
    private $tun;

    public function __construct() {
        $this->model = new NainModel;
        $this->tav = new TaverneModel;
        $this->vil = new VilleModel;
        $this->grou= new GroupeModel;
        $this->tun= new TunnelModel;
    }

    public function showNains() {
        $nains = $this->model->selects();
        $tavernes = $this->tav->selects();
        $villes = $this->vil->selects();
        $groupes = $this->grou->selects();
        $title = 'Liste total';
        include( 'views/inc/header.php' );
        include( 'views/listeTotal.php' );
        include( 'views/inc/footer.php' );
    }

    public function nainAction(int $id) {
        $nain = $this->model->selects($id);
        $groupes = $this->grou->selects();
        $groupe = $this->grou->selects($nain->getGroupe());
        $nain->setGroupe($this->grou->selects($nain->getGroupe()));
        $taverne = $this->tav->selects($groupe->getTaverne());
        $tunnel = $this->tun->selects($groupe->getTunnel());
        $nain->setVille($this->vil->selects($nain->getVille()));
        $arrivee = $this->vil->selects($tunnel->getVilleArrivee_fk());
        $depart = $this->vil->selects($tunnel->getVilleDepart_fk());
        $title = 'Le nain';
        include( 'views/inc/header.php' );
        include( 'views/lenain.php' );
        include( 'views/inc/footer.php' );
    }

    public function groupeAction(int $id, int $idGroupe) {
        $nain = $this->model->update($id, $idGroupe);
        $title = 'Changer le groupe du nain';
        include( 'views/inc/header.php' );
        include( 'views/updateGroupe.php' );
        include( 'views/inc/footer.php' );
    }

}