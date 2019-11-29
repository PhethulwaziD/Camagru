<?php
	function verify_email($email){
	if ($email == null){
			return ("Email required");
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return ("Invalid email address");
		}
		return (null);
	} 
?>