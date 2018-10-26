<?php

class Groupe {
    private $id;
    private $debuttravail;
    private $fintravail;
    private $taverne;
    private $tunnel;

    private static $groupes = array();

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
     * Get the value of debuttravail
     */ 
    public function getDebuttravail()
    {
        return $this->debuttravail;
    }

    /**
     * Set the value of debuttravail
     *
     * @return  self
     */ 
    public function setDebuttravail($debuttravail)
    {
        $this->debuttravail = $debuttravail;

        return $this;
    }

    /**
     * Get the value of fintravail
     */ 
    public function getFintravail()
    {
        return $this->fintravail;
    }

    /**
     * Set the value of fintravail
     *
     * @return  self
     */ 
    public function setFintravail($fintravail)
    {
        $this->fintravail = $fintravail;

        return $this;
    }



    /**
     * Get the value of taverne
     */ 
    public function getTaverne()
    {
        return $this->taverne;
    }

    /**
     * Set the value of taverne
     *
     * @return  self
     */ 
    public function setTaverne($taverne)
    {
        $this->taverne = $taverne;

        return $this;
    }

    /**
     * Get the value of tunnel
     */ 
    public function getTunnel()
    {
        return $this->tunnel;
    }

    /**
     * Set the value of tunnel
     *
     * @return  self
     */ 
    public function setTunnel($tunnel)
    {
        $this->tunnel = $tunnel;

        return $this;
    }
}