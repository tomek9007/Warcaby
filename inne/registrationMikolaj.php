<?php

    require_once "connect.php";
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

    session_start();
    if(isset($_POST['email']))
    {
        //udana walidacja
        $ok = true;
        $name = $_POST['name'];
        if(!(strlen($name)>2 && strlen($name)<21))
        {
            $ok = false;
        }
        
        if(ctype_alnum($name)==false)
        {
            $ok = false;
        }
        
        $email=$_POST['email'];
        
        $emailB=filter_var($email, FILTER_SANITIZE_EMAIL);
        
        if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false)|| ($emailB!=$email))
        {
            $ok=false; 
        }
        
        $haslo1 = $_POST['password1'];
        $haslo2 = $_POST['password2'];
        
        if(!(strlen($haslo1)>2 || strlen($haslo1)<21)||!(strlen($haslo2)>2 && strlen($haslo2)<21)||(ctype_alnum($haslo1)==false)||(ctype_alnum($haslo2)==false)||($haslo1!=$haslo2))
        {
            $ok = false;
        }
        
        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
        
        if(!isset($_POST['accept']))
        {
            $ok = false;
        }
        
        $_SESSION['fr_nick']=$name;
        $_SESSION['fr_email']=$email;
        $_SESSION['fr_haslo1']=$haslo1;
        $_SESSION['fr_haslo2']=$haslo2;
        if(isset($_POST['accept'])) $_SESSION['fr_accept']=true;
        
        
        
        require_once "connect.php";
        try{
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }else{
                //email
                
                $rezultat = $polaczenie->query("SELECT user FROM uzytkownicy WHERE email='$email'");
                if(!$rezultat){
                    throw new Exception($polaczenie->error);
                }
                $ile_takich_maili = $rezultat->num_rows;
                if($ile_takich_maili>0){
                    $ok = false;
                    $_SESSION['e_email']="Istnieje juz konto przypisane do tego adresu e-mail";
                }
                //nick
                $rezultat = $polaczenie->query("SELECT user FROM uzytkownicy WHERE user='$name'");
                if(!$rezultat){
                    throw new Exception($polaczenie->error);
                }
                $ile_takich_nickow = $rezultat->num_rows;
                if($ile_takich_nickow>0){
                    $ok = false;
                }
                 if($ok==true)
                    {
                        $false = false;
                        $int = 0;
                        $stmt= $polaczenie->prepare("INSERT INTO uzytkownicy (user, pass, email, jestDostepny, szukaGry, iloscWygranychPojedynkow) VALUES(?,?,?,?,?,?)");
                        $stmt->bind_param('sssbbi',$name, $haslo_hash, $email, $false, $false, $int);
                        $stmt->execute();
                        $stmt->close();
                        $polaczenie->close();

                        
                        header('Location: index.php'); 
                     
                        if(isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
                        if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
                        if(isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
                        if(isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
                        if(isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
                        if(isset($_SESSION['fr_accept'])) unset($_SESSION['fr_accept']);

                     
                     
                    }
                 
            }
        
        }catch(Exception $e)
        {
            echo $e;
            echo "Blad serwera!";
        }
    }
?>
