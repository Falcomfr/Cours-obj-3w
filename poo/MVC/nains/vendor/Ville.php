<?php

class Ville {
    private $id;
    private $nom;
    private $superficie;

    private static $villes = array();

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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of superficie
     */ 
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set the value of superficie
     *
     * @return  self
     */ 
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }
}