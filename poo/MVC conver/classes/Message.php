<?php

class Message extends Core {

    /**
     * Identifiant du message
     *
     * @var int
     */
    private $_id;
    
    /**
     * Date du message
     *
     * @var string
     */
    private $_date;

    /**
     * Heure du message
     *
     * @var string
     */
    private $_heure;

    /**
     * Nom du message
     *
     * @var string
     */
    private $_nom;

    /**
     * Prenom du message
     *
     * @var string
     */
    private $_prenom;

    /**
     * Message
     *
     * @var string
     */
    private $_message;


    /**
     * Constructeur
     *
     * @param array $data
     */
    public function __construct(array $data) {
        $this->hydrate($data);
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

    /**
     * Get identifiant du message
     *
     * @return  int
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Set identifiant du message
     *
     * @param  int  $_id  Identifiant du message
     *
     * @return  self
     */ 
    public function set_id(int $_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * Get date du message
     *
     * @return  string
     */ 
    public function get_date()
    {
        return $this->_date;
    }

    /**
     * Set date du message
     *
     * @param  string  $_date  Date du message
     *
     * @return  self
     */ 
    public function set_date(string $_date)
    {
        $this->_date = $_date;

        return $this;
    }

    /**
     * Get heure du message
     *
     * @return  string
     */ 
    public function get_heure()
    {
        return $this->_heure;
    }

    /**
     * Set heure du message
     *
     * @param  string  $_heure  Heure du message
     *
     * @return  self
     */ 
    public function set_heure(string $_heure)
    {
        $this->_heure = $_heure;

        return $this;
    }

    /**
     * Get nom du message
     *
     * @return  string
     */ 
    public function get_nom()
    {
        return $this->_nom;
    }

    /**
     * Set nom du message
     *
     * @param  string  $_nom  Nom du message
     *
     * @return  self
     */ 
    public function set_nom(string $_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    /**
     * Get prenom du message
     *
     * @return  string
     */ 
    public function get_prenom()
    {
        return $this->_prenom;
    }

    /**
     * Set prenom du message
     *
     * @param  string  $_prenom  Prenom du message
     *
     * @return  self
     */ 
    public function set_prenom(string $_prenom)
    {
        $this->_prenom = $_prenom;

        return $this;
    }

    /**
     * Get message
     *
     * @return  string
     */ 
    public function get_message()
    {
        return $this->_message;
    }

    /**
     * Set message
     *
     * @param  string  $_message  Message
     *
     * @return  self
     */ 
    public function set_message(string $_message)
    {
        $this->_message = $_message;

        return $this;
    }


}