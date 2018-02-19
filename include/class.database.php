<?php

  class DataBase {
    public $db;

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
    // returns all results as ASSOC array
    function PDOwithResult($sql,$query_params = null) {
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
    // returns last insert Id
    function PDOwithLastId($sql,$query_params) {
      try {
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex) {
        die('error in PDOwithLastId '. $ex->getMessage());
      }
      return $this->db->lastInsertId();
    }
    // returns true if successful, false otherwise
    function PDOquery($sql,$query_params){
      try {
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex) {
        die('error in PDOquery '. $ex->getMessage());
      }
      return $result;

    }
    // returns row or false if multiple matches
    function PDOsingleResult($sql,$query_params) {
      try {
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute($query_params);
      }
      catch(PDOException $ex) {
        die('error in PDOsingleResult '. $ex->getMessage());
      }
      $row = $stmt->fetchAll();
      if (count($row) == 1) return $row[0];
      else return false;
    }
  }
?>
