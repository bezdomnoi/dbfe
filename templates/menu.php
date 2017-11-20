<?php
  if (isset($menu)) {
?>

<div id="menu_container">
<<<<<<< HEAD
<<<<<<< HEAD
	<ul>
		<?php
			foreach ($menu as $item) {
				/*
				$show = false;				
				if (!isset($item['when'])) $show = true;
				elseif ($item['when'] == "logged_out" && !isset($_SESSION['user'])) $show = true;
				elseif ($item['when'] == "logged_in" && isset($_SESSION['user'])) {
					$show = true;
					
					if (isset($item['attributes'])) {
						foreach ($item['attributes'] as $key=>$value) {
							$show = $show && $_SESSION['user']['attributes'][$key];
						}
					}
				}
				if ($show)*/ echo "<li><a href=\"{$item['url']}\">{$item['key']}</a></li>";
			}
			
			if (isset($_SESSION['user'])) { 
			?>
=======
=======
>>>>>>> 179185196e6081ea1a07d236ccea04da457fdc15
  <ul>
    <?php
      foreach ($menu as $item) {
        /*
        $show = false;        
        if (!isset($item['when'])) $show = true;
        elseif ($item['when'] == "logged_out" && !isset($_SESSION['user'])) $show = true;
        elseif ($item['when'] == "logged_in" && isset($_SESSION['user'])) {
          $show = true;
          
          if (isset($item['attributes'])) {
            foreach ($item['attributes'] as $key=>$value) {
              $show = $show && $_SESSION['user']['attributes'][$key];
            }
          }
          
        }
        
        if ($show)*/ echo "<li><a href=\"{$item['url']}\">{$item['key']}</a></li>";
      }
      
      if (isset($_SESSION['user'])) { 
      ?>
<<<<<<< HEAD
>>>>>>> 179185196e6081ea1a07d236ccea04da457fdc15
=======
>>>>>>> 179185196e6081ea1a07d236ccea04da457fdc15
<div id="logout_container"><form id="FORM_LOGOUT" action="index.php" method="post" style="float:right">
  <input type="hidden" name="FORM_CONTROLLER" value="LOGOUT"/>
  <input type="submit" value="LOGOUT" id="btn_logout" class="btn_menu" />
</form></div>
      <?php
      }
    ?>
  </ul>
</div>
<?php
  } else die('No menus defined');

?>