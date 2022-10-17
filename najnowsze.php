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
                </div>
            </div>
            <div class="main">
                <div class="glosowanie">
                    <div class="request-link">

                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'glosowanie');
                        $zapytanie = mysqli_query($con, "SELECT * FROM glosy JOIN uzytkownicy ON uzytkownicy.id=glosy.id_uzyt ORDER BY data_dodania DESC");
                        $fetch = 0;
                        if($zapytanie) {
                            while ($wynik = mysqli_fetch_assoc($zapytanie)) {
                                if ($wynik["prof_img"] == null) {
                                    $wynik["prof_img"] = "anonym.png";
                                }
                                echo "<div class='request'>";
                                echo "  <div class='reuqest-title'>";
                                echo "      <img src='img/" . $wynik["prof_img"] . "' alt='Profile img' class='profile-img'>";
                                echo "      <p>" . $wynik["nick"] . "</p>";
                                echo "  </div>";
                                echo "  <h2>" . $wynik["temat"] . "</h2>";
                                echo "  <p class='opis'>" . $wynik["opis"] . "</p>";
                                echo "  <div class='request-bottom'>";
                                echo "      <p class='data'>" . $wynik["dodanie"] . "</p>";
                                echo "      <p class='like'>" . $wynik["polubienia"] . "</p>";
                                echo "  </div>";
                                echo "</div>";
                                $fetch=1;
                            }

                        } 
                        if($fetch==0)
                        {
                            echo "<h2>Badź pierwszą osobą piszącą na stronie!</h2>";
                            echo "<a href='dodaj.php' class='dodaj-link'><div class='dodaj'>Dodaj swój wpis</div></a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>