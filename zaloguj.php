<?php
session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
    header('Location: indexZalogowany.php');
    exit();
}

 
if ((isset($_POST['login']) || isset($_POST['haslo']))) {
 
    require_once "polaczenie.php"; // pobranie danych
 
    //$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // po³¹czenie z baz¹ 

    /* check connection */
    if (mysqli_connect_errno()) {
        echo "Error: " . $polaczenie->connect_errno;
    } else {
 
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
 
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");  // uzdatnienie loginu
 
        $query = "SELECT login, haslo FROM uzytkownicy WHERE login=?";
 
        if ($stmt = $polaczenie->prepare($query)) {

            $stmt->bind_param('s', $login);
            $stmt->execute();
            $stmt->bind_result($name_db, $password_db);
            $stmt->fetch();
            $stmt->store_result();

            if (!empty($name_db)) {

				//echo '<script>console.log("'..'")</script>';
			
                //if (password_verify($password_db, password_hash($haslo, PASSWORD_DEFAULT))) {
                if (password_verify($haslo, $password_db)) {
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['login'] = $login;

                    unset($_SESSION['error']);
                    $stmt->close();
                    header('Location: indexZalogowany.php');
                } else {
					$_SESSION['error']="Bledny login lub haslo";
					header('Location: index.php');
                }
            } else {
				$_SESSION['error']="Bledny login lub haslo";
				header('Location: index.php');
            }
        }
    }
    $stmt->close();
    $polaczenie->close();
}
?>