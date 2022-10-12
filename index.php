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
                <h1>Witaj na stronie</h1>
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
                <section>
                    <h2>Sekcja</h2>
                    <article>
                        <h3>Artykuł</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum incidunt, molestias quidem quaerat illum maiores dignissimos, cupiditate id maxime labore necessitatibus voluptas, saepe minus fuga? Nam aliquid dignissimos expedita dolor?</p>
                    </article>
                </section>
                <section>
                    <h2>Sekcja</h2>
                    <article>
                        <h3>Artykuł</h3>
                        <p>Asperiores ad hic corrupti distinctio quos aliquam a, rerum odio consequuntur mollitia nesciunt eaque amet perferendis totam consequatur sit voluptas perspiciatis eos fugit omnis quibusdam natus ratione ipsum! Quia, illo.</p>
                    </article>
                </section>
                <section>
                    <h2>Sekcja</h2>
                    <article>
                        <h3>Artykuł</h3>
                        <p>Placeat eveniet expedita reiciendis alias sunt, temporibus sapiente facere voluptas harum provident illum saepe iure culpa quisquam ea, doloribus iusto dolor repellendus dolorem voluptate dolores magni nisi nihil a! Eligendi!</p>
                    </article>
                </section>
                </div>
        </div>
    </div>
</body>
</html>