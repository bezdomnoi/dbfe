<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo $style;?>">
    <script src="<?php echo $js;?>"></script>
  </head>
  <body>
    <?php
		require_once('templates/'.$page);
	?>
  </body>
</html>