<?php
	require_once('../../config/database.php');
	session_start();
	if ($_SESSION['id'] == null){
		header('Location: ../../index.php');
	}
	if ($_SESSION['id']){
		$username = $_SESSION['username'];
		$imageid  = htmlspecialchars($_GET['id']); 
		if (isset($_POST['like']) || isset(($_POST['comment']))) {
			if (isset($_POST['like'])) {
				$sql = 'SELECT * FROM likes WHERE imageid = :imageid AND username = :username';
				$stmt = $pdo->prepare($sql);
				if ($stmt->execute([':imageid'=> $imageid, ':username'=>$username])) {
					$likes = $stmt->fetch();
					//echo $likes['username'];
					if ($likes['imageid'] !== $imageid && $likes['username'] !== $username){
						$sql = 'INSERT INTO likes(imageid, username) VALUES (:imageid,:username)';
						$stmt = $pdo->prepare($sql);
						if ($stmt->execute([':imageid'=>$imageid, ':username'=>$username])){
							//I hate this repetetion but its got to happen
							$imageid = htmlspecialchars($_GET['id']);
							$sql = 'SELECT * FROM gallery WHERE id = :id';
							$stmt = $pdo->prepare($sql);
							$stmt->execute([':id' => $imageid]);
							while ($pics = $stmt->fetch()) {
								$user = $pics['username'];
								$id = $pics['id'];
								$likes = $pics['likes'] + 1;
								$sql = 'UPDATE gallery SET likes = :likes WHERE id = :id';
								$stmt = $pdo->prepare($sql);
								try {
									$stmt->execute([':likes' => $likes, ':id' => $id]);
									$sql = 'SELECT * FROM camagru_users WHERE username = :username';
									$stmt = $pdo->prepare($sql);
									$stmt->execute([':username' => $user]);
									while ($users = $stmt->fetch()) {
										$email = $users['email'];
										$notification = $users['notification'];
										if ($notification == 'ON') {
											$to = $email;
											$subject = 'Like Notification';
											$message = '<h3>Hi '.$user. "</h3>".$username." liked your picture";
											$headers = 'From: The sender Name <pdonga@student.wethinkcode.co.za>\r\n';
											$headers .= 'Reply-To pdonga@student.wethinkcode.co.za\r\n';
											$headers .= 'Content-type: text/html\r\n';
											mail($to, $subject, $message, $headers);
										}
									}
								} catch(PDOException $e){
									echo $e->getMessage();
								}
							}
						}
					}
				}
			} elseif (isset($_POST['comment']) && !empty($_POST['message'])) {
				$comment  = htmlspecialchars($_POST['message']);
				$id = $imageid;
				$sql = 'SELECT * FROM gallery WHERE id = :id';
				$stmt = $pdo->prepare($sql);
				$stmt->execute([':id' => $imageid]);
				$pics = $stmt->fetch();
				$user = $pics['username'];
				$comments = $pics['comments'] + 1;
				$sql = 'INSERT INTO comments(imageid, username, comment) VALUES (:imageid, :username,:comment)';
				$stmt = $pdo->prepare($sql);
				try {
					$stmt->execute([':imageid'=>$imageid, ':username'=>$username, ':comment'=>$comment]);
					$sql = 'UPDATE gallery SET comments = :comments WHERE id = :id';
					$stmt = $pdo->prepare($sql);
					try {
						$stmt->execute([':comments' => $comments, ':id' => $id]);
						$sql = 'SELECT * FROM camagru_users WHERE username = :username';
						$stmt = $pdo->prepare($sql);
						$stmt->execute([':username' => $user]);
						while ($users = $stmt->fetch()) {
						$email = $users['email'];
						$notification = $users['notification'];
							if ($notification == 'ON') {
								$to = $email;
								$subject = 'Comment Notification';
								$message = '<h3>Hi '.$user. "</h3>".$username." commented on your picture";
								$headers = 'From: The sender Name <pdonga@student.wethinkcode.co.za>\r\n';
								$headers .= 'Reply-To pdonga@student.wethinkcode.co.za\r\n';
								$headers .= 'Content-type: text/html\r\n';
								mail($to, $subject, $message, $headers);
							}
						}
					} catch(PDOException $e){
						echo $e->getMessage();
					}
				} catch(PDOException $e){
					echo $e->getMessage();
				}
			}	
		}
	}
?> 