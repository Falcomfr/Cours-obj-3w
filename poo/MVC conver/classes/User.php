<?php
class User extends Core {
  /**
   * Identifiant de l'utilisateur
   *
   * @var integer
   */
  private $_id;
  /**
   * Nom d'utilisateur
   *
   * @var string
   */
  private $_login;
  /**
   * Nom de l'utilisateur
   *
   * @var string
   */
  private $_prenom;
  /**
   * Prénom de l'utilisateur
   *
   * @var string
   */
  private $_nom;

  private $_naissance;
  
  private $_inscription;

  private $_rank;
  /**
   * Constructeur
   *
   * @param array $data
   */
  public function __construct(array $data) {
    $this->hydrate($data);
  }
  

  /**
   * Get identifiant de l'utilisateur
   *
   * @return  integer
   */ 
  public function get_id()
  {
    return $this->_id;
  }

  /**
   * Set identifiant de l'utilisateur
   *
   * @param  integer  $_id  Identifiant de l'utilisateur
   *
   * @return  self
   */ 
  public function set_id($_id)
  {
    $this->_id = $_id;

    return $this;
  }

  /**
   * Get nom d'utilisateur
   *
   * @return  string
   */ 
  public function get_login()
  {
    return $this->_login;
  }

  /**
   * Set nom d'utilisateur
   *
   * @param  string  $_login  Nom d'utilisateur
   *
   * @return  self
   */ 
  public function set_login(string $_login)
  {
    $this->_login = $_login;

    return $this;
  }

  /**
   * Get nom de l'utilisateur
   *
   * @return  string
   */ 
  public function get_prenom()
  {
    return $this->_prenom;
  }

  /**
   * Set nom de l'utilisateur
   *
   * @param  string  $_lastname  Nom de l'utilisateur
   *
   * @return  self
   */ 
  public function set_prenom(string $_prenom)
  {
    $this->_prenom = $_prenom;

    return $this;
  }

  /**
   * Get prénom de l'utilisateur
   *
   * @return  string
   */ 
  public function get_nom()
  {
    return $this->_nom;
  }

  /**
   * Set prénom de l'utilisateur
   *
   * @param  string  $_firstname  Prénom de l'utilisateur
   *
   * @return  self
   */ 
  public function set_nom(string $_nom)
  {
    $this->_nom = $_nom;

    return $this;
  }

  public function get_naissance()
  {
    return $this->_naissance;
  }


  public function set_naissance(string $_naissance)
  {
    $this->_naissance = $_naissance;

    return $this;
  }

  public function get_rank()
  {
    return $this->_rank;
  }


  public function set_rank(string $_rank)
  {
    $this->_rank = $_rank;

    return $this;
  }

  public function get_inscription()
  {
    return $this->_inscription;
  }


  public function set_inscription(string $_inscription)
  {
    $this->_inscription = $_inscription;

    return $this;
  }

 
  public function signin() {
    echo 'Je me log';
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