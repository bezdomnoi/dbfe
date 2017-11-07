<?php
  function devPrint($array) {
    print "<pre>";
    print_r($array);
    print "</pre>";
  }

  function doSQL(&$db,$sql,$query_params) {

    try {
      $stmt = $db->prepare($sql);
      $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
      die('test');
    }

    $rows = $stmt->fetchAll();
    return $rows;

  }
  
  function ec($text) {
	  echo $text.'<br/>';
  }


?>
