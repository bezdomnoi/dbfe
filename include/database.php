<?php

  class database {
    var $db;

    function __construct($host,$dbname,$username,$password) {
      $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
      try
      {
          $this->db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
      }
      catch(PDOException $ex)
      {
        die("Failed to connect to the database: " . $ex->getMessage());
      }
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    }

    function PDOselect($sql,$query_params) {
      try {
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex) {
        die('error in PDOselect');
      }
      $rows = $stmt->fetchAll();
      return $rows;
    }

    function PDOwithResult($sql,$query_params) {
      try {
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex) {
        die('error in PDOwithResult '. $ex->getMessage());
      }
      $rows = $stmt->fetchAll();
      return $rows;
    }
  }
  
?>
