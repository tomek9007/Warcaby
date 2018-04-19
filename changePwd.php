<?php
session_start();
echo '<script>console.log("drugi if")</script>';


if ((isset($_POST['oldPass']) && isset($_POST['newPass']))) 


 {

    require_once "polaczenie.php"; // pobranie danych

    if (mysqli_connect_errno()) {
        echo "Error: " . $polaczenie->connect_errno;
 
    } else {
 
		$prawidlowe = false;
        $login = $_SESSION['login'];
        $hasloStare = $_POST['oldPass'];
        $hasloNowe = $_POST['newPass'];
 
 
        $query = "SELECT login, haslo FROM uzytkownicy WHERE login=?";
 
        if ($stmt = $polaczenie->prepare($query)) {
            echo '<script>console.log("pierwszy if")</script>';
            $stmt->bind_param('s', $login);
            $stmt->execute();
            $stmt->bind_result($name_db, $password_db);
            $stmt->fetch();
            $stmt->store_result();
			$stmt->close();
			
            if (password_verify($hasloStare, $password_db)) 
			{

			$haslo_hashowane = password_hash($hasloNowe, PASSWORD_DEFAULT);	
			$passUpdate = "UPDATE uzytkownicy SET haslo ='".$haslo_hashowane."' WHERE login ='".$login."'" ;
				if($stmt =  $polaczenie->prepare($passUpdate))
				{
					$stmt->execute();
					$_SESSION['error'] = 'Zmieniono haslo uzytkownika';			
                    $stmt->close();
                    header('Location: indexZalogowany.php');
                }
					else
					{
						$_SESSION['error'] = 'Bad query';		
					}
             }else {		
					$_SESSION['error']="Podano nieprawidlowe haslo";
					header('Location: indexZalogowany.php');
			}

		}

    $polaczenie->close();
 }
}
?>