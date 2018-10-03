<?php
/**
 * Ce fichier fait partie de l'exercice "OOP - Dessins géométriques"
 *
 * La classe Circle permet de gérer un cercle
 *
 * @package OOP - Dessins géométriques
 * @copyright 2018 Objectif 3W
 * @author Damien <d.tivelet[@]objectif3w.com>
 */
class Circle extends Shape {

    private $_rayon;

    public function setRadius( $val ) {
        $this->_rayon = abs( $val );
    }

    public function __construct( $radius, $coordinates = array( 'x'=>0, 'y'=>0 ) ) {
        Parent::__construct($coordinates);
        $this->setRadius( $radius ); // On force la largeur à être supérieure à zéro
    }



    public function getWidth() {
        return $this->_rayon * 2;
    }

    public function getHeight() {
        return $this->_rayon * 2;
    }

    public function area() {
        return pi() * pow($this->_rayon, 2);
    }
    public function perimeter() {
         $P = 2 * pi() * pow($this->_rayon, 2);
         return $P;
    }

    public function getRadius() {
        return $this->_rayon;
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