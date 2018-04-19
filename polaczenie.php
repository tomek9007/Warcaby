<?php
	$host = "localhost";		//Adres serwera MySQL
	$db_user = "root";		//login do MySQL
	$db_password="";		//Haslo do MySQL
	$db_name="warcaby";	//Nazwa bazy danych
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); 
?>