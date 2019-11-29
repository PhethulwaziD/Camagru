<?php
	session_start();
	include_once('comments.php');
	//include_once('delete.php');
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
					try {	
						$sql = 'DELETE FROM comments WHERE imageid = :imageid';
						$stmt = $pdo->prepare($sql);
                        $stmt->execute([':imageid' => $imageid]);
					} catch (PDOException $e) {
						echo $e->getMessage();
                    }

                    try {	
						$sql = 'DELETE FROM likes WHERE imageid = :imageid';
						$stmt = $pdo->prepare($sql);
                        $stmt->execute([':imageid' => $imageid]);
					} catch (PDOException $e) {
						echo $e->getMessage();
					}
					
                    try {
                        $sql = "DELETE FROM gallery WHERE id = :imageid";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([':imageid' => $imageid]);
                        header('Location: home_page.php');
                    } catch (PDOException $e){
                        echo $e->getMessage();
                    }
                } else {
                    header('Location: profile_page.php?');
                }
            } else {
                header('Location: home_page.php?i=2');
            }
		}
	}
?>

<!DOCTYPE html>
<html>
	<?php include_once('header.html'); ?>
	<section class="imageview">
		 		<?php
					 $image_id = htmlspecialchars($_GET['id']);
					if (!is_numeric($image_id))
						header('Location: home_page.php');
					$sql = 'SELECT * FROM gallery WHERE id = :id';
					$stmt = $pdo->prepare($sql);
					if (!$stmt->execute([':id' => $image_id]))
						header('Location: home_page.php');
					while ($pics = $stmt->fetch()) {  
				?>
					<div class="comments">
					<h4 class="name"><?php echo $pics['username']?></h4>
					<div style= "background-image: url(<?php echo "uploads/".$pics['directory']; ?>);">
					<form action="comments_page.php?id=<?php echo $image_id; ?>" method="POST">
						<button class="delete" type="submit" name="delete">X</button>
					</form>
					</div>
					<form action="comments_page.php?id=<?php echo $image_id; ?>" method="POST">
						<button class="like" type="submit" name="like">like</button>
						<p class="information">Likes <?php echo $pics['likes']?> Commets <?php echo $pics['comments']?> </p>
						<?php }?>
						<input type='hidden' name='username' value='anonymous'>
						<textarea  name ='message' ></textarea>
						<button class="like" type="submit" name="comment">comment</button>
					</form>
						<?php
				 			$imageid = htmlspecialchars($_GET['id']);
							$sql = 'SELECT * FROM comments WHERE imageid = :imageid';
							$stmt = $pdo->prepare($sql);
							$stmt->execute([':imageid' => $imageid]);
							while ($comments = $stmt->fetch()) { ?>
							<h4 class="names"><?php echo $comments['username']; ?></h4>
							<p class="commenting"><?php echo $comments['comment']; ?></p>
						<?php }?>
				</div>
	</section>
</body>