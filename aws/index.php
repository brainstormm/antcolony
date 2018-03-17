<?php
	$connec = oci_connect("antcolony","whatidodefinesme","myDb");
	if (!$connec) 
	{
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	else
	{
		echo "Connected";
	}
?>