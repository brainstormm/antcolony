<?php
session_set_cookie_params(3600);
session_start();
?>
<html>
<head>
<?php
	include 'header.php';
    //mail("segnateai@gmail.com","This is important test message","Sentry nebula global attachment ren sparrow","From: charmasian@gmail.com");
?>
</head>
<body>
<?php
	echo "Hello world";
	echo "</br><a href = './userhome.php' target = '_blank'>User Home</a>";
?>
<?php
	echo "</br>".$_SERVER['REMOTE_ADDR']." ".$_SERVER['HTTP_HOST']."</br>";
?>
<?php
$x = "<form action='login.php' method='post' autocomplete='off'>
	<p>Username:<input type='text' name='id'></p>
	<p>Password:<input type='password' name='pwd'></p>
	<p><input type='submit' name='login' value='Login'></p>
</form>";
if (isset($_COOKIE['segnatelogin']))
{
	if (isset($_SESSION[$_COOKIE['segnatelogin']])&&$_SESSION[$_COOKIE['segnatelogin']]==1)
	{
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
		session_unset();
		setcookie('segnatelogin',"",time()-3600);
		echo $x;
	}
}
else
{
	echo $x;
}
?>
<hr>
<?php
if(isset($_POST['text'])) {
  $name = $_POST['text'];
  $handle = fopen('names.txt', 'a');
  fwrite($handle, $name."\n");
  fclose($handle); 
}
?>
<form method="post">
  Name: <input type="text" name="text" /> 
  <input type="submit" name="submit" />
</form>
<hr>
<h3>The file Contents Are</h3>
<hr>
<?php
	$read = file('names.txt');
	foreach($read as $line)
	{
		echo $line."</br>";
	}
?>
<hr>
<h3>Edit file below</h3>
<hr>
<?php
	echo "<form method = 'post'>"."<textarea name='finfo' rows='10' cols='100'>";
	$read = file('names.txt');
	foreach($read as $line)
	{
		echo $line;
	}
	echo "</textarea></br><input type='submit' name='submitq' value='Edit'></form><hr>";
	if (isset($_POST['finfo']))
	{
		$handle = fopen('names.txt','w');
		fwrite($handle,$_POST['finfo']);
		fclose($handle);
		header("Refresh:0");
	}
?>
<?php
	echo "This is god of the universe";
?>
</body>
</html>
	