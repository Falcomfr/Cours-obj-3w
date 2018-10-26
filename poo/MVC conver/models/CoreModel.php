<?php

class CoreModel {
  protected $_db;

  public function __construct(string $engine, string $host, string $dbname, string $user, string $pwd, string $charset = 'utf8mb4', string $collate = 'utf8mb4_general_ci') {
    try {
      $this->_db = new PDO($engine . ':host=' . $host . ';dbname=' . $dbname . ';charset=' . $charset, $user, $pwd, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch(PDOException $e) {
      throw new Exception('Can not access to the database', 10, $e);
    }
  }
}