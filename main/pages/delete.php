<?php
    require_once('../../config/database.php');
	session_start();

	if ($_SESSION['id']){
        $user_id = $_SESSION['id'];
        $imageid  = htmlspecialchars($_GET['id']);
		if (isset($_POST['delete'])) {
            $sql = 'SELECT * FROM gallery WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([':id' => $imageid])){
                 $pic = $stmt->fetch();
                if ($pic['userid'] == $user_id){
                    echo $imageid;
                    //$sql1 = 'DELETE FROM comments WHERE imageid = :imageid';
                    //$sql1->execute([':imageid' => $imageid]);

                     //$sql2 = 'DELETE FROM likes WHERE imageid = :imageid';
                    //$sql2->execute([':imageid' => $imageid]);
                    $id  = htmlspecialchars($_GET['id']);
                    try {
                        $sql = "DELETE * FROM gallery WHERE id = :id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([':id' => $id]);
                        //header('Location: home_page.php');
                    } catch (PDOException $e){
                        echo $e->getMessage();
                    }
                } else {
                   // header('Location: profile_page.php?');
                }
            } else {
                header('Location: home_page.php?i=2');
            }
		}
	}
?>