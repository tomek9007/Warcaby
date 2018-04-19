<?php
    require_once "polaczenie.php"; // pobranie danych

    //$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // po³¹czenie z baz¹ danych

for($i=0;$i<10;$i++)
{

$kwerenda='select login from (SELECT login, GraczBialy FROM `mecze` join uzytkownicy on uzytkownicy.login = mecze.GraczCzarny WHERE wynikCzarnych = "win" UNION all SELECT login,GraczCzarny FROM `mecze` join uzytkownicy on uzytkownicy.login = mecze.GraczBialy WHERE wynikBialych="win") as tem GROUP by login order by count(*) DESC LIMIT '.$i.',1';
	if($stmt = $polaczenie->prepare($kwerenda))
	{
		$stmt->execute();			
		$stmt->bind_result($col1);
		$stmt->fetch();
		printf("%s\n", "<li>".$col1."</li>");
		$stmt->close();	
	}
}

/*
$kwerenda='select login, count(*) from (SELECT login, GraczBialy FROM `mecze` join uzytkownicy on uzytkownicy.login = mecze.GraczCzarny WHERE wynikCzarnych = "win" UNION all SELECT login,GraczCzarny FROM `mecze` join uzytkownicy on uzytkownicy.login = mecze.GraczBialy WHERE wynikBialych="win") as tem GROUP by login order by count(*) DESC LIMIT '.$i.',1';
	if($stmt = $polaczenie->prepare($kwerenda))
	{
		$stmt->execute();			
		$stmt->bind_result($col1, $col2);
		$stmt->fetch();
		printf("%s\n", "<li>".$col1."\t".$col2."</li>");
		$stmt->close();	
	}
}
*/

?>
