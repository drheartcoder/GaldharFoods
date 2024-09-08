<? /*Function for Autoincrement ID*/

function select_max_id($fldId,$tblNm,$idLength)
{
	include("../include/connection.php");
	$e=mysql_query("select max(". $fldId.")  as itmcd from ". $tblNm ."");
	while($db1=mysql_fetch_array($e))
	{
		extract($db1);
		$max_id = str_pad($itmcd +1,$idLength,"0",STR_PAD_LEFT);
	}
    return $max_id;
}
?>