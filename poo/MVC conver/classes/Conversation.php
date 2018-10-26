<?php

class Conversation extends Core {

    /**
     * Identifiant de la conversation
     *
     * @var int
     */
    private $_id;
    
    /**
     * Date de la conversation
     *
     * @var string
     */
    private $_date;

    /**
     * Heure de la conversation
     *
     * @var string
     */
    private $_heure;

    /**
     * Nombre de message de la conversation
     *
     * @var int
     */
    private $_nbMessages;

  /**
     * Nombre de message de la conversation
     *
     * @var int
     */
    private $_termine;

    /**
     * Constructeur
     *
     * @param array $data
     */
    public function __construct(array $data) {
        $this->hydrate($data);
    }


    /**
     * Get identifiant de la conversation
     *
     * @return  int
     */ 
    public function get_c_id()
    {
        return $this->_id;
    }

    /**
     * Set identifiant de la conversation
     *
     * @param  int  $_id  Identifiant de la conversation
     *
     * @return  self
     */ 
    public function set_c_id(int $_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * Get date de la conversation
     *
     * @return  string
     */ 
    public function get_c_date()
    {
        return $this->_date;
    }

    /**
     * Set date de la conversation
     *
     * @param  string  $_date  Date de la conversation
     *
     * @return  self
     */ 
    public function set_c_date(string $_date)
    {
        $this->_date = $_date;

        return $this;
    }

    /**
     * Get heure de la conversation
     *
     * @return  string
     */ 
    public function get_c_heure()
    {
        return $this->_heure;
    }

    /**
     * Set heure de la conversation
     *
     * @param  string  $_heure  Heure de la conversation
     *
     * @return  self
     */ 
    public function set_c_heure(string $_heure)
    {
        $this->_heure = $_heure;

        return $this;
    }

    /**
     * Get heure de la conversation
     *
     * @return  string
     */ 
    public function get_c_termine()
    {
        return $this->_termine;
    }

    /**
     * Set heure de la conversation
     *
     * @param  string  $_heure  Heure de la conversation
     *
     * @return  self
     */ 
    public function set_c_termine(string $_termine)
    {
        $this->_termine = $_termine;

        return $this;
    }

    /**
     * Get nombre de message de la conversation
     *
     * @return  int
     */ 
    public function get_nbMessages()
    {
        return $this->_nbMessages;
    }

    /**
     * Set nombre de message de la conversation
     *
     * @param  int  $_nbMessages  Nombre de message de la conversation
     *
     * @return  self
     */ 
    public function set_nbMessages(int $_nbMessages)
    {
        $this->_nbMessages = $_nbMessages;

        return $this;
    }

    /**
     * Hydratation
     *
     * @param array $data
     * @return void
     */

    public function hydrate(array $data) {
        foreach( $data as $key=>$value ) {
        $methodName = 'set_' . $key;
            if(method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }
    
}