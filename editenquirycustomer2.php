<?php

session_start();

if($_SESSION['name'])
{
?>

<?php
	//else 
	if(isset($_POST['btnback']))
	{
		header('location: editenquirycustomer.php');
	}
?>

<html>
	<head>
		<?php include 'bootstrapres.php'; ?>
		
		<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
		<title>Galdhar Foods Pvt Ltd</title>
		
		<style>
		select
		{
			height:30px;
			margin-bottom:10px;
		}
		input[type='text'] 
		{
			height:30px;
			vertical-align:middle;
		}
		</style>

		
	</head>
	
	<body>
		
			<form method="post">
			<center>
				<br>
					<table cellpadding="2" align="center">
						<tr>
							<td>Product Code : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Product Description : </td>
							<td>
								<?php
								include('dbconnect.php');
								$sql = "SELECT * FROM matmst";
								$rs = mysql_query($sql) or die(mysql_error());
								?>
									<select id="xproddescrip" name="xproddescrip" style="width:360px;">
								<?php
									while($row = mysql_fetch_array($rs))
									{
										if($proddescrip == $row["mtcd"])
										{
											echo "<option selected value='".$row["mtcd"]."'>".$row["mt_head"]."</option>";
										}
										else
										{
											echo "<option value='".$row["mtcd"]."'>".$row["mt_head"]."</option>";
										}
									}
									mysql_free_result($rs);
								?>
									</select>&nbsp;
							</td>
						</tr>
						<tr>
							<td>Description : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td></td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td></td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td></td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>UOM : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Qty : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Free Qty : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Total Qty : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>MRP : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Rate : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Value : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Disc 1 : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Disc 2 : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Disc 3 : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>P and F : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Excise : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>CESS : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>H. CESS : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Freight : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Oth Exp : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Tax Code</td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Tax : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>VAT : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr>
							<td>Total : </td><td><input type="text" name="x" /></td>
						</tr>
						<tr align="center">
							<td colspan="2">
								<input type="submit" value="Save" name="btnsave" />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="submit" name="btnback" value="Back" />
							</td>
						</tr>
					</table>
				
			</center>
			</form>
			
		</div>
	</body>
	
</html>
<?php
}
else
{
	header('location: index.php');
}
?>