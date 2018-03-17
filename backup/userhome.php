<?php
	//ini_set('session.cookie_lifetime', 86400);
	session_start();
	if (isset($_COOKIE['segnatelogin']))
	{
		if (isset($_SESSION[$_COOKIE['segnatelogin']])&&$_SESSION[$_COOKIE['segnatelogin']]==1)
		{
			echo "<h1 align = 'center' style='color:red'>User Home</h1></br>";
			echo "<form method='post'><input type='submit' name ='logout' value = 'Logout' ></form>";
			if (isset($_POST['logout']))
			{
				session_unset();
				setcookie('segnatelogin',"",time()-100);
				header("Refresh:0;url='./index.php'");
			}
		}
		else
		{
			echo 'Invalid Session';
			header("Redirect:0;url='./'");
		}
	}
	else
	{
		echo 'You are not logged in';
		header("Redirect:0;url='./'");
	}
?>