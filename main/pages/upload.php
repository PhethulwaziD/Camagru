<?php
	require_once('../../config/database.php');
	session_start();
	if ($_SESSION['id'] == null){
		header('Location: ../../index.php');
	}
	if (isset($_POST['upload'])){
		//$_FILE is a supergloabal, stores file information in  the form of an assoc arra
		//Here I am assigning that $_FILE array to var $file
		$file  = $_FILES['file'];
		//print_r($_FILE['file']);
		$file_name = $_FILES['file']['name'];
		$file_tmp_name = $_FILES['file']['tmp_name'];
		//echo "$file_tmp_name";
		$file_size = $_FILES['file']['size'];
		$file_error = $_FILES['file']['error'];
		$file_type = $_FILES['file']['name'];
		$file_extension = explode('.', $file_name);
		$file_ext = strtolower(end($file_extension));

		$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
		if (in_array($file_ext, $allowed_ext)) {
			if ($file_error === 0){
				if ($file_size < 10000000){
					//create new name for img
					$new_name = uniqid('', true).".".$file_ext;
					$file_destination = $new_name;
					$dest = "uploads/";
					if (move_uploaded_file($file_tmp_name, $dest.$new_name)){
						echo "succes";
					} else {
						echo "failed";
						//echo $dest.$new_name;
					}
					//store location and the user id of therson who posted the pic
					$id = $_SESSION['id'];
					$username = $_SESSION['username'];
					$sql = 'INSERT INTO gallery(userid, username, directory, comments, likes) VALUES(:userid, :username, :directory, :comments, :likes)';
					$stm = $pdo->prepare($sql);
					if($stm->execute(['userid'=>$id, 'username'=>$username, 'directory'=>$file_destination, 'comments'=>'0', 'likes'=> '0'])) {
						header("Location:home_page.php");
					}
					//////////////////////////////////////////////////////////////
				} else {
					$error['file'] = 'file to big';
				}

			} else {
				$error['file'] = "An error occured";
			}
		} else
			$error['file'] = "Cannot upload file type";
	}	

?>