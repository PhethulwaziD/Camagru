<?php
	require_once('../../config/database.php');
	include('../../pages/utilities/includes.php');
    session_start();
    if ($_SESSION['id'] == null){
		header('Location: ../../index.php');
	}
	if(isset($_SESSION['id'])) {
        $id  = $_SESSION['id'];
        $username = $_SESSION['username'];
        $image = $_POST['image'];
        $filter = $_POST['filter'];
        //var_dump($_POST);
    }
    if (!empty($image)){
    
            $image_name = $username.uniqid().".png";
            $image_path = "uploads/".$image_name;
            $image_url = str_replace("data:image/png;base64,", "", $image);
            $image_url = str_replace(" ", "+", $image_url);
            $decoded_image = base64_decode($image_url);
            file_put_contents($image_path, $decoded_image);
        if(!empty($filter)){
            $filter_name = "sticker".uniqid().".png";
            $filter_path = "uploads/".$filter_name;
            $filter_url = str_replace("data:image/png;base64,", "", $filter);
            $filter_url = str_replace(" ", "+", $filter_url);
            $decoded_filter =base64_decode($filter_url);
            file_put_contents($filter_path, $decoded_filter);
        }
    }

    if (isset($image) && isset($filter)) {
        $dst = imagecreatefrompng($image_path);
        $src = imagecreatefrompng($filter_path);
        imagecopy($dst, $src, 80, 30, 80, 20, 180, 180);
        imagepng($dst, $image_path);
        imagedestroy($dst);
        imagedestroy($src);
        unlink($filter_path);
        $sql = 'INSERT INTO gallery(userid, username, directory, comments, likes) VALUES(:userid, :username, :directory, :comments, :likes)';
    	$stmt = $pdo->prepare($sql);
	    $stmt->execute(['userid'=>$id, 'username'=>$username, 'directory'=>$image_name, 'comments'=>'0', 'likes'=> '0']);
    }
 ?>