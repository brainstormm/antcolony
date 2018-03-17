<?php
	session_set_cookie_params(3600);
	session_start();
	$_SESSION['login'] = 0;
    //$connec = oci_connect('segnate','natureadmin','localhost');
	/*if (!$connec) 
	{
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}*/
	//else
	{
		//$handle = oci_parse($connec,'Select key from users where id = '."'".$_REQUEST['id']."'");
		//oci_execute($handle);
		//$ans = oci_fetch_array($handle);
		if ($_REQUEST['pwd']==="adminpass" && $_REQUEST['id']==="admin")
		{
			$_SESSION['login'] = 1;
			$_SESSION[$_REQUEST['id']] = 1;
			setcookie('segnatelogin',$_REQUEST['id'],time()+3600,'/',$_SERVER['HTTP_HOST']);
			setcookie('secretcookie',"!@#$%123",time()+3600,'/',$_SERVER['HTTP_HOST']);
			header("Refresh:5;url=./index.php");
			echo 'Yes';
		}
		else
		{
			echo 'Login Failed</br>';
			$addr = $_SERVER['HTTP_HOST'];
			header("Refresh:10;url=/");
			exit();
		}
	}
?>