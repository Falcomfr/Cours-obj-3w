<?php

class PortfolioController extends PostsController{

    public function defaultAction() {
        $this->init( __FUNCTION__ );
        try {
            $this->setModel();

            $this->render( $this->getCaching() );            
        } catch( KernelException $e ) {
            throw $e;
        } catch( Exception $e ) {
            throw new KernelException( 'Can not render the <strong>' . $this->getAction() . '</strong> view in  <strong>' . $this->getController() . '</strong>', $e->getCode(), $e );
        }
    }

}