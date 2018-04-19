<?php
session_start();


if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
    header('Location: indexZalogowany.php');
    exit();
}

if ((isset($_POST['imie']) && isset($_POST['nazwisko'])&& isset($_POST['mail'])&& isset($_POST['login'])&& isset($_POST['haslo'])&& isset($_POST['hasloSpr']))) 
{

 {

    require_once "polaczenie.php"; // pobranie danych

    if (mysqli_connect_errno()) {
        echo "Error: " . $polaczenie->connect_errno;
 
    } else {

		$dobryLogin = false;
		$dobryMail = false;
		
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];        
        $hasloSpr = $_POST['hasloSpr'];        
		$imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $mail = $_POST['mail'];
		$zwyciestwa = 0;
 
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");  // uzdatnienie loginu
 
		$szukanieLoginu='SELECT login FROM `uzytkownicy` WHERE login=?';
		$szukanieMaila="SELECT mail FROM `uzytkownicy` WHERE mail=?";
 
		if($stmt = $polaczenie->prepare($szukanieLoginu))
		{
				$stmt->bind_param('s', $login);
				$stmt->execute();	
				$stmt->bind_result($col1);
				$stmt->fetch();
				$stmt->store_result();	

				if (empty($col1)) 
				{
						$dobryLogin = true;
				}
				$stmt->close();
		}
		
		if($stmt = $polaczenie->prepare($szukanieMaila))
		{
				$stmt->bind_param('s', $login);			
				$stmt->execute();	
				$stmt->bind_result($col2);
				$stmt->fetch();
				$stmt->store_result();
				if (empty($col2)) 
				{
						$dobryMail = true;
				}
				$stmt->close();
		}
 
        $query = 'INSERT INTO uzytkownicy (haslo, login, imie, nazwisko, mail, zwyciestwa)
VALUES (?,?,?,?,?,?)';

			//if (empty($name_db)) 
			if($haslo==$hasloSpr)
			{
				$haslo_hashowane = password_hash($haslo, PASSWORD_DEFAULT);
				if ($dobryMail&&$dobryLogin) 
				{
					if($stmt = $polaczenie->prepare($query))
						{
							echo '<script>console.log("i tu")</script>';
							$stmt->bind_param('sssssi',$haslo_hashowane, $login, $imie, $nazwisko, $mail, $zwyciestwa);
							$stmt->execute();
							$_SESSION['error'] = 'Uzytkownik zostal prawidlowo zarejestrowany';
							$stmt->close();
							$polaczenie->close();							
						}
				} else {
					$_SESSION['error'] = 'Niepowodzenie: w bazie jest już użytkownik z takim loginem lub mailem';
				}
			}
			else
			{
					$_SESSION['error'] = 'Niepowodzenie: Sprawdz hasło';
			}

					header('Location: index.php');
    }

    $polaczenie->close();
 }
}
?>