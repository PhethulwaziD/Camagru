 <?php
	$dbname = "camagru_";
	$dbuser = "root";
	$dbpass = "password";
	$dbhost = "localhost";

	try{
		$pdo = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpass);
	}
	catch (PDOException $err){
			echo "Database connection problem ".$err->getMessage();
	}
?>