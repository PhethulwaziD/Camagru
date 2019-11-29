<?php
	require_once('config/database.php');
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intiail-scale=1.0">
	<link rel="stylesheet" type="text/css" href="main/templates/styles.css">
	<title>camagru_home page</title>
	<title></title>
</head>
	<body>
		<header>
			Camagru
		</header>
		<nav>
			<ul>
				<li>
					<a href="pages/login_page.php">Login</a>
				</li>
				<li>
					<a href="pages/sign_up_page.php">Sign up</a>
				</li>
			</ul>
		</nav>
		<section class="gallery">
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
			<div class="container">
				<a href="main/pages/comments_page.php?id=<?php echo $pics['id']; ?>">
					<div style= "background-image: url(<?php echo "main/pages/uploads/".$pics['directory']; ?>);">	
					</div>
				</a>
			</div>
				<?php }
				?>
	</section>
	<br />
	<div class="pagination">
		<?php for ($i = 1; $i <= $total_pages; $i++) {
				echo "<a href='index.php?page=$i'> $i </a>";
		}?>
	</div>
</body>
</html>