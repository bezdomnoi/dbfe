<?php
	function pb($str) {
		echo htmlspecialchars($_POST[$str]);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo $style;?>">
    <script src="<?php echo $js;?>"></script>
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