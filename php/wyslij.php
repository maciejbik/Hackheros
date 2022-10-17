<?php
    session_start();
    if($_SESSION["login"])
    {
        if(isset($_POST["tytul"]) && isset($_POST["opis"]) && !empty($_POST["tytul"]) && !empty($_POST["opis"]))
        {
            $tytul = $_POST["tytul"];
            $opis = $_POST["opis"];
            $con = mysqli_connect("localhost","root","","glosowanie");
            $id_uzyt = mysqli_fetch_assoc(mysqli_query($con,"SELECT id FROM uzytkownicy WHERE login='".$_SESSION["login"]."'"))["id"];
            mysqli_query($con,"INSERT INTO glosy (id_uzyt,polubienia,temat,opis,data_dodania) VALUES($id_uzyt,0,'$tytul','$opis',NOW())");
            header("Location: ../najnowsze.php");
        }
        else
        {
            $_SESSION["user-error"] = "Należy wprowadzić dane do formularza";
            header("Location: ../dodaj.php");
        }
    }
    else
    {
        $_SESSION["user-error"] = "Zaloguj się aby dodac wpis";
        header("Location: ../loguj.php");
    }
?>