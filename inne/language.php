<?php
	if(isSet($_GET['lang']))
	{
		$lang = $_GET['lang'];
		$_SESSION['lang'] = $lang;
		setcookie('lang', $lang, time() + (3600 * 24 * 30));
	}
	else if(isSet($_SESSION['lang']))
	{
		$lang = $_SESSION['lang'];
	}
	else if(isSet($_COOKIE['lang']))
	{
		$lang = $_COOKIE['lang'];
	}
	else
	{
		$lang = 'pl';
	}

	switch ($lang) {
	  case 'en':
	  $lang_file = 'lang.en.php';
	  break;

	  case 'pl':
	  $lang_file = 'lang.pl.php';
	  break;
	  
	  case 'us':
	  $lang_file = 'lang.us.php';
	  break;

	  default:
	  $lang_file = 'lang.pl.php';

}
include_once 'languages/'.$lang_file;
?>