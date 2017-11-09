<?php
	function pb($str) {
		echo htmlspecialchars($_POST[$str]);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<?php
	echo '<title>'.$title.'</title>';
	foreach ($styles as $style) {
		echo '<link rel="stylesheet" href="'.$style.'">';
    }
	foreach ($js as $script) {
		echo '<script src="'.$script.'"></script>';
	}
?>
	<script>
		var password_pattern = <?php echo $pswd_security_pattern;?>;
		var password_legend = '<?php echo $pswd_security_legend?>';
	</script>
  </head>
  <body>
	<div id="container">
<?php
	require_once('templates/header.php');
	require_once('templates/menu.php');
	require_once('templates/feedback.php');
	require_once('templates/'.$page);
?>
	</div>
  </body>
</html>