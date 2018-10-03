<?php
/**
 * Ce fichier fait partie de l'exercice "OOP - Dessins géométriques"
 *
 * La classe Square permet de gérer un carré
 *
 * @package OOP - Dessins géométriques
 * @copyright 2018 Objectif 3W
 * @author Damien <d.tivelet[@]objectif3w.com>
 */
class Square extends Shape {
   
    private $_cote;


    public function __construct( $cote1 , $cote2, $coordinates = array( 'x'=>0, 'y'=>0 ) ) {
        Parent::__construct($coordinates);
        $this->setWidth( $cote1 ); // On force la largeur à être supérieure à zéro
        $this->setHeight( $cote2 ); // On force la hauteur à être supérieure à zéro
    }

    public function setWidth( $val ) {
        $this->_width = abs( $val );
    }

    public function setHeight( $val ) {
        $this->_height = abs( $val );
    }
    

    public function area() {
        $calcul = $this->_height * $this->_width;
        return $calcul;
    }
    
    public function perimeter() {
        $calcul = $this->_height * 4;
        return $calcul;
    }

    public function getWidth() {
        return $this->_width;
    }

    public function getHeight() {
        return $this->_height;
    }

    public function __toString() {
        return '<fieldset>
    <legend>' . get_class( $this ) . '</legend>

    <table>
        <tr>
            <td>Largeur</td>
            <td>' . $this->getWidth() . '</td>
        </tr>
        <tr>
            <td>Hauteur</td>
            <td>' . $this->getHeight() . '</td>
        </tr>
        <tr>
            <td>Aire</td>
            <td>' . $this->area() . '</td>
        </tr>
        <tr>
            <td>Périmètre</td>
            <td>' . $this->perimeter() . '</td>
        </tr>
    </table>
</fieldset>';
    }
}