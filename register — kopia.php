<?php
session_start();

// je¿eli u¿ytkownik jest ju¿ zalogowany to trzeba go przenieœæ do index
if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
    header('Location: indexZalogowany.php');
    exit();
}
// je¿eli zostanie zrobiony post, czyli ktoœ kliknie



if ((isset($_POST['imie']) && isset($_POST['nazwisko'])&& isset($_POST['mail'])&& isset($_POST['login'])&& isset($_POST['haslo'])&& isset($_POST['hasloSpr']))) 
{

 {

    require_once "polaczenie.php"; // pobranie danych
 
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // po³¹czenie z baz¹ dancy h

    /* check connection */
    if (mysqli_connect_errno()) {
        echo "Error: " . $polaczenie->connect_errno;
 
    } else {


        $login = $_POST['login'];
        $haslo = $_POST['haslo'];        
		$imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $mail = $_POST['mail'];
		$zwyciestwa = 0;
 
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");  // uzdatnienie loginu
 
		$szukanieLoginu='SELECT login FROM `uzytkownicy` WHERE login='.$login.'';
		$szukanieMaila="SELECT mail FROM `uzytkownicy` WHERE mail=".$mail."";
 
		if($stmt = $polaczenie->prepare($szukanieLoginu))
		{
				$stmt->execute();	
				$stmt->bind_result($col1);
				$stmt->fetch();
				printf("%s\n", "<li>".$col1."</li>");
				$stmt->close();	
		}
 
        $query = 'INSERT INTO uzytkownicy (haslo, login, imie, nazwisko, mail, zwyciestwa)
VALUES (?,?,?,?,?,?)';

			if (empty($name_db)) 
			{
																	echo '<script>console.log("tu pierwszy if")</script>';
				if($stmt = $polaczenie->prepare($query))
					{
																	echo '<script>console.log("i tu")</script>';
						$stmt->bind_param('sssssi',$haslo, $login, $imie, $nazwisko, $mail, $zwyciestwa);
						$stmt->execute();			
					}
            } else {
                $_SESSION['error'] = '<span style="color:red ; text-align: center;">Juz jest taki login</span>';
				echo '<script>console.log("jestem w else")</script>';
            }
    }
    $stmt->close();
    $polaczenie->close();
 }
}
?>