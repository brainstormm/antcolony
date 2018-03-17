<?php
    session_set_cookie_params(3600);
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<script>
var delete_cookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};
function attacher()
{
	var m1 = document.getElementById("id");
	var m2 = document.getElementById("pwd");
	m1.addEventListener('keypress', function (e) {
    var key = e.which || e.keyCode;
    if (key === 13) {
		loginme();
	}
	});
	m2.addEventListener('keypress', function (e) {
    var key = e.which || e.keyCode;
    if (key === 13) {
		loginme();
	}
	});
}
</script>
</head>
<body>
<?php
	echo "Hello World";
	echo "<br>".$_SERVER['REMOTE_ADDR']." ".$_SERVER['HTTP_HOST']."<br>";
?>
<?php
	$x = "<div id='field'><form>username<input type='text' name='id' id='id'><br>password<input type='password' name='pwd' id='pwd'><br></form><button onclick='loginme()'>Login</button></div>";
	//if (isset($_COOKIE['segnatelogin']))
	if (isset($_COOKIE['secretcookie']))
	{
		//if (isset($_SESSION[$_COOKIE['segnatelogin']])&&$_SESSION[$_COOKIE['segnatelogin']]==1&&$_COOKIE['secretcookie']==="!@#$%123")
		if ($_COOKIE['secretcookie']==="!@#$%123")
		{
			//echo "<form method='post' id='precheck' onsubmit='remspecial()'><input type='submit' name ='logout' value = 'Logout'></form>";
			echo "<button id = 'precheck' name ='prec' onclick='remspecial()'>Logout</button>";
			/*if (isset($_POST['logout']))
			{
				session_unset();
				setcookie('segnatelogin',"",time()-100);
				//header("Refresh:0;url='./index.php'");
				echo $x;
			}*/
		}
		else
		{
			session_unset();
			setcookie('segnatelogin',"",time()-100);
			echo $x;
		}
	}
	else
	{
		echo $x;
	}
?>
<script>
function remspecial()
{
	m = document.getElementById('precheck');
	m.parentNode.removeChild(m);
	//document.cookie = "segnatelogin=; expires="+(Date().getMillisceonds-3600);
	//document.cookie = "secretcookie=; expires="+(Date().getMillisceonds-3600);
	delete_cookie('secretcookie');
	var l = document.createElement("div");
	l.id = "field";
	l.innerHTML = "<form>username<input type='text' name='id' id='id'><br>password<input type='password' name='pwd' id='pwd'><br></form><button onclick='loginme()'>Login</button>";
	document.body.insertBefore(l,null);
	attacher();
}
</script>
<script>
if (document.getElementById("field"))
{
	attacher();
}
</script>
<script id='prev'>
function loginme()
{
	var xhttp;
	//var logout = "<button onclick='logoutme()'>Logout</button>";
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if (xhttp.readyState == 4 && xhttp.status == 200)
		{
			var resp = xhttp.responseText;
			if (resp=="Yes")
			{
				//document.getElementById("field").innerHTML = logout;
				if (document.getElementById("special"))
				{
					var m = document.getElementById("special");
					m.parentNode.removeChild(m);
				}
				//window.location = "./"
			}
	        else
			{	
		        if (!document.getElementById("special"))
				{
					var elem = document.createElement("p");
					elem.id = "special";
					var node = document.createTextNode("Invalid Login");
					elem.appendChild(node);
					var prev = document.getElementById('prev');
					prev.parentNode.insertBefore(elem,prev);
				}
			}
		}
	};
	var did = document.getElementById("field").childNodes[0].childNodes[1].value;
	var dpwd = document.getElementById("field").childNodes[0].childNodes[4].value;
	xhttp.open("POST","./loginajax.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("id="+did+"&"+"pwd="+dpwd);
}
function logoutme()
{
	document.cookie = "segnatelogin=; expires="+(Date().getMillisceonds-3600);
	//location.reload();
	document.getElementById("field").innerHTML = "<form>username<input type='text' name='id' id='id'><br>password<input type='password' name='pwd' id='pwd'><br></form><button onclick='loginme()'>Login</button>";
	attacher();
}
</script>
</body>
</html>