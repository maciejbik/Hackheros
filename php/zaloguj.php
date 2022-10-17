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
                $sql = mysqli_query($con,"SELECT nick,prof_img,login FROM uzytkownicy WHERE login='$login' AND hasło='$haslo'");
                $_SESSION["zalogowany"] = true;
                $tab =  mysqli_fetch_array($sql);
                $_SESSION["nick"] = $tab[0];
                $_SESSION["login"] = $tab[2];
                if(!isset($tab[1]) || empty($tab[1]))
                {
                    $_SESSION["prof_img"]="img/anonym.png";
                }
                else
                {
                    $_SESSION["prof_img"] = $tab[1];
                }
                // echo $_SESSION["prof_img"];
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