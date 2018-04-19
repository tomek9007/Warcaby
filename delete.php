<?php

    require_once "polaczenie.php"; // pobranie danych

	if (isset($_GET['delete']))
	{
		if (mysqli_connect_errno()) 
		{
			echo "Error: " . $polaczenie->connect_errno;
	 
		} else {

			$szukanieLoginu='DELETE FROM `uzytkownicy` WHERE login="'.$_SESSION['login'].'"';
			if($stmt = $polaczenie->prepare($szukanieLoginu))
			{
					$stmt->execute();	
					$stmt->close();
					$delete=false;
					require_once "wyloguj.php";
			}					
		}
	}
?>