<?php
/**
 * ------------------------------------------------------------
 * POSTS CONTROLLER
 * (Requires : KernelException | KernelController)
 * ------------------------------------------------------------
**/
class PostsController extends KernelController {
    use NavigationManagement, Form;
    /**
     * --------------------------------------------------
     * ACTIONS
     * --------------------------------------------------
    **/
    /**
     * defaultAction - Displays the default view
     * @param
     * @return
    **/
    public function defaultAction() {
        $this->init( __FUNCTION__ );

        $this->render( $this->getCaching() );
    }

    /**
     * manageCategoriesAction - Displays the categories list view
     * @param
     * @return
    **/
    public function manageCategoriesAction() {
        $this->init( __FUNCTION__ );

        try {
            if( !$this->isAuthentified() )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            if( !$this->getModAuth()->getUser()->can( 'manage_categories' ) )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            $this->setModel();
            foreach( $this->getModel()->getCategories() as $categorie ) :
                $out =  ( isset( $out ) ? $out : '' ) . '
                        <li class="category">
                            ' . ( $this->getModAuth()->getUser()->can( 'edit_posts' ) ? '<a href="' . DOMAIN . 'posts/edit-category/' . $post->getId() . '" title="' . $post->getTitle() . '">' : '' ) . '
                                <h2>' . $post->getTitle() . '</h2>
                            ' . ( $this->getModAuth()->getUser()->can( 'edit_posts' ) ? '</a>' : '' ) . '
                        </li>';
            endforeach;

            $this->getView()->sitename = _( 'Categories list' );
            $this->getView()->list = '<ul id="list">' . ( isset( $out ) ? $out : '' ) . '</ul>';

            $this->render( FALSE, 'Admin' . DS . $this->getAction(), 'Admin' . DS . 'main' );
        } catch( KernelException $e ) {
            throw $e;
        } catch( Exception $e ) {
            throw new KernelException( 'Can not render the <strong>' . $this->getAction() . '</strong> view in  <strong>' . $this->getController() . '</strong>', $e->getCode(), $e );
        }
    }

    /**
     * addCategoryAction - Displays the category add's view
     * @param
     * @return
    **/
    public function addCategoryAction() {
        $this->init( __FUNCTION__ );

        try {
            if( !$this->isAuthentified() )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            if( !$this->getModAuth()->getUser()->can( 'manage_categories' ) )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            $this->getView()->sitename = _( 'Add new category' );

            $this->render( FALSE, 'Admin' . DS . $this->getAction(), 'Admin' . DS . 'main' );
        } catch( KernelException $e ) {
            throw $e;
        } catch( Exception $e ) {
            throw new KernelException( 'Can not render the <strong>' . $this->getAction() . '</strong> view in  <strong>' . $this->getController() . '</strong>', $e->getCode(), $e );
        }
    }

    /**
     * editCategoryAction - Displays the category edit view
     * @param
     * @return
    **/
    public function editCategoryAction() {
        $this->init( __FUNCTION__ );

        try {
            if( !$this->isAuthentified() )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            if( !$this->getModAuth()->getUser()->can( 'manage_categories' ) )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            $this->getView()->sitename = _( 'Edit category' );

            $this->render( FALSE, 'Admin' . DS . $this->getAction(), 'Admin' . DS . 'main' );
        } catch( KernelException $e ) {
            throw $e;
        } catch( Exception $e ) {
            throw new KernelException( 'Can not render the <strong>' . $this->getAction() . '</strong> view in  <strong>' . $this->getController() . '</strong>', $e->getCode(), $e );
        }
    }

    /**
     * listAction - Displays the posts list view
     * @param
     * @return
    **/
    public function listAction() {
        $this->init( __FUNCTION__ );

        try {
            if( !$this->isAuthentified() )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            if( !$this->getModAuth()->getUser()->can( 'edit_posts' ) )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            $this->setModel();
            foreach( $this->getModel()->get() as $post ) :
                $out =  ( isset( $out ) ? $out : '' ) . '
                        <li class="post" data-author="' . $post->getAuthor() . '" data-releasedate="' . $post->getReleaseDate() . '">
                            ' . ( $this->getModAuth()->getUser()->can( 'edit_posts' ) ? '<a href="' . DOMAIN . 'posts/edit/' . $post->getId() . '" title="' . $post->getTitle() . '">' : '' ) . '
                                <h2>' . $post->getTitle() . '</h2>
                            ' . ( $this->getModAuth()->getUser()->can( 'edit_posts' ) ? '</a>' : '' ) . '
                        </li>';
            endforeach;

            $this->getView()->sitename = _( 'Posts list' );
            $this->getView()->list = '<ul id="list">' . ( isset( $out ) ? $out : '' ) . '</ul>';

            $this->render( FALSE, 'Admin' . DS . $this->getAction(), 'Admin' . DS . 'main' );
        } catch( KernelException $e ) {
            throw $e;
        } catch( Exception $e ) {
            throw new KernelException( 'Can not render the <strong>' . $this->getAction() . '</strong> view in  <strong>' . $this->getController() . '</strong>', $e->getCode(), $e );
        }
    }

    /**
     * addAction - Displays the post add's view
     * @param
     * @return
    **/
    public function addAction() {
        $this->init( __FUNCTION__ );

        try {
            if( !$this->isAuthentified() )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            if( !$this->getModAuth()->getUser()->can( 'edit_posts' ) )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );
            $this->setModel();
            $this->getView()->sitename = _( 'Add new post' );
 
            $this->getView()->term = $this->getModel()->getTerm();
  
            $this->render( FALSE, 'Admin' . DS . $this->getAction(), 'Admin' . DS . 'main' );
        } catch( KernelException $e ) {
            throw $e;
        } catch( Exception $e ) {
            throw new KernelException( 'Can not render the <strong>' . $this->getAction() . '</strong> view in  <strong>' . $this->getController() . '</strong>', $e->getCode(), $e );
        }
    }

    /**
     * editAction - Displays the post edit view
     * @param
     * @return
    **/
    public function editAction() {
        $this->init( __FUNCTION__ );

        try {
            if( !$this->isAuthentified() )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            if( !$this->getModAuth()->getUser()->can( 'edit_posts' ) )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );

            $this->getView()->sitename = _( 'Edit post' );
            
            $this->render( FALSE, 'Admin' . DS . $this->getAction(), 'Admin' . DS . 'main' );
        } catch( KernelException $e ) {
            throw $e;
        } catch( Exception $e ) {
            throw new KernelException( 'Can not render the <strong>' . $this->getAction() . '</strong> view in  <strong>' . $this->getController() . '</strong>', $e->getCode(), $e );
        }
    }

    public function addingAction() {
        $this->init( __FUNCTION__ );
        
        try {
            if( !$this->isAuthentified() )
                NavigationManagement::redirect( DOMAIN . 'error/403/' );
     
            if( self::isRequiredPassed( array( 'title', 'content' ), $this->getRequest()->post() ) ) :
                $this->setModel();
                if( $this->getModel()->add( $this->getRequest()->post(), $this->getModAuth()->getUser()->getEmail() ) ) :

                    NavigationManagement::redirect( DOMAIN . 'posts/edit/' . $this->getRequest()->post()  .'/?_err=ok' );
                endif;
            else :
                NavigationManagement::redirect( DOMAIN . 'posts/add/?_err=required' );
            endif;

            NavigationManagement::redirect( DOMAIN . 'posts/add/?_err=error' );
        } catch( KernelException $e ) {
            throw $e;
        } catch( Exception $e ) {
            throw new KernelException( 'Can not applying the <strong>' . $this->getAction() . '</strong> action in <strong>' . $this->getController() . '</strong>', $e->getCode(), $e );
        }
    }
}