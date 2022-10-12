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
                <h1 class="header-heading">Strona <br> główna <i class="fab fa-42-group"></i></h1>
                <div class="dodaj"><a href="dodaj.php">Dodaj swój wpis</a></div>
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
                <h1>Najnowsze</h1>
                <div class="konto">
                    <!-- Jeśli nie zalogowany -->
                    <!-- <a href="loguj.php" class="loguj">
                        <div class="loguj__container">Zaloguj się</div>
                    </a> -->

                    <!-- Jeśli zalogowany -->
                    <div class="profile">
                        <img onclick="miniprofile()" src="img/anonym.png" alt="">
                        <div class="miniprofile" onclick="miniprofile()">
                            <img src="img/anonym.png" alt="">
                            <a href="profil.php">Sprawdz profil</a>
                            <a href="polubione.php">Polubione</a>
                            <a href="php/wyloguj.php">Wyloguj się</a>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="main">
                <div class="glosowanie">
                                <div class="request-link">

                <?php
                // <div class="request">
                //     <div class="reuqest-title">
                //         <img src="img/anonym.png" alt="Profile img" class="profile-img">
                //         <p>Użytkownik</p>
                //     </div>
                //     <h2>Tytuł</h2>
                //     <p class="opis">Ea neque officiis possimus dolore magnam minus labore iusto. Expedita soluta recusandae iure voluptas dolore rem, quam esse reprehenderit hic ipsum qui eos sint deserunt, sunt perspiciatis error aliquid non?</p>
                //     <div class="request-bottom">
                //         <p class="data">##-##-####</p>
                //         <p class="like">0</p>
                //     </div>
                // </div>
                $con = mysqli_connect('localhost','root','','glosowania');
                
                if($zapytanie = mysqli_query($con,"SELECT * FROM glos JOIN uzytkownik ON uzytkownik.id_uzyt=glos.id_uzyt ORDER BY dodanie DESC"))
                {
                    while($wynik = mysqli_fetch_assoc($zapytanie))
                    {
                        if($wynik["prof_img"]==null)
                        {
                            $wynik["prof_img"]="anonym.png";
                        }

                        echo "<div class='request'>";
                        echo "  <div class='reuqest-title'>";
                        echo "      <img src='img/".$wynik["prof_img"]."' alt='Profile img' class='profile-img'>";
                        echo "      <p>".$wynik["nick"]."</p>";
                        echo "  </div>";
                        echo "  <h2>".$wynik["temat"]."</h2>";
                        echo "  <p class='opis'>".$wynik["opis"]."</p>";
                        echo "  <div class='request-bottom'>";
                        echo "      <p class='data'>".$wynik["dodanie"]."</p>";
                        echo "      <p class='like'>".$wynik["polubienia"]."</p>";
                        echo "  </div>";
                        echo "</div>";
                    }
                }
                else
                {
                    echo "Brak danych";
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>