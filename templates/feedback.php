<div id="feedback_container">
<?php
	if (isset($feedback)) {
		
		$msgs = $feedback->getMessages();
		if (!empty($msgs)) {
			echo '<p>';
			foreach($msgs as $msg) {
				echo "NOTICE: ".htmlspecialchars($msg)."<br>";
			}
			echo '</p>';
		}
	}
?>
</div>