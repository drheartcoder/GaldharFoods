<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link href="css/style.css" rel="stylesheet">

<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function () 
	{	
		$('#menu li').hover
		(
			function () 
			{
				//show its submenu
				$('ul', this).slideDown(100);
			}, 
			function ()
			{
				//hide its submenu
				$('ul', this).slideUp(100);			
			}
		);
	});
</script>

<div id="menu">
			
	<li><a>Master</a>
		<ul>
			<li><a href="itemsupergroup.php">Item Super Group</a></li>
			<li><a href="itemgroup.php">Item Group</a></li>
			<li><a href="itemsubgroup1.php">Item Sub Group 1</a></li>
			<li><a href="itemsubgroup2.php">Item Sub Group 2</a></li>
			<li><a href="itemsubgroup3.php">Item Sub Group 3</a></li>
			<li><a href="itemmaster.php">Item Master</a></li>
			<li><a href="dealerdetails.php">General Ledger</a></li>
			<li><a href="customermaster.php">Customer Master</a></li>
			<li><a href="suppliermaster.php">Supplier Master</a></li>
		</ul>			
	</li>
	
	<li>
		<a>General Masters 1</a>
		<ul>
			<li><a href="custcat.php">Customer Catagory</a></li>
			<li><a href="custtype.php">Customer Type</a></li>
			<li><a href="area.php">Area Master</a></li>
			<li><a href="narration.php">Narration Master</a></li>
			<li><a href="godown.php">Godown Master</a></li>
			<li><a href="operator.php">Operator</a></li>
			<li><a href="salesman.php">Salesman Master</a></li>
			<li><a href="transporter.php">Transporter Master</a></li>
			<li><a href="despatch.php">Despatch Mode</a></li>
			<li><a href="payment.php">Payment Term</a></li>
			<li><a href="department.php">Department Master</a></li>
			<li><a href="breakdown.php">Nature of Breakdown</a></li>
			<li><a href="reasonreject.php">Reason of Rejection</a></li>
			<li><a href="shortage.php">Shortage Type</a></li>
			<li><a href="subdept.php">Sub Department Master</a></li>
			<li><a href="uom.php">UOM Master</a></li>
		</ul>
	</li>
	<li>
		<a>General Masters 2</a>
		<ul>
			<li><a href="team.php">Team Master</a></li>
			<li><a href="excise.php">Excise Teriff Head</a></li>
			<li><a href="shift.php">Shift Master</a></li>
			<li><a href="festival.php">Festival Master</a></li>
			<li><a href="route.php">Route Master</a></li>
			<li><a href="prodplan.php">Production Plan</a></li>
			<li><a href="city.php">City Master</a></li>
			<li><a href="size.php">Size Master</a></li>
			<li><a href="delivery.php">Delivery Type</a></li>
			<li><a href="cc.php">CC Master</a></li>
			<li><a href="itemspecific.php">Item Specification</a></li>
			<li><a href="bank.php">Bank List</a></li>
			<li><a href="prodproc.php">Production Process</a></li>
			<li><a href="jobwork.php">Job Work Process</a></li>
			<li><a href="machine.php">Machinery Master</a></li>
		</ul>
	</li>
	
	<li>
		<a>Transaction</a>
		<ul>
			<li><a href="sales.php">Sales</a></li>
		</ul>
	</li>
	
	<li><a>Reports</a>
		<ul>
			<li><a href="report.php">Report</a></li>
		</ul>
	</li>
	
	<li><a>Setup</a>
		<ul>
			<li><a href="userdetails.php">User Details</a></li>
			<li><a href="companydetails.php">Company Details</a></li>
			<li><a href="dealerdetails.php">Dealer Details</a></li>
		</ul>			
	</li>
	
	<li><a>Admin</a>
		<ul>
			<li><a href="basevoucher.php">Base Voucher Setup</a></li>
			<li><a href="subvoucher.php">Sub Voucher Setup</a></li>
			<li><a href="gridfields.php">Grid Display Setup</a></li>
			<li><a href="uservouchersetup.php">User Voucher Setup</a></li>
			<li><a href="reportsetup.php">Report Setup</a></li>
			<li><a href="parametersetup.php">Parameter Setup</a></li>
		</ul>			
	</li>
	
	<li><a>Help</a>	
		<ul>
			<li><a href="enquirycustomer.php">Enquiry from Customer</a></li>
		</ul>		
	</li>
	
	<li><a href="signout.php">Signout</a>			
	</li>
	
	<li><a href="dataupload.php">Data Upload</a>			
	</li>
	
</div>