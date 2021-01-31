<?php
	require_once('config/database.php');
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intiail-scale=1.0">
	<link rel="stylesheet" type="text/css" href="main/templates/styles.css">
	<title>camagru_home page</title>
	<body>
		<header class="showcase" id="index-header">
			<a href="" class="logo" id="index-logo">Camagru</a>
			<div id="index-toggle" class="menu-toggle">+</div>
			<nav>
				<ul>
					<li><a id="index-links" href="index.php">Home</a></li>
					<li><a id="index-links" href="pages/sign_up_page.php">Sign Up</a></li>
					<li><a id="index-links" href="pages/login_page.php">Sign In</a></li>
					<li><a id="index-links" href="pages/forgot_password_page.php">Forgot password</a></li>
				</ul>
			</nav>
			<div class="clearfix"></div>
		</header>
		<div class="upcoming-container">
			<div class="upcoming-images">
					<?php 
						$sql = 'SELECT * FROM gallery';
						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						$total_records = $stmt->rowCount();
						$records_per_page = 12;
						$page = '';
						if (!isset($_GET['page'])) {
							$page = 1;
						} else {
							if (is_numeric($_GET['page'])) {
								$page = $_GET['page'];
							} else {
								$page = 1;
							}
						}
							$total_pages = ceil($total_records/$records_per_page);
							$start_from = ($page-1) * $records_per_page;
							$sql = "SELECT * FROM gallery ORDER BY id DESC LIMIT $start_from, $records_per_page";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
						while ($pics = $stmt->fetch()) { ?>
				<div class="img-wrapper" style="background-image: url(<?php echo "main/pages/uploads/".$pics['directory']; ?>);">
					<div class="description">
						<div class="desc-content">
								
						</div>
					</div>	
				</div>
					<?php } ?>
			</div>
		</div>
	</div>
	<br />
	<div class="pagination">
		<?php for ($i = 1; $i <= $total_pages; $i++) {
				echo "<a href='index.php?page=$i'> $i </a>";
		}?>
	</div>
</body>
	<script type="text/javascript" src="./main/pages/script.js"></script>
</html>