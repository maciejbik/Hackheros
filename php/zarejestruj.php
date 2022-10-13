<?php
    session_start();
    if((isset($_POST["login"]) && isset($_POST["haslo"]) && isset($_POST["nick"])) && (!empty($_POST["login"]) && !empty($_POST["haslo"]) && !empty($_POST["nick"])))
    {
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];
        $nick = $_POST["nick"];
        $prof = $_POST["prof"] ?? "img/anonym.png";
        
        $con = mysqli_connect("localhost","root","","glosowanie");
        if($con!=false)
        {
            $sql = mysqli_query($con,"SELECT * FROM uzytkownicy WHERE login='$login'");
            if(mysqli_num_rows($sql))
            {
                $_SESSION["user-error"] = "Użytkownik istnieje!";
                header("Location: ../rejestracja.php");
            }
            else
            {
                mysqli_query($con,"INSERT INTO uzytkownicy (login,hasło,nick,data_utworzenia,prof_img) VALUES('$login','$haslo','$nick',now(),'$prof')");
                $_SESSION["user-error"] = "Zarejestrowano pomyślnie 😎";
                header("Location: ../loguj.php");
            }
        }
        else
        {
            echo "BRAK POŁĄCZENIA Z BAZĄ DANYCH";
        }

    }
    else
    {
        header("Location: ../rejestracja.php");
    }


?>