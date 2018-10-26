<?php

class Tunnel {
    private $id;
    private $progres;
    private $villedepart_fk;
    private $villearrivee_fk;

    private static $tunnels = array();

    public function __construct( array $datas ) {
        $this->hydrate( $datas );
    }

    private function hydrate( array $datas ) {
        foreach($datas as $key=>$value) {
            $method = 'set' . ucfirst(strtolower($key));
            
            if(method_exists($this, $method)) {
              $this->$method($value);
            }
          }
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of progres
     */ 
    public function getProgres()
    {
        return $this->progres;
    }

    /**
     * Set the value of progres
     *
     * @return  self
     */ 
    public function setProgres($progres)
    {
        $this->progres = $progres;

        return $this;
    }

    /**
     * Get the value of villedepart_fk
     */ 
    public function getVilledepart_fk()
    {
        return $this->villedepart_fk;
    }

    /**
     * Set the value of villedepart_fk
     *
     * @return  self
     */ 
    public function setVilledepart_fk($villedepart_fk)
    {
        $this->villedepart_fk = $villedepart_fk;

        return $this;
    }

    /**
     * Get the value of villearrivee_fk
     */ 
    public function getVillearrivee_fk()
    {
        return $this->villearrivee_fk;
    }

    /**
     * Set the value of villearrivee_fk
     *
     * @return  self
     */ 
    public function setVillearrivee_fk($villearrivee_fk)
    {
        $this->villearrivee_fk = $villearrivee_fk;

        return $this;
    }
}