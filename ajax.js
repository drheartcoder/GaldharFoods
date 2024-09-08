var x=false;
if(window.XMLHttpRequest)
{	
	//code for IE7+,FireFox,Chrome,Opera,Safari
	x=new XMLHttpRequest();
}
else if(window.ActiveXObject)
{ 
	//code for IE6,IE5
	x=new ActiveXObject("Microsoft.XMLHTTP");
}

function xmlHttpRequest()
{
	if (window.XMLHttpRequest)
	{
		return new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
		alert("XMLHTTP not supported.");
		return null;
	}
}

function searchelement(searchFld)
{
	if(x)
	{	
		var xt1 = document.getElementById("t1").value;
		//var fn = "dealerdetails.php?ac_head="+xt1;
		x.open("GET",fn);
		x.onreadystatechange=function()
		{
			if(x.readyState==4 && x.status==200)
			{
				document.getElementById("mydiv").innerHTML=x.responseText;
			}
		}
		x.send();
	}
}
