<?php
    require_once "polaczenie.php"; // pobranie danych

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // po³¹czenie z baz¹ danych
	$loginGracza = $_SESSION['login'];
for($i=0;$i<10;$i++)
{
$kwerenda='SELECT  data FROM `mecze` WHERE graczCzarny ="'.$loginGracza.'" UNION 
SELECT  data FROM `mecze` WHERE graczBialy ="'.$loginGracza.'" ORDER BY data DESC LIMIT '.$i.',1';

	if($stmt = $polaczenie->prepare($kwerenda))
	{

		$stmt->execute();			
		/* bind variables to prepared statement */
		$stmt->bind_result($col2);
		/* fetch values */
		 $stmt->fetch();
		 //$stmt->store_result();
			printf("%s\n", "<ul>".$col2."</ul>");
		/* close statement */
			$stmt->close();	
	}
}


?>