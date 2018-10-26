<?php

class Taverne {
    private $id;
    private $nom;
    private $chambres;
    private $blonde;
    private $brune;
    private $rousse;
    private $ville;

    private static $taverne = array();

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
     * Get the value of chambres
     */ 
    public function getChambres()
    {
        return $this->chambres;
    }

    /**
     * Set the value of chambres
     *
     * @return  self
     */ 
    public function setChambres($chambres)
    {
        $this->chambres = $chambres;

        return $this;
    }

    /**
     * Get the value of brune
     */ 
    public function getBrune()
    {
        return $this->brune;
    }

    /**
     * Set the value of brune
     *
     * @return  self
     */ 
    public function setBrune($brune)
    {
        $this->brune = $brune;

        return $this;
    }

    /**
     * Get the value of rousse
     */ 
    public function getRousse()
    {
        return $this->rousse;
    }

    /**
     * Set the value of rousse
     *
     * @return  self
     */ 
    public function setRousse($rousse)
    {
        $this->rousse = $rousse;

        return $this;
    }


    /**
     * Get the value of libre
     */ 
    public function getLibre()
    {
        return $this->libre;
    }

    /**
     * Set the value of libre
     *
     * @return  self
     */ 
    public function setLibre($libre)
    {
        $this->libre = $libre;

        return $this;
    }

    /**
     * Get the value of blonde
     */ 
    public function getBlonde()
    {
        return $this->blonde;
    }

    /**
     * Set the value of blonde
     *
     * @return  self
     */ 
    public function setBlonde($blonde)
    {
        $this->blonde = $blonde;

        return $this;
    }



    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }
}
