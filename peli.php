<?php include('server.php') ?>
<?php if(!(isset($_SESSION['username']))){
    header('location: login');

}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kirjaudu Sisään</title>

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <!-- NAV START -->
    <nav class="navbar navbar-default navbar-expand-lg navbar-light scrolling-navbar fixed-top">
        <div class="navbar-header d-flex col-1 justify-content-start">
            <a class="navbar-brand" href="./index"><b>Alkusivu</b></a>
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler mr-auto">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php  if (isset($_SESSION['username'])) : ?>
                <li class="nav-item"><a class="nav-item nav-link" href="peli">Peli</a></li>
                <?php endif ?>
                <li class="nav-item"><a class="nav-item nav-link" href="honortable">Kunniataulu</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right ml-auto">
                <?php  if (isset($_SESSION['username'])) : ?>
                <li class="nav-item"><a class="nav-item nav-link" id="welcomeUser">Tervetuloa <?php echo $_SESSION["username"] ?>!</a></li>
                <li class="nav-item"><a class="nav-item nav-link" href="index?logout='1'" style="color:rgb(3, 107, 252)">Kirjaudu Ulos</a></li>
                <?php else : ?>
                <li class="nav-item"><a class="nav-item nav-link" href="login">Kirjaudu Sisään</a></li>
                <li class="nav-item"><a class="nav-item nav-link" href="register" style="color:rgb(3, 107, 252)"><b>Luo Käyttäjä!</b></a></li>
                <?php endif ?>

            </ul>
        </div>
    </nav>

    <!-- NAV END -->
    <form class="text-center" method="post" action="peli" onsubmit="copyContent()">

        <div id="topDiv" style="">
            <p class="sideText2" id="wonGame" style="display:none !important; font-size:24px !important">Onneksi olkoon! Voitit pelin, sinun aikasi on: </p>

            <table id="myTable" class="myTable" style="border: solid 1px black; margin: auto auto !important; display:inline-block">

            </table>
            <h2>Aika:</h2>
            <h1 id="sw-time" name="score">00:00:00</h1>
            <button id="submitTime" class="btn btn-primary btn-lg mb-2" style="display:none !important;" type="submit" name="lb_add">Tallenna Aika</button>
            <form action="peli.html">
                <button id="resetGame" class="btn btn-warning btn-lg mb-2" type="submit">Aloita alusta</button>
            </form>

            <?php include('errors.php'); ?>

            <p>Tervetuloa pelaamaan muistipeliä!</p>


            <div id="modeButtons">
                <p id="modeText">Valitse pelimuoto</p>
                <button type="button" id="4x4" class="btn btn-primary btn-lg mb-2" onclick="createPlayfield(this, 4, 4)">4 x 4</button>
                <button type="button" id="6x6" class="btn btn-primary btn-lg mb-2" onclick="createPlayfield(this, 6, 6)">6 x 6</button>
            </div>
            <div class="container w-100 text-center mt-1">
                <p class="sideText2">
                    <b style="color:rgb(3, 107, 252)">Kuinka pelata:</b>
                    <br>
                    <br>
                    Aloita peli painamalla yhtä ruutua yläpuolella. Painamalla ruutua, sen ruudun kuva tulee näkyviin. Sinun tarkoitus on löytää jokainen kuvapari. Kun olet painanut yhtä ruutua, paina toista ruutua jonka kuva ei ole näkyvissä. Tämän ruudun kuva tulee näkyviin, jos kuvat ovat samoja, molemmat kuvat jäävät esille. Jos kuvat eivät ole samoja, molemmat kuvat menevät takaisin piiloon sekunnin kuluttua.
                </p>
            </div>
            <input type="hidden" name="u_score_value" id="u_score_value">
            <input type="hidden" name="gamemode" id="gamemode">

        </div>

    </form>

    <br>
    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <input type="hidden" name="" value="AP keksi bugin korjauksen">
</body>
