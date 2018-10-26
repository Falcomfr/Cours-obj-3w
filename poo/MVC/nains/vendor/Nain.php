<?php

class Nain {
    private $id;
    private $nom;
    private $barbe;
    private $groupe;
    private $ville;


    private static $nains = array();

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
     * Get the value of barbe
     */ 
    public function getBarbe()
    {
        return $this->barbe;
    }

    /**
     * Set the value of barbe
     *
     * @return  self
     */ 
    public function setBarbe($barbe)
    {
        $this->barbe = $barbe;

        return $this;
    }



    /**
     * Get the value of groupe
     */ 
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set the value of groupe
     *
     * @return  self
     */ 
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;

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