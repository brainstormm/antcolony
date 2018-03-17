<?php
	echo session_save_path();
	//ini_set('session.cookie_lifetime', 86400);
	session_set_cookie_params(3600);
	session_start();
	$_SESSION['login'] = 0;
    $connec = oci_connect('segnate','natureadmin','localhost');
	if (!$connec) 
	{
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	else
	{
		$handle = oci_parse($connec,'Select key from users where id = '."'".$_POST['id']."'");
		oci_execute($handle);
		$ans = oci_fetch_array($handle);
		if ($_POST['pwd']===$ans[0])
		{
			echo 'You are logged in</br>';
			$_SESSION['login'] = 1;
			$_SESSION[$_POST['id']] = 1;
			setcookie('segnatelogin',$_POST['id'],time()+3600,'/',$_SERVER['HTTP_HOST']);
			header("Refresh:5;url=./userhome.php");
		}
		else
		{
			echo 'Login Failed</br>';
			$addr = $_SERVER['HTTP_HOST'];
			header("Refresh:10;url=/");
			exit();
		}
	}
  	echo "The recieved credentials are</br>USERNAME: ".$_POST['id']."</br>PASSWORD: ".$_POST['pwd'];
?>