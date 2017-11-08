<?php
	if (isset($feedback)) {
		$msgs = $feedback->getMessages();
		
		foreach($msgs as $msg) {
			echo "Error: {$msg}<br>";
		}
	}
?>