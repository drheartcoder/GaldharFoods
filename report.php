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
			
			<center>
			<br />
			<div id="mydiv" style="width:60%;">
				<table border="1" cellspacing="0" cellpadding="5" width="100%" align="center">
					<tr bgcolor="grey" align="center" style="color:white;">
						<td>
							Sr.No.
						</td>
						<td>
							Description
						</td>
						<td>
							Option
						</td>
					</tr>
					<tr>
						<td>
							1
						</td>
						<td>
							Date Wise Summary
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr style="background-color:#E9E9E9;">
						<td>
							2
						</td>
						<td>
							Party Wise Details
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr>
						<td>
							3
						</td>
						<td>
							Party Wise Summary
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr style="background-color:#E9E9E9;">
						<td>
							4
						</td>
						<td>
							Monthly Details
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr>
						<td>
							5
						</td>
						<td>
							Monthly Summary
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr style="background-color:#E9E9E9;">
						<td>
							6
						</td>
						<td>
							Product Wise
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr>
						<td>
							7
						</td>
						<td>
							Product/Party Wise
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr style="background-color:#E9E9E9;">
						<td>
							8
						</td>
						<td>
							Party/Group/Month Wise
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr>
						<td>
							9
						</td>
						<td>
							Product/Party/Month Wise Value
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr style="background-color:#E9E9E9;">
						<td>
							10
						</td>
						<td>
							Product/Party/Month Wise Quantity
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr>
						<td>
							11
						</td>
						<td>
							Party/Product/Month Wise Value
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr style="background-color:#E9E9E9;">
						<td>
							12
						</td>
						<td>
							Party/Product/Month Wise Quantity
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr>
						<td>
							13
						</td>
						<td>
							Company Bill Wise
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr style="background-color:#E9E9E9;">
						<td>
							14
						</td>
						<td>
							Royalt Consolidated
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr>
						<td>
							15
						</td>
						<td>
							Quantitative Analysis01
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr style="background-color:#E9E9E9;">
						<td>
							16
						</td>
						<td>
							Quantitative Analysis02
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
					<tr>
						<td>
							17
						</td>
						<td>
							Sales Consolidated
						</td>
						<td>
							<a href="fpdf/printreport.php" class="button" style="text-decoration:none">Print</a>
						</td>
					</tr>
				</table>
			</div>
			</center>
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