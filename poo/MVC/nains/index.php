<?php
define( 'DB_HOST', 'localhost' );
define( 'DB_NAME', 'nains_mvc' );
define( 'DB_LOGIN', 'root' );
define( 'DB_PWD', '' );

require_once( 'vendor/SPDO.php' );


if( isset( $_GET['c'] ) ) {
    $controllerName = ucfirst( strtolower( $_GET['c'] ) ) . 'Controller';

    if( file_exists( 'controller/' . $controllerName . '.php' ) ) {
        require_once( 'controller/' . $controllerName . '.php' );

        if( class_exists( $controllerName ) ) {
            $controller = new $controllerName;

            if( isset( $_GET['a'] ) ) {
                $methodName = strtolower( $_GET['a'] ) . 'Action';
                if( method_exists( $controller, $methodName ) ) {
                    $controller->$methodName($_GET['id']);
                } else {
                    header( 'Location: 404' );
                }
            } else {
                $controller->showNains();
            }
        } else {
            header( 'Location: 404' );
        }
    } else {
        header( 'Location: 404' );
    }

} else {
    require_once( 'controller/NainController.php' );
    require_once( 'model/NainModel.php' );
    $controller = new NainController;
    $controller->showNains();
}