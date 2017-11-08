<?php
class FeedBack {
	private $messages = array();
	
	function __construct() {
		
	}
	
	function putMessage($msg) {
		$this->messages[] = $msg;
	}
	
	function getMessages() {
		return $this->messages;
	}
}

?>