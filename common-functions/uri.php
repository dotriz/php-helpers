<?php

	function _request($param, $defaultValue = false) {
		return isset($_REQUEST[$param]) ? $_REQUEST[$param] : $defaultValue;
	}
	
	function _post($param, $defaultValue = false) {
		return isset($_POST[$param]) ? $_POST[$param] : $defaultValue;
	}

?>