<?php
if(isset($_POST['btnlogin']))
{
	session_start();
	extract($_POST);
	$username=$_POST['xname'];
	$userpassword=$_POST['xpassword'];
	include("dbconnect.php");
	$q=mysql_query("select * from login where name='$username' and password='$userpassword'");
	if($q)
	{
		$res=mysql_fetch_array($q);
		extract($res);
		if($name==$username && $password==$userpassword)
		{
			$_SESSION['name'] = $name;
			$_SESSION['password'] = $password;
			header('location: home.php');
		}
		else
		{
			?><script>alert("Invalid UserName And/Or Password!!");</script><?
		}
	}
	else
	{
		?><script>alert("Something Wrong!!");</script><?
	}		
}
?>

<html>
<head>
<link rel="SHORTCUT ICON" href="images/MonginisLogo.jpg" />
<title>Galdhar Foods Pvt Ltd</title>

<?php include 'bootstrapres.php'; ?>

<script type="text/javascript">
function validate_register()
{
	if(document.getElementById("xname").value=="")
	{
		 alert('Please Enter UserName');
		 document.getElementById('xname').focus();  
		 return false;
	}
	if(document.getElementById("xpassword").value=="")
	{
		 alert('Please Enter Password');
		 document.getElementById('xpassword').focus();     
		 return false;
	}
}
</script>

<style>
.a
{
	height:20px;
}
input[type='submit'] 
{
	/*width:50px;*/
	height:30px;
	font-size:16px;
}
</style>
</head>
<body>
	
	<div style="height:745px;">
	
	<?php include 'toplogo.php'; ?>
	<div style="background-color:#CCCCCC; height: 30px;"></div>
		
	<h3 style="color:#0033CC;" align="center"><b>Login</b></h3>
	<br/>
	<form method="post" >
		<table align="center">
			<tr>
				<td>User Name :</td>
			</tr>
			<tr>
				<td><input type="text" name="xname" id="xname" style="height:30px"></td>
			</tr>

			<tr>
				<td>Password :</td>
			</tr>

			<tr>
				<td><input type="password" name="xpassword" id="xpassword" style="height:30px" /></td>
			</tr>

			<tr>
				<td align="center" colspan="2"><input value="Login" name="btnlogin" type="submit" onClick="return validate_register();" /></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="change_password.php">Change Password</a></td>
			</tr>
		</table>
	 </form>
	 </div>
</body>
<?php include 'footer.php'; ?>
</html>