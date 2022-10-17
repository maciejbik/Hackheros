<?php
session_start();
if (!isset($_SESSION["login"])) {
    $_SESSION["user-error"] = "Zaloguj się zanim dodasz wpis";
    header("Location: loguj.php");
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
    <link rel="stylesheet" href="style/loguj.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bloki.css">
    <link rel="stylesheet" href="style/dodaj.css">
    <script defer src="js/miniprofile.js"></script>
</head>

<body>
    <!-- PANELS -->
    <div class="panels">
        <!-- LEFT -->
        <div class="left">
            <div class="header">
                <h1 class="header-heading"><img src="img/rect7168.png" alt="Logo strony"></h1>
                <a href="dodaj.php" class="dodaj-link">
                    <div class="dodaj">Dodaj swój wpis</div>
                </a>
                <nav class="navigation">
                    <a href="index.php" class="nav-link">
                        <div class="nav-box">
                            <span class="nav-box__icon">🏠</span> Strona główna
                        </div>
                    </a><a href="najnowsze.php" class="nav-link">
                        <div class="nav-box">
                            <span class="nav-box__icon">⏰</span> Najnowsze
                        </div>
                    </a><a href="popularne.php" class="nav-link">
                        <div class="nav-box">
                            <span class="nav-box__icon">🔥</span> Popularne
                        </div>
                    </a>
                </nav>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="right">
            <div class="header">
                <h1>Witaj na stronie</h1>
                <div class="konto">

                    <?php
                    if (isset($_SESSION["zalogowany"])) {
                        echo "<!-- Jeśli zalogowany -->";
                        echo "<div class='profile'>";
                        echo "    <img onclick='miniprofile()' src='" . $_SESSION["prof_img"] . "' alt='Profilowe zdjecie'>";
                        echo "    <div class='miniprofile' onclick='miniprofile()'>";
                        echo "        <span>" . $_SESSION["nick"] . "</span>";
                        echo "        <img src='" . $_SESSION["prof_img"] . "' alt='Profilowe zdjecie'>";
                        echo "        <a href='profil.php'>Sprawdz profil</a>";
                        echo "        <a href='polubione.php'>Polubione</a>";
                        echo "        <a href='php/wyloguj.php'>Wyloguj się</a>";
                        echo "    </div>";
                        echo "</div>";
                    } else {
                        echo "<a href='loguj.php' class='loguj'>";
                        echo "<div class='loguj__container'>Zaloguj się</div>";
                        echo "</a>";
                    }
                    ?>
                </div>
            </div>

            <div class="main">
                <section class="dodaj">
                    <div class="dodaj-content">
                        <div class="h2-content">
                            <h2>Dodaj swój wpis</h2>
                        </div>
                        <form method="POST" action="php/wyslij.php">
                            <label>
                                Tytuł:
                                <input type="text" name="tytul">
                            </label>
                            <label>
                                Opis: <br>
                                <textarea style="resize: vertical" rows="15" name="opis"></textarea>
                            </label>
                            <button type="submit">Wyślij</button>

                            <?php
                            if (isset($_SESSION["user-error"])) {
                                echo "<p class='error'>" . $_SESSION["user-error"] . "</p>";
                                unset($_SESSION["user-error"]);
                            }
                            ?>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>