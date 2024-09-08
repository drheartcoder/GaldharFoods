<?php

session_start();

if($_SESSION['name'])
{
?>
	<html>
		<head>
			<?php include 'bootstrapres.php'; ?>
			
			<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
			<title>Galdhar Foods Pvt Ltd</title>
			
		</head>
		
		<body>
			<div style="height:745px;">
			
				<?php include 'toplogo.php'; ?>
				<?php include 'menu.php'; ?>
				
			</div>
		</body>
		
		<?php include 'footer.php'; ?>
		
	</html>
<?php
}
else
{
	header('location: index.php');
}
?>