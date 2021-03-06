<?php
/**
 * ------------------------------------------------------------
 * KERNEL EXCEPTION
 * (Requires : Exception | TypeTest)
 * ------------------------------------------------------------
**/
class KernelException extends Exception {
    use TypeTest;

    /**
     * --------------------------------------------------
     * CONSTANTS
     * --------------------------------------------------
    **/
    const DEBUG_MODE = FALSE;
    /**
     * --------------------------------------------------
     * STATICS
     * --------------------------------------------------
    **/
    static private $_exceptions;
    static public $_debug_mode = self::DEBUG_MODE;



    /**
     * --------------------------------------------------
     * MAGIC METHODS
     * --------------------------------------------------
    **/
    /**
     * __construct - Class constructor
     * @param   [string     $message]
     *          [mixed      $code]
     *          [object     $previous]
     * @return
    **/
    public function __construct( $message = '', $code = 0, Exception $previous = NULL ) {
        parent::__construct( $message, ( TypeTest::is_valid_int( $code ) ? $code : -1 ), $previous );
        self::$_exceptions[] = $this;
    }



    /**
     * --------------------------------------------------
     * METHODS
     * --------------------------------------------------
    **/
    /**
     * __toString - Determines how the object responds when treated as a string
     * @param
     * @return
    **/
    public function __toString() {
        $previous = '';
        if( self::$_debug_mode && count( self::$_exceptions )>0 && self::$_exceptions[0]->getPrevious()!==NULL )
            $previous .= '<hr /> - An error occured with code <strong>' . self::$_exceptions[0]->getPrevious()->getCode() . '</strong> in <strong>' . self::$_exceptions[0]->getPrevious()->getFile() . '</strong> at line <strong>' . self::$_exceptions[0]->getPrevious()->getLine() . '</strong><br />The following information has been provided :<br />' . self::$_exceptions[0]->getPrevious()->getMessage();
        
        foreach( self::$_exceptions as $value )
            $previous .= '<hr /> - An error occured with code <strong>' . $value->getCode() . '</strong> in <strong>' . $value->getFile() . '</strong> at line <strong>' . $value->getLine() . '</strong><br />The following information has been provided :<br />' . $value->getMessage();


        // return 'An error occured with code <strong>' . $this->getCode() . '</strong> in <strong>' . $this->getFile() . '</strong> at line <strong>' . $this->getLine() . '</strong><br />The following information has been provided :<br />' . $this->getMessage() . ( $previous!='' ? '<hr /><strong style="text-transform:uppercase;">Trace</strong><br />' . $previous : '' );
        return ( $previous!='' ? '<strong style="text-transform:uppercase;">Trace</strong>' . $previous : '' );
    }
}