<?php

  class UserControl {
    var $db;

    function __construct(&$db) {
      $this->db = &$db;
    }

    function addUser($email,$display,$password,$active = 0){
      $sql = "
          INSERT INTO user_auth (
              user_email,
			  user_display,
              user_password,
              user_active
          ) VALUES (
              :email,
			  :display,
              :password,
              :active
          )
      ";
      $password = password_hash($password,PASSWORD_BCRYPT,['cost' => 11]);
      $query_params = array(
          ':email' => $email,
		  ':display' => $display,
          ':password' => $password,
          ':active' => (($active == 0) ? 0 : 1)
      );

      return $this->db->PDOwithLastId($sql,$query_params);

    }

    function verifyUser($email,$password) {
      $sql = "SELECT user_id, user_password FROM user_auth WHERE user_email = :email";
      $query_params = array(':email'=> $email);

      $row = $this->db->PDOwithResult($sql,$query_params);

      if (count($row) == 1) {
        if (password_verify($password,$row[0]['user_password'])) {
          return $row[0]['user_id'];
        } else return false;
      } else {
        return false;
      }
    }

    function isAvailable($email) {
      $sql = "SELECT user_email FROM user_auth WHERE user_email = :email";
      $query_params = array(':email'=>$email);

      $row = $this->db->PDOwithResult($sql,$query_params);

      if(!empty($row)) {
        return false;
      } else {
        return true;
      }
    }

    function setUserActive($user_id, $active) {
      $sql = 'UPDATE user_auth SET user_active = :active WHERE user_id = :id';
      $query_params = array(':id'=>$user_id,':active'=>$active);

      return $this->db->PDOquery($sql,$query_params);
    }

    function getUserById($user_id) {
      $sql = "
        SELECT
			*
        FROM
          user_auth
        WHERE
          user_id = :user_id
      ";
      $query_params = array(':user_id'=>$user_id);

      return $this->db->PDOsingleResult($sql,$query_params);
    }

    function deleteUser($user_id) {
      $sql = "
        DELETE FROM user_auth WHERE user_id = :user_id
      ";
      $query_params = array(':user_id'=>$user_id);

      return $this->db->PDOquery($sql,$query_params);
    }

    function setPassword($user_id, $password) {

      $password = password_hash($password,PASSWORD_BCRYPT,['cost' => 11]);
      $sql = "
        UPDATE user_auth SET user_password = :password WHERE user_id=:user_id
      ";
      $query_params = array(':user_id'=>$user_id,':password'=>$password);

      return $this->db->PDOquery($sql,$query_params);
    }

  }
?>
