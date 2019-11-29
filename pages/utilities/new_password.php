<?php
	function create_password(){
		$new_password = "abcdefghijklmnopqsrtuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890,./@!$#%&({}[]|)";
		return (substr(str_shuffle($new_password),0,8));
	} 
?>