<?php
	if (isset($menu)) {
?>

<div id="menu_container">
	<ul>
		<?php
			foreach ($menu as $item) {
				echo "<li><a href=\"{$item['url']}\">{$item['key']}</a></li>";
			}
		?>
	</ul>
</div>

<?php
	} else die('No menus defined');
?>