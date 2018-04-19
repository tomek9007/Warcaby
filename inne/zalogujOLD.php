<?php

	session_start();							//wlaczam sesje w dokumencie

	require_once "polaczenie.php";		//require_once wymaga podlaczenia "polaczenia.php" do pliku. once brak redundancji
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);			//konstruktor mysqli, tworze nowe polaczenie

	$login = $_POST['login'];		//wczytuje login ktory przychodzi z zewnetrznego pliku
	$haslo = $_POST['haslo'];		//wczytuje haslo ktory przychodzi z zewnetrznego pliku
	
	
	$stmt= $polaczenie->prepare("SELECT login, haslo FROM uzytkownicy WHERE username=? && password=?");
                        $stmt->bind_param('ss',$login, $haslo);
                        $stmt->execute();
                        $stmt->close();
	
	/*$login = htmlentities($login, ENT_QUOTES, "UTF-8");			//wstawia encje html, blokuje kombinatorow, 
	$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");			//ENT_QUOTES - zamienia na encje takze cudzyslowia i apostrofy

	$rezultat = $polaczenie->query(
	sprintf("SELECT * FROM uzytkownicy WHERE  login = '%s' AND haslo = '%s'",			//skladnia jak z C
	mysqli_real_escape_string($polaczenie,$login),												//broni przed operatorem dwoch myslnikow lub 
	mysqli_real_escape_string($polaczenie,$haslo)));											//operatorem apostrofow
	
	if ($rezultat->num_rows ==1 )	//za pomoca ustawionego polaczenia wykonaj query na $szukanyUzytkownik i zapisz w zmiennej $rezultat
	{
		$_SESSION['zalogowany']=true;			//zapamietuje zalogowanie, zeby nie przekierowywac do strony logowania

		
		$wiersz = $rezultat->fetch_assoc();	//wkladam caly wiersz pasujacy do logina i hasla do tablicy asocjacyjnej, zeby moc odnosic sie po nazwach kolumn
		$_SESSION['id']=$wiersz['id'];				//zapamietuje id

		$_SESSION['login']= $wiersz['login'];
		
		unset($_SESSION['blad']);						//usuwa zmienna blad $_SESSION['blad']
		$rezultat->close();									//zwalniam pamiec
		header('Location: indexZalogowany.php');
	}
	else
	{
		$_SESSION['blad'] = 'Podano nieprawidlowy login lub haslo';
		header('Location: index.php');
		
	}*/

	$polaczenie->close();			//zamykam polaczenie
	

?>