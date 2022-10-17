<?php
session_start();
if(isset($_SESSION["login"]))
{
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/scroller.css">
    <link rel="stylesheet" href="style/animations.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bloki.css">
    <link rel="stylesheet" href="style/loguj.css">
    <script defer src="js/miniprofile.js"></script>
</head>
<body>
    <!-- PANELS -->
    <div class="panels">
        <!-- LEFT -->
        <div class="left">
            <div class="header">
                <h1 class="header-heading"><img src="img/rect7168.png" alt="Logo strony"></h1>
                <a href="dodaj.php" class="dodaj-link"><div class="dodaj">Dodaj swój wpis</div></a>
                <nav class="navigation">
                    <a href="index.php" class="nav-link">
                        <div class="nav-box">
                            <span class="nav-box__icon">🏠</span> Strona główna</div>
                    </a><a href="najnowsze.php" class="nav-link">
                        <div class="nav-box">
                            <span class="nav-box__icon">⏰</span> Najnowsze</div>
                    </a><a href="popularne.php" class="nav-link">
                        <div class="nav-box">
                            <span class="nav-box__icon">🔥</span> Popularne</div>
                    </a>
                </nav>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="right">
            <div class="header">
                <h1>Strona Logowania</h1>
            </div>
            
            <div class="main">
                <section class="logowanie">
                    <div class="logowanie-content">
                        <h2>Zaloguj się</h2>
                        <form method="POST" action="php/zaloguj.php">
                            <label>
                                Login: <input minlength=1 required type="text" name="login">
                            </label><br>
                            <label>
                                Hasło: <input minlength=1 required type="text" name="haslo">
                            </label><br>
                            <button type="submit">Zaloguj się</button>
                        </form>
                        <?php
                        if(isset($_SESSION["user-error"]))
                        {
                            echo "<p class='error'>".$_SESSION["user-error"]."</p>";
                            unset($_SESSION["user-error"]);
                        }
                        ?>
                        <br>
                        <div class="rejestracja-link">Nie masz konta? <br> <a href="rejestracja.php">Zarejestruj się!</a></div>
                    </div> 
                </section>
            </div>
        </div>
    </div>
</body>
</html>