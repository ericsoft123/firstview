<?php
$dat_host="localhost";
$username="petro_photo";
$pass="1234bigi";
$datab_name="petro_photo";
$con=mysqli_connect($dat_host,$username,$pass,$datab_name);
if(!$con)
{
	// this condition means that database is not available
echo"db not available";
}

?>