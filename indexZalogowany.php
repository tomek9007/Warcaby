<?php
	session_start();		
	if(!isset($_SESSION['zalogowany'])||($_SESSION['zalogowany']==false))		//jesli niezalogowany probuje sie dostac przez wstukanie w przegladarce
	{
		header('Location: index.php');			
		exit();
	}
	require_once "language.php";
	$delete=false;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" id="bl" type="text/css" title="blue">
<link rel="alternate stylesheet"  href="styleOrange.php" id="or" type="text/css" title="orange"/>
<script src="javascript.js">

</script>
<title>Warcaby</title>
</head>
<body>
<div id="jezyk">
	<a href="indexZalogowany.php?lang=en"><img src="images/en.png" alt="POL"/></a>
	<a href="indexZalogowany.php?lang=pl"><img src="images/pl.png" alt="ANG"/></a>
	<a href="indexZalogowany.php?lang=us"><img src="images/us.png" alt="USA"/></a>
</div>
	<a href="wyloguj.php">
		<div id="logOut">
				<?php echo $lang['LOGOUT']; ?>
		</div>
	</a>

	<div id="login">
<?php
	echo "Witaj ".$_SESSION['login']."!";
?>
	</div>

	<div id="obrazek">
		<h1>Warcaby</h1>
	</div>
	<div id="blok">
		<div id="menuNawigacji">
				
				<h3>MENU</h3>
					<ul>
						<li><a onclick='changePage2("start")'><?php echo $lang['MAIN_SIDE']; ?></a></li>
						<li><a onclick="stworzSzachownice()"><?php echo $lang['NEW_GAME']; ?></a></li>
						<li><a onclick='changePage2("aktualneMecze")'><?php echo $lang['JOIN_GAME']; ?></a></li>
						<li><a onclick='changePage2("rozegraneMecze")'><?php echo $lang['MATCHES_PLAYED']; ?></a></li>
						<li><a onclick='changePage2("ustawieniaGry")'><?php echo $lang['SETTINGS']; ?></a></li>				
					</ul>			
			</div>
			<div id = "zawartosc">
					<?php 
					if(isset($_SESSION['error'])){ 
									echo $_SESSION['error'];
									unset($_SESSION['error']);}
					else{
									echo "<h2>Warcaby</h2>
					<p>Warcaby są klasyczną grą planszową dla dwóch graczy. 
					Pole do gry jest identyczne jak w szachach jednak zasady są inne. 
					Gra ma wiele odmian (z czego najbardziej znaną są warcaby polskie),
					które różnią sie zasadami, a nawet liczbą pionków. Nie są one jednak skomplikowane, 
					dzięki czemu gracz szybko uczy się zasad i może czerpać przyjemność z gry. </p>";}
					?>	
			</div>
			<div id="najlepsiGracze">
				<h3>TOP 10</h3>			
				<ol>
					<?php require_once "top10.php";
					?>
				</ol>
			</div>
		</div>

		
		<div id="podstrony">
		<div id="rejestracja">
						<h1>REJESTRACJA</h1>
				<form action="register.php" method="post">
					<table id="formularzRejestracji">
						<tr>
							<td>Imie:</td>
							<td><input type="text" name="imie"/></td>
						</tr>
						<tr>
							<td>Nazwisko:</td>
							<td><input type="text" name="nazwisko"/></td>
						</tr>						
						<tr>
							<td>Email:</td>
							<td><input type="text" name="mail"/></td>
						</tr>						
						<tr>
							<td>Login:</td>
							<td><input type="text" name="login"/></td>
						</tr>						
						<tr>
							<td>Haslo:</td>
							<td><input type="password" name="haslo"/></td>
						</tr>
						<tr>
							<td>Powtorz haslo:</td>
							<td><input type="password" name="hasloSpr"/></td>
						</tr>

					</table>					
					<br />
					<input type="submit" value="Wyslij dane"/>

				</form>
		</div>
		
		<div id="zaloguj">
			<h1>ZALOGUJ</h1>
				<form action="zaloguj.php" method="post">
					<table id="formularz">					
						<tr>
							<td>Login:</td>
							<td><input type="text" name="login"/></td>
						</tr>											
						<tr>
							<td>Haslo:</td>
							<td><input type="password" name="haslo"/></td>
						</tr>
					</table>					
					<br />
					<input type="submit" value="Wyslij dane"/>
				</form>
		</div>
		
		<div id="start">
								<h2>Warcaby</h2>
					<p>Warcaby są klasyczną grą planszową dla dwóch graczy. 
					Pole do gry jest identyczne jak w szachach jednak zasady są inne. 
					Gra ma wiele odmian (z czego najbardziej znaną są warcaby polskie),
					które różnią sie zasadami, a nawet liczbą pionków. Nie są one jednak skomplikowane, 
					dzięki czemu gracz szybko uczy się zasad i może czerpać przyjemność z gry</p>
		</div>
		
		
		
		
		<div id="rozegraneMecze">
			<table id="mecze">
								<tr><th><?php echo $lang['ENEMY']; ?></th><th><?php echo $lang['DATE']; ?></th><th><?php echo $lang['RESULT']; ?></th></tr>
								<?php require_once "rozegrane.php";?>
			</table>
		</div>
		
		
		
		<div id="aktualneMecze">
				<table id="amecze">
						<tr>
							<td>Gracz 1</td>
							<td>Gracz 2</td>
							<td></td>
						</tr>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>Obserwuj</td>
						</tr>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>Obserwuj</td>
						</tr>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>Obserwuj</td>
						</tr>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>Obserwuj</td>
						</tr>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>Obserwuj</td>
						</tr>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>Obserwuj</td>
						</tr>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>Obserwuj</td>
						</tr>						
						<tr>
							<td>-</td>
							<td>-</td>
							<td>Obserwuj</td>
						</tr>						
					</table>					
					<br />
				</div>

				
				<div id="ustawieniaGry">
					<table>
												<tr>
													<td id="iloscWygranych"><?php echo $lang['WINS']; ?></td>
													<td>
													<?php
																	require_once "polaczenie.php"; // pobranie danych
																	//$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // połączenie z bazą danych
																$kwerenda='select count(*) from (SELECT GraczBialy FROM `mecze` WHERE graczCzarny ="'.$_SESSION['login'].'" 
																and wynikCzarnych = "win" UNION all SELECT GraczCzarny FROM `mecze` 
																WHERE graczBialy ="'.$_SESSION['login'].'" and wynikBialych="win") as tem';
																	if($stmt = $polaczenie->prepare($kwerenda))
																	{
																		$stmt->execute();			
																		$stmt->bind_result($col1);
																		 $stmt->fetch();
																			printf("%s\n",$col1);
																			$stmt->close();	
																	}
													?>
													</td>
												</tr>
												<tr>
													<td><?php echo $lang['LOSES']; ?></td>
													<td>
													<?php
																	require_once "polaczenie.php"; // pobranie danych
																	//$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // połączenie z bazą danych
																$kwerenda='select count(*) from (SELECT GraczBialy FROM `mecze` WHERE graczCzarny ="'.$_SESSION['login'].'" 
																and wynikCzarnych = "lose" UNION all SELECT GraczCzarny FROM `mecze` 
																WHERE graczBialy ="'.$_SESSION['login'].'" and wynikBialych="lose") as tem';
																	if($stmt = $polaczenie->prepare($kwerenda))
																	{
																		$stmt->execute();			
																		$stmt->bind_result($col1);
																		 $stmt->fetch();
																			printf("%s\n",$col1);
																			$stmt->close();	
																	}
													?>
													</td>
												</tr>
					</table>
							<br />
								<form action="changePwd.php" method="post">
									<table>
												<tr><td><?php echo $lang['CHANGEPASS']; ?></td><td></td></tr>
												<tr><td><?php echo $lang['NEWPASS']; ?></td><td>  <input type="password" name="oldPass"></td></tr>
												<tr><td><?php echo $lang['REPEAT']; ?></td><td>  <input type="password" name="newPass"></td></tr>
												<tr><td><input type="submit" value="<?php echo $lang['CHANGEPASSBTN']; ?>"/></td><td></td></tr>
									</table>	
								</form>
							<br />
					<table>
												<tr><td><?php echo $lang['COLOR']; ?></td>
												<td>
													<select id="changeColor">
														<option selected value="bl"><?php echo $lang['BLUE']; ?></option> 
														<option value="or"><?php echo $lang['ORANGE']; ?></option>
													</select>
												</td>
												</tr>
												<tr><td><?php echo $lang['NUMBER']; ?></td>
												<td>
												<select id="changeNumber">
														<option selected value="12">12</option> 
														<option value="8">8</option>
														<option value="4">4</option>
												</select>
												</td>
												</tr>
												<tr><td>
												<button type="button" onclick='setActiveStyleSheet()'><?php echo $lang['SAVE']; ?></button>
												</td><td></td></tr>
												<tr><td>
												<a href="indexZalogowany.php?delete=true">
												<?php require_once "delete.php";
												echo $lang['DELETE']; ?>
												</a>
												</td><td></td>
												</tr>
					</table>					
							<br />
					</div>
	</div>
<footer>
  <p>Strona stworzona na przedmiot Programowanie w Internecie</p>
</footer>
	</body>
</html>

