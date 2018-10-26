<?php
/**
 * ------------------------------------------------------------
 * POSTS MODEL
 * (Requires : KernelException | KernelModel | ClassPost)
 * ------------------------------------------------------------
**/
class PostsModel extends KernelModel {
    /**
     * --------------------------------------------------
     * CONSTANTS
     * --------------------------------------------------
    **/
    const ALL = '-1';
    const TYPE = 'post';

    /**
     * --------------------------------------------------
     * METHODS
     * --------------------------------------------------
    **/
    /**
     * getCategories - Performs a database select query
     * @param   [string     $id]
     * @return  mixed (ClassPost|array|bool)
    **/
    public function getCategories( $id = NULL ) {
        try {
            if( !empty( $id ) )
                if( ( $datas = $this->query( 'SELECT `post`.`id`, `post`.`title`, `post`.`content`, `post`.`excerpt`, `post`.`release_date`, `post`.`tab`, `post`.`type`, `post`.`status`, `post`.`access`, `post`.`format`, `post`.`parent`, `post`.`author` FROM `post` LEFT JOIN `post` AS post_parent ON `post`.`parent`=`post_parent`.`id` JOIN `term` AS post_type ON `post`.`type`=`post_type`.`keyword` JOIN `taxonomy` AS taxonomy_type ON `post_type`.`taxonomy`=`taxonomy_type`.`keyword` JOIN `term` AS post_status ON `post`.`status`=`post_status`.`keyword` JOIN `taxonomy` AS taxonomy_status ON `post_status`.`taxonomy`=`taxonomy_status`.`keyword` JOIN `term` AS post_access ON `post`.`access`=`post_access`.`keyword` JOIN `taxonomy` AS taxonomy_access ON `post_access`.`taxonomy`=`taxonomy_access`.`keyword` JOIN `term` AS post_format ON `post`.`format`=`post_format`.`keyword` JOIN `taxonomy` AS taxonomy_format ON `post_format`.`taxonomy`=`taxonomy_format`.`keyword` LEFT JOIN `published_on` ON `post`.`id`=`published_on`.`post` LEFT JOIN `media` ON`published_on`.`media`=`media`.`id` JOIN `user` ON `post`.`author`= `user`.`email` WHERE `post`.`type`="category" AND `post`.`id`=:id', array( 'id' => array( 'VAL' => $id ) ) ) )!==FALSE ) :
                    return new ClassPost( $datas );
                endif;
            else
                if( ( $datas = $this->query( 'SELECT `post`.`id`, `post`.`title`, `post`.`content`, `post`.`excerpt`, `post`.`release_date`, `post`.`tab`, `post`.`type`, `post`.`status`, `post`.`access`, `post`.`format`, `post`.`parent`, `post`.`author` FROM `post` LEFT JOIN `post` AS post_parent ON `post`.`parent`=`post_parent`.`id` JOIN `term` AS post_type ON `post`.`type`=`post_type`.`keyword` JOIN `taxonomy` AS taxonomy_type ON `post_type`.`taxonomy`=`taxonomy_type`.`keyword` JOIN `term` AS post_status ON `post`.`status`=`post_status`.`keyword` JOIN `taxonomy` AS taxonomy_status ON `post_status`.`taxonomy`=`taxonomy_status`.`keyword` JOIN `term` AS post_access ON `post`.`access`=`post_access`.`keyword` JOIN `taxonomy` AS taxonomy_access ON `post_access`.`taxonomy`=`taxonomy_access`.`keyword` JOIN `term` AS post_format ON `post`.`format`=`post_format`.`keyword` JOIN `taxonomy` AS taxonomy_format ON `post_format`.`taxonomy`=`taxonomy_format`.`keyword` LEFT JOIN `published_on` ON `post`.`id`=`published_on`.`post` LEFT JOIN `media` ON`published_on`.`media`=`media`.`id` JOIN `user` ON `post`.`author`= `user`.`email` WHERE `post`.`type`="category" ORDER BY `post`.`release_date` DESC, `post`.`tab` ASC, `post`.`id` ASC', array(), array( self::ATTR_RETURNMODE=>self::RETURNMODE_FETCHALL ) ) )!==FALSE ) :
                    foreach( $datas as $item ) :
                        $out[] = new ClassPost( $item );
                    endforeach;

                    return ( isset( $out ) ? $out : array() );
                endif;

            return FALSE;
        } catch( PDOException $e ) {
            throw new KernelException( 'Can not get the <strong>' . $this->getModel() . '</strong> datas', $e->getCode(), $e );
        }
    }

    /**
     * get - Performs a database select query
     * @param   [string     $id]
     * @return  mixed (ClassPost|array|bool)
    **/
    public function get( $id = NULL ) {
        try {
            if( !empty( $id ) )
                if( ( $datas = $this->query( 'SELECT `post`.`id`, `post`.`title`, `post`.`content`, `post`.`excerpt`, `post`.`release_date`, `post`.`tab`, `post`.`type`, `post`.`status`, `post`.`access`, `post`.`format`, `post`.`parent`, `post`.`author` FROM `post` LEFT JOIN `post` AS post_parent ON `post`.`parent`=`post_parent`.`id` JOIN `term` AS post_type ON `post`.`type`=`post_type`.`keyword` JOIN `taxonomy` AS taxonomy_type ON `post_type`.`taxonomy`=`taxonomy_type`.`keyword` JOIN `term` AS post_status ON `post`.`status`=`post_status`.`keyword` JOIN `taxonomy` AS taxonomy_status ON `post_status`.`taxonomy`=`taxonomy_status`.`keyword` JOIN `term` AS post_access ON `post`.`access`=`post_access`.`keyword` JOIN `taxonomy` AS taxonomy_access ON `post_access`.`taxonomy`=`taxonomy_access`.`keyword` JOIN `term` AS post_format ON `post`.`format`=`post_format`.`keyword` JOIN `taxonomy` AS taxonomy_format ON `post_format`.`taxonomy`=`taxonomy_format`.`keyword` LEFT JOIN `published_on` ON `post`.`id`=`published_on`.`post` LEFT JOIN `media` ON`published_on`.`media`=`media`.`id` JOIN `user` ON `post`.`author`= `user`.`email` WHERE `post`.`type`=:type AND `post`.`id`=:id', array( 'id' => array( 'VAL' => $id ), 'type' => array( 'VAL' => static::TYPE ) ) ) )!==FALSE ) :
                    return new ClassPost( $datas );
                endif;
            else
                if( ( $datas = $this->query( 'SELECT `post`.`id`, `post`.`title`, `post`.`content`, `post`.`excerpt`, `post`.`release_date`, `post`.`tab`, `post`.`type`, `post`.`status`, `post`.`access`, `post`.`format`, `post`.`parent`, `post`.`author` FROM `post` LEFT JOIN `post` AS post_parent ON `post`.`parent`=`post_parent`.`id` JOIN `term` AS post_type ON `post`.`type`=`post_type`.`keyword` JOIN `taxonomy` AS taxonomy_type ON `post_type`.`taxonomy`=`taxonomy_type`.`keyword` JOIN `term` AS post_status ON `post`.`status`=`post_status`.`keyword` JOIN `taxonomy` AS taxonomy_status ON `post_status`.`taxonomy`=`taxonomy_status`.`keyword` JOIN `term` AS post_access ON `post`.`access`=`post_access`.`keyword` JOIN `taxonomy` AS taxonomy_access ON `post_access`.`taxonomy`=`taxonomy_access`.`keyword` JOIN `term` AS post_format ON `post`.`format`=`post_format`.`keyword` JOIN `taxonomy` AS taxonomy_format ON `post_format`.`taxonomy`=`taxonomy_format`.`keyword` LEFT JOIN `published_on` ON `post`.`id`=`published_on`.`post` LEFT JOIN `media` ON`published_on`.`media`=`media`.`id` JOIN `user` ON `post`.`author`= `user`.`email` WHERE `post`.`type`=:type ORDER BY `post`.`release_date` DESC, `post`.`tab` ASC, `post`.`id` ASC', array( 'type' => array( 'VAL' => static::TYPE ) ), array( self::ATTR_RETURNMODE=>self::RETURNMODE_FETCHALL ) ) )!==FALSE ) :
                    foreach( $datas as $item ) :
                        $out[] = new ClassPost( $item );
                    endforeach;

                    return ( isset( $out ) ? $out : array() );
                endif;

            return FALSE;
        } catch( PDOException $e ) {
            throw new KernelException( 'Can not get the <strong>' . $this->getModel() . '</strong> datas', $e->getCode(), $e );
        }
    }

    /**
     * add - Performs a database insert query
     * @param   array   $post
     *          string  $author
     * @return  bool
    **/
    public function add( $post, $author ) {
        try {
            $page = new ClassPost( $post );
            $values = array();
            foreach( $post as $key => $value ) :

                $method = 'get' . ucwords( $key );
                if( method_exists( $page, $method ) && $page->$method()!==NULL )
                $values[$key] = array( 'VAL' => $page->$method());

            endforeach;
            if( !empty( $author ) )
            $values['author'] =  array( 'VAL' => $author);
            
            return $this->query( 'INSERT INTO `post` ( `title`, `content`, `excerpt`, `type`, `status`, `access`, `format`, `author` ) VALUES ( :title, :content, :excerpt, "post", :status, :access, :format, :author )', $values);
        } catch( PDOException $e ) {
            throw new KernelException( 'Can not get the <strong>' . $this->getModel() . '</strong> datas', $e->getCode(), $e );
        }
    }

    /**
     * edit - Performs a database update query
     * @param   array   $post
     *          string  $author
     * @return  bool
    **/
    public function edit( $post, $author ) {
        try {
            // $user = new ClassPost( $post );
            // $values = array( 'selector' => array( 'VAL' => $email ) );
            // foreach( $post as $key => $value ) :
            //     switch( $key ) :
            //         case 'password':
            //         case 'avatar':
            //             break;
            //         default:
            //             $method = 'get' . ucwords( $key );
            //             if( method_exists( $user, $method ) && $user->$method()!==NULL )
            //                 $values[$key] = array( 'VAL' => $user->$method() );
            //     endswitch;
            // endforeach;

            // return $this->query( 'UPDATE `user` SET `email`=:email, `login`=:login, `lastname`=:lastname, `firstname`=:firstname, `role`=:role WHERE `email`=:selector', $values );
        } catch( PDOException $e ) {
            throw new KernelException( 'Can not get the <strong>' . $this->getModel() . '</strong> datas', $e->getCode(), $e );
        }
    }

    /**
     * delete - Performs a database delete query
     * @param   array   $post
     *          string  $author
     * @return  bool
    **/
    public function delete( $id ) {

        try {
            return $this->query( 'DELETE FROM `post` WHERE `id`=:id', array( 'id' => array( 'VAL' => $id ) ) );
        } catch( PDOException $e ) {
            throw new KernelException( 'Can not get the <strong>' . $this->getModel() . '</strong> datas', $e->getCode(), $e );
        }
    }

    public function getTerm() {
        
        try {
                if( ( $datas = $this->query( 'SELECT `term`.`keyword`, `term`.`denomination`, `term`.`description`, `term`.`taxonomy` FROM `term`', array( 'type' => array( 'VAL' => static::TYPE ) ), array( self::ATTR_RETURNMODE=>self::RETURNMODE_FETCHALL ) ) )!==FALSE ) :
                    return $datas;
                endif;

            return FALSE;
        } catch( PDOException $e ) {
            throw new KernelException( 'Can not get the <strong>' . $this->getModel() . '</strong> datas', $e->getCode(), $e );
        }
    }
}