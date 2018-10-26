<?php
// METTRE AU PROPRE : Params / Setters / Getters / Returns / Visibilité
/**
 * ------------------------------------------------------------
 * CORE LAYOUT
 * (Requires : KernelException | KernelView)
 * ------------------------------------------------------------
**/
class KernelLayout {
    /**
     * --------------------------------------------------
     * PROPERTIES
     * --------------------------------------------------
    **/
    private $_layout;
    private $_view;
    private $_path;
    private $_metas;
    private $_stylesheets;
    private $_scripts;
    private $_disabled;



    /**
     * --------------------------------------------------
     * MAGIC METHODS
     * --------------------------------------------------
    **/
    /**
     * __construct - Class constructor
     * @param   string      $path
     *          KernelView  $view
     * @return
    **/
    public function __construct( $path, KernelView $view ) {
        $this->_path = $path;
        $this->_view = $view;
        $this->_metas = array();
        $this->_stylesheets = array();
        $this->_scripts = array();
        $this->_disabled = !file_exists( $this->_path );
    }



    /**
     * --------------------------------------------------
     * SETTERS
     * --------------------------------------------------
    **/
    /**
     * setLayout -
     * @param   [string     $layout]
     * @return
    **/
    public function setLayout( $layout = NULL ) {
        $this->_layout = ( $layout!==NULL ? $layout : 'main' );
        if( $layout===FALSE)
            $this->_disabled = TRUE;
    }



    /**
     * --------------------------------------------------
     * METHODS
     * --------------------------------------------------
    **/
    /**
     * wrap -
     * @param   [string     $html]
     * @return
    **/
    public function wrap( $html = '' ) {
        extract( $this->_view->getProperties() );

        if( !$this->_disabled )
            if( file_exists( $this->_path . $this->_layout . '.php' ) ) :
                ob_start();
                include( $this->_path . $this->_layout . '.php' );
                $html = ob_get_contents();
                ob_end_clean();
            else :
                throw new KernelException( 'Layout <strong>' . $this->_layout . '</strong> not found in <strong>' . $this->_path . '</strong>', 10 );
            endif;

        return $html;
    }

    /**
     * getThemeUri -
     * @param
     * @return
    **/
    public function getThemeUri() {
        return ASSETS_URL . '';
    }

    /**
     * printHeader - Displays header's tags
     * @param
     * @return
    **/
    public function printHeader() {
        print_r( '
<link rel="stylesheet" type="text/css" href="' . $this->getThemeUri() . 'fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="' . $this->getThemeUri() . 'css/style.css">' );
    }

    /**
     * printFooter - Displays footer's tags
     * @param
     * @return
    **/
    public function printFooter() {
        print_r( '' );
    }

    /**
     * printLogo - Displays logo
     * @param
     * @return
    **/
    public function printLogo() {
        print_r( '<img alt="" src="' . $this->getThemeUri() . 'images/logo.png" />' );
    }

    /**
     * printMenu - Displays menu
     * @param
     * @return
    **/
    public function printMenu() {
        print_r( '
<ul class="primary-menu" id="primary-menu">
    <li class="current-menu-item"><a href="." title="">Accueil</a></li>
    ' . ( isset( $menu_items ) ? $menu_items : '' ) . '
</ul>' );
    }
}