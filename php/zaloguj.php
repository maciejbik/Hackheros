<?php
    session_start();
    if((isset($_POST["login"]) && isset($_POST["haslo"])) && (!empty($_POST["login"]) && !empty($_POST["haslo"])))
    {
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];
        
        $con = mysqli_connect("localhost","root","","glosowanie");
        if($con!=false)
        {
            $sql = mysqli_query($con,"SELECT * FROM uzytkownicy WHERE login='$login' AND hasło='$haslo'");
            if(mysqli_num_rows($sql))
            {
                $sql = mysqli_query($con,"SELECT nick,prof_img FROM uzytkownicy WHERE login='$login' AND hasło='$haslo'");
                $_SESSION["zalogowany"] = true;
                $_SESSION["nick"] = mysqli_fetch_row($sql)[0];
                $_SESSION["prof_img"] = mysqli_fetch_row($sql)[1];
                if(mysqli_fetch_row($sql)[1]==null)
                {
                    $_SESSION["prof_img"]="img/anonym.png";
                }
                header("Location: ../index.php");
            }
            else
            {
                $_SESSION["user-error"] = "Błędny login lub hasło!";
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
        header("Location: ../loguj.php");
    }


?>