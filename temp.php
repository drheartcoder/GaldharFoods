			$(function getTable() 
			{
				var $table = $('table.product-list'),
					counter = 0;
					x = 0;
				
				$('button.add-product').click(function(event)
				{
					x++;
					var clkbtn = document.getElementById("btnadd").value = x;
					 
					//alert(clkbtn);
					if (clkbtn == 1)
					{
						var headRow = 
							'<tr bgcolor="grey" align="center" style="color:white;">' +
								'<td>Sr.No</td>' +
								'<td>Product Code</td>' +
								'<td>Product Description</td>' +
								'<td>Description</td>' +
								'<td>Description 1</td>' +
								'<td>Description 2</td>' +
								'<td>Description 3</td>' +
								'<td>UOM</td>' +
								'<td>Qty</td>' +
								'<td>Free Qty</td>' +
								'<td>Total Qty</td>' +
								'<td>MRP</td>' +
								'<td>Rate</td>' +
								'<td>Value</td>' +
								'<td>Disc 1</td>' +
								'<td>Disc 2</td>' +
								'<td>Disc 3</td>' +
								'<td>P and F</td>' +
								'<td>Excise</td>' +
								'<td>CESS</td>' +
								'<td>H CESS</td>' +
								'<td>Freight</td>' +
								'<td>Oth Exp</td>' +
								'<td>Tax Code</td>' +
								'<td>Tax</td>' +
								'<td>VAT</td>' +
								'<td>Total</td>' +
								'<td>Option</td>' +
							'</tr>';
						$table.append(headRow);
					}
					var addrow = document.getElementById("xaddrow").value;
					
					<?php
						if(isset($_GET['MRNNO']))
						{
							extract($_GET);
							include("dbconnect.php");
							$ictr=0;
							$e=mysql_query("select * from eqctrans where MRNNO=".$_GET['MRNNO']);
							while($db1=mysql_fetch_array($e))
							{
								extract($db1);
								$ictr++;
							}
							$rowno = $ictr;
							//echo $rowno;
						}
					?>
					for (var i = 0; i < addrow; i++)
					{
						event.preventDefault();
						counter++;
						var newRow = 
							 '<tr align="center">' + 
								'<td><input type="text" readonly id="xprodsrno" name="xprodsrno" value="' + counter + '" style="width:100px; cursor:default;" /></td>' +
								'<td><select id="xprodcode[' + counter + ']" name="xprodcode[' + counter + ']" onChange="javascript:getprodname(this);" style="width:120px;"><option value="--">--</option><?php 
									include("dbconnect.php");
									$mq = mysql_query("SELECT mtcd FROM matmst Order By mt_head") or die(mysql_error());
									while($mfa = mysql_fetch_array($mq))
									{echo "<option value=".$mfa["mtcd"].">".$mfa["mtcd"]."</option>";}
								 ?></select></td>' +
								'<td><select id="xproddesc[' + counter + ']" name="xproddesc[' + counter + ']" style="width:360px;"><option value="--">--</option><?php 
									include("dbconnect.php");
									$mq = mysql_query("SELECT mt_head FROM matmst Order By mt_head") or die(mysql_error());
									while($mfa = mysql_fetch_array($mq))
									{echo "<option value=".$mfa["mt_head"].">".$mfa["mt_head"]."</option>";}
								 ?></select></td>' +
								'<td><input type="text" id="xproddescrip[' + counter + ']" name="xproddescrip[' + counter + ']" value="<?php echo $DESCRIP; ?>" style="width:100px;" /></td>' +
								'<td><input type="text" id="xproddescrip1[' + counter + ']" name="xproddescrip1[' + counter + ']" value="<?php echo $DESCRIP1; ?>" style="width:100px;" /></td>' +
								'<td><input type="text" id="xproddescrip2[' + counter + ']" name="xproddescrip2[' + counter + ']" value="<?php echo $DESCRIP2; ?>" style="width:100px;" /></td>' +
								'<td><input type="text" id="xproddescrip3[' + counter + ']" name="xproddescrip3[' + counter + ']" value="<?php echo $DESCRIP3; ?>" style="width:100px;" /></td>' +
								'<td><select id="xproduom[' + counter + ']" name="xproduom[' + counter + ']" style="width:auto;"><option value="--">--</option><?php
									include("dbconnect.php");
									$mq = mysql_query("SELECT uom FROM uom Order By uom") or die(mysql_error());
									while($mfa = mysql_fetch_array($mq))
									{echo "<option value=".$mfa["uom"].">".$mfa["uom"]."</option>";}
								?></select></td>' +
								'<td><input type="text" id="xprodqty[' + counter + ']" name="xprodqty[' + counter + ']" value="<?php echo $PQTY; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /></td>' +
								'<td><input type="text" id="xprodfreeqty[' + counter + ']" name="xprodfreeqty[' + counter + ']" value="<?php echo $FQTY; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /></td>' +
								'<td><input type="text" readonly id="xprodtotalqty[' + counter + ']" name="xprodtotalqty[' + counter + ']" value="<?php echo $QTY; ?>" style="width:100px; cursor:default;" /></td>' +
								'<td><input type="text" id="xprodmrp[' + counter + ']" name="xprodmrp[' + counter + ']" value="<?php echo $MRP; ?>" style="width:100px;" /></td>' +
								'<td><input type="text" id="xprodrate[' + counter + ']" name="xprodrate[' + counter + ']" value="<?php echo $RATE; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /></td>' +
								'<td><input type="text" readonly id="xprodvalue[' + counter + ']" name="xprodvalue[' + counter + ']" value="<?php echo $VALUE; ?>"  style="width:100px; cursor:default;" /></td>' +
								'<td><input type="text" id="xproddisc1[' + counter + ']" name="xproddisc1[' + counter + ']" value="<?php echo $SCHAMT; ?>" style="width:100px;" /></td>' +
								'<td><input type="text" id="xproddisc2[' + counter + ']" name="xproddisc2[' + counter + ']" value="<?php echo $DP; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /><input type="text" readonly id="xproddiscamt[' + counter + ']" name="xproddiscamt[' + counter + ']" value="<?php echo $DISCAMT; ?>" style="width:100px; cursor:default;" /></td>' +
								'<td><input type="text" id="xproddisc3[' + counter + ']" name="xproddisc3[' + counter + ']" value="<?php echo $CDP; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /><input type="text" readonly id="xprodcdisc[' + counter + ']" name="xprodcdisc[' + counter + ']" value="<?php echo $CDISC; ?>" style="width:100px; cursor:default;" /></td>' +
								'<td><input type="text" id="xprodpandf[' + counter + ']" name="xprodpandf[' + counter + ']" value="<?php echo $PFPER; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /><input type="text" readonly id="xprodpfamt[' + counter + ']" name="xprodpfamt[' + counter + ']" value="<?php echo $PFAMT; ?>" style="width:100px; cursor:default;" /></td>' +
								'<td><input type="text" id="xprodexcise[' + counter + ']" name="xprodexcise[' + counter + ']" value="<?php echo $EXPER; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /><input type="text" readonly id="xprodexcamt[' + counter + ']" name="xprodexcamt[' + counter + ']" value="<?php echo $EXCAMT; ?>" style="width:100px; cursor:default;" /></td>' +
								'<td><input type="text" id="xprodcess[' + counter + ']" name="xprodcess[' + counter + ']" value="<?php echo $CESSPER; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /><input type="text" readonly id="xprodcessamt[' + counter + ']" name="xprodcessamt[' + counter + ']" value="<?php echo $CESSAMT; ?>" style="width:100px; cursor:default;" /></td>' +
								'<td><input type="text" id="xprodhcess[' + counter + ']" name="xprodhcess[' + counter + ']" value="<?php echo $HCESSPER; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /><input type="text" readonly id="xprodhcessamt[' + counter + ']" name="xprodhcessamt[' + counter + ']" value="<?php echo $HCESSAMT; ?>" style="width:100px; cursor:default;" /></td>' +
								'<td><input type="text" id="xprodfreight[' + counter + ']" name="xprodfreight[' + counter + ']" value="<?php echo $FRTCHG; ?>" style="width:100px;" /></td>' +
								'<td><input type="text" id="xprodothexp[' + counter + ']" name="xprodothexp[' + counter + ']" value="<?php echo $OTHEXP; ?>" style="width:100px;" /></td>' +
								'<td><select id="xprodtaxcode[' + counter + ']" name="xprodtaxcode[' + counter + ']" onChange="javascript:getstval(this);" onBlur="javascript:getSum(this);" style="width:auto;"><option value="--">--</option><?php
									include("dbconnect.php");
									$mq = mysql_query("SELECT gp FROM acsst Order By gp") or die(mysql_error());
									while($mfa = mysql_fetch_array($mq))
									{echo "<option value=".$mfa["gp"].">".$mfa["gp"]."</option>";}
								?></select></td>' +
								'<td><input type="text" readonly id="xprodtax[' + counter + ']" name="xprodtax[' + counter + ']" value="<?php echo $STP; ?>" onBlur="javascript:getSum(this);" style="width:100px; cursor:default;" /></td>' +
								'<td><input type="text" id="xprodvat[' + counter + ']" name="xprodvat[' + counter + ']" value="<?php echo $SLSTAX; ?>" onBlur="javascript:getSum(this);" style="width:100px;" /></td>' +
								'<td><input type="text" id="xprodtotal[' + counter + ']" name="xprodtotal[' + counter + ']" value="<?php echo $AMOUNT; ?>" style="width:100px;" /></td>' +
								'<td><button onClick="javascript: return confirm(Are you SURE you wish to Delete?);">Delete</button></td>'
							'</tr>';
						$table.append(newRow);
						//$table.deleteRow(i);
					}
				});
			});
