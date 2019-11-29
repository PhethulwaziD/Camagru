<?php
	function valid_password ($password) {
		if (strlen($password) >= 8){
			if (!ctype_upper($password) && !ctype_lower($password)){
				return (TRUE);
			}
		}
		return (FALSE);
	}
?>