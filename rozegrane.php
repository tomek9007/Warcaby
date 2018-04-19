<?php
    require_once "polaczenie.php"; // pobranie danych

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // po³¹czenie z baz¹ danych
	$loginGracza = $_SESSION['login'];
for($i=0;$i<8;$i++)
{
$kwerenda='SELECT GraczBialy, data, wynikCzarnych FROM `mecze` WHERE graczCzarny ="'.$loginGracza.'" UNION 
SELECT GraczCzarny, data, wynikBialych FROM `mecze` WHERE graczBialy ="'.$loginGracza.'" ORDER BY data DESC LIMIT '.$i.',1';

	if($stmt = $polaczenie->prepare($kwerenda))
	{

		$stmt->execute();			
		/* bind variables to prepared statement */
		$stmt->bind_result($col1,$col2,$col3);
		/* fetch values */
		 $stmt->fetch();
		 //$stmt->store_result();
			printf("%s\n", "<tr><td>".$col1."</td><td>".$col2."</td><td>".$col3."</td></tr>");
		/* close statement */
			$stmt->close();	
	}
	
}


?>
