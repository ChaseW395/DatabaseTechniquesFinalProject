<?php

	$serv_name = "localhost";
	$usrname = "root";
	$password = "";

	$db_name = "hackingstore";

	$connect = mysqli_connect($serv_name, $usrname, $password, $db_name) or die('Could not connect to MySQL: ' . mysqli_connect_error());

	mysqli_set_charset($connect, 'utf8');
