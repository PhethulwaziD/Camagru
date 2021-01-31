 <?php
	$dbname = "camagru";
	$dbuser = "root";
	$dbpass = "";
	$dbhost = "localhost";

	try{
		$pdo = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpass);
	}
	catch (PDOException $err){
			echo "Database connection problem ".$err->getMessage();
	}
?>