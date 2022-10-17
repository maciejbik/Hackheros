<?php
session_start();
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
                    <!-- Jeśli nie zalogowany -->
                    <!-- <a href="loguj.php" class="loguj">
                        <div class="loguj__container">Zaloguj się</div>
                    </a> -->

                    <!-- Jeśli zalogowany -->
                    <!-- <div class="profile">
                        <img onclick="miniprofile()" src="img/anonym.png" alt="">
                        <div class="miniprofile" onclick="miniprofile()">
                            <img src="img/anonym.png" alt="">
                            <a href="profil.php">Sprawdz profil</a>
                            <a href="polubione.php">Polubione</a>
                            <a href="php/wyloguj.php">Wyloguj się</a>
                        </div>
                    </div> -->

                </div>
            </div>

            <div class="main">
                <section class="profil">
                    <div class="profil-content">
                        <h2>Witaj <?php echo $_SESSION["nick"] ?>!</h2>
                        <?php
                        echo "<img src='" . $_SESSION["prof_img"] . "' alt='zdjecie profilowe' />";
                        ?>
                        <h3>Informacje o koncie</h3>
                        <?php
                        $con = mysqli_connect("localhost", 'root', '', "glosowanie");
                        $sql = mysqli_query($con, "SELECT * FROM uzytkownicy WHERE login = '" . $_SESSION["login"] . "'");
                        $tab = mysqli_fetch_array($sql);
                        echo "<span>Data utworzenia konta: " . $tab[4] . "</span>";

                        $uzt_id = $tab[0];
                        $sql = mysqli_query($con, "SELECT * FROM glosy WHERE id_uzyt=$uzt_id");
                        $ile_postow = mysqli_num_rows($sql);
                        echo "<span>Stworzyłeś: $ile_postow postów</span>"
                        ?>
                        <form method="POST" action="php/zdjecie.php" enctype="multipart/form-data">
                            <label>
                                Wyślij zdjęcie profilowe: <br> <br>
                                <input type="file" name="file">
                            </label>
                            <br> <br>
                            <input name="upload" type="submit">
                            <input style="visibility: hidden;" type="text" name="back" value="profil.php">
                        </form>
                        <?php
                        if (isset($_SESSION["user-error"])) {
                            echo "<p class='error'>" . $_SESSION["user-error"] . "</p>";
                            unset($_SESSION["user-error"]);
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>