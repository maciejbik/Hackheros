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
                echo "<script>alert('rcb')</script>";
            }
            else
            {
                $_SESSION["user-error"] = "Nie ma takiego użytkownika!";
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