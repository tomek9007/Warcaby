<?php

	session_start();							//wlaczam sesje w dokumencie
	
	/*if(!isset(($_POST['login']))||(!isset($_POST['haslo'])))
	{
		header('Location: index.php');								//na wypadek wejscia przez wpisanie adresu 
		exit();
	}*/
	
	require_once "polaczenie.php";		//require_once wymaga podlaczenia "polaczenia.php" do pliku. once brak redundancji
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);			//konstruktor mysqli, tworze nowe polaczenie
	//@new oznacza ze nie wyswietli bledow. uzywac gdy sam robie kontrole bledow
	
	/*if ($polaczenie->connect_errno!=0)		//connect_errno == 0 oznacza ze ostatnia proba polaczenia z baza zakonczyla sie sukcesem
	{
		echo "Error: ".$polaczenie->connect_errno . "Opis: ". $polaczenie->connect_error;
	}
	else
	{
			$login = $_POST['login'];		//wczytuje login ktory przychodzi z zewnetrznego pliku
			$haslo = $_POST['haslo'];		//wczytuje haslo ktory przychodzi z zewnetrznego pliku
	
	}*/
	
	
	$login = $_POST['login'];		//wczytuje login ktory przychodzi z zewnetrznego pliku
	$haslo = $_POST['haslo'];		//wczytuje haslo ktory przychodzi z zewnetrznego pliku
	
	
	$login = htmlentities($login, ENT_QUOTES, "UTF-8");			//wstawia encje html, blokuje kombinatorow, 
	$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");			//ENT_QUOTES - zamienia na encje takze cudzyslowia i apostrofy
	
	//$szukanyUzytkownik = "SELECT * FROM uzytkownicy WHERE  login = '$login' AND haslo = '$haslo'";		//sprawdzam w bazie uzytkownika
	
	//$rezultat = $polaczenie->query($szukanyUzytkownik);		//	stara wersja
	
	$query = "SELECT login, haslo FROM uzytkownicy WHERE login=?&&haslo=?";
	
	//$stmt = $polaczenie->prepare($query);

        if ($stmt = $polaczenie->prepare($query)) {

            $stmt->bind_param('ss', $login, $haslo);
            /* execute statement */
            $stmt->execute();

            $stmt->bind_result($name_db, $password_db);
            /* fetch values */
            $stmt->fetch();
            
            $stmt->store_result();
            $numberofrows = $stmt->num_rows; // >>>>?????????
            echo '<script>console.log("' . $numberofrows . '")</script>';
            echo '<script>console.log("' . $name_db . '")</script>';
            echo '<script>console.log("' . $password_db . '")</script>';
			
			

		$_SESSION['zalogowany']=true;			//zapamietuje zalogowanie, zeby nie przekierowywac do strony logowania

		
		//$wiersz = $rezultat->fetch_assoc();	//wkladam caly wiersz pasujacy do logina i hasla do tablicy asocjacyjnej, zeby moc odnosic sie po nazwach kolumn
		$_SESSION['id']=$wiersz['id'];				//zapamietuje id

		$_SESSION['login']= $wiersz['login'];
		
		unset($_SESSION['blad']);						//usuwa zmienna blad $_SESSION['blad']
		//$rezultat->close();									//zwalniam pamiec
		header('Location: indexZalogowany.php');
	}
	else
	{
		$_SESSION['blad'] = 'Podano nieprawidlowy login lub haslo';
		header('Location: index.php');
		
	}

	$polaczenie->close();			//zamykam polaczenie
	$stmt->close();
?>
