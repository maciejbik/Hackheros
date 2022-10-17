<?php
session_start();
if(isset($_POST["upload"]))
{
    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_size = $_FILES["file"]["size"];
    $file_tem_loc = $_FILES["file"]["tmp_name"];
    $file_store = "../img/".$file_name;
    if(move_uploaded_file($file_tem_loc,$file_store))
    {
        echo "files are uploaded";
        $_SESSION["prof_img"] = "img/$file_name";
        $con = mysqli_connect("localhost","root","","glosowanie");
        mysqli_query($con,"UPDATE uzytkownicy SET prof_img='img/$file_name' WHERE login='".$_SESSION["login"]."'");
    }
    else
    {
        $_SESSION["user-error"] = "Nie dodano zdjęcia";
    }



    $back = $_POST["back"];
    header("Location: ../$back");
}
else
{
    $_SESSION["user-error"] = "Nie dodano zdjęcia";
    $back = $_POST["back"];
    header("Location: ../$back");
}
?>