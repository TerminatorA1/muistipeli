<?php include('server.php') ?>
<?php
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Alkusivu</title>

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>


<body>
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
    <div class="login-container login-form-1 pt-5">
        <h1 style="font-size:48px" class="text-center pb-5">Muistipeli</h1>

        <div>
            <div class="row">
                    <p class="sideText">
                        Tervetuloa Muistipelin nettisivulle!
                        <br>
                        <br>
                        Muistipelin tarkoituksena on löytää kuvaparit suuresta määrästä väärinpäin olevista kuvista.
                        Kun ruutua painaa, sen kuva tulee näkyviin, tämän jälkeen joudut painamaan toista ruutua jotta löydät ensimmäisen kuvan parin.
                        Jos kuvat eivät ole samoja, molemmat kuvat kääntyvät takaisin väärinpäin.
                        <br>
                        <br>
                        <?php if(isset($_SESSION['username'])) : ?>
                            Alla oleva painike avaa pelin!
                        <?php else: ?>
                            Paina alla olevaa painiketta jotta voit luoda itsellesi käyttäjätilin.
                            Jos sinulla on jo käyttäjätili, paina Kirjaudu Sisään painiketta ruudun yläreunasta.
                        <?php endif ?>

                    </p>
            </div>
        </div>
        <div class="text-center mt-5">
            <?php if(isset($_SESSION['username'])) : ?>
                <form action="peli">
                    <button href="peli" type="submit" class="btn btn-primary btn-lg aloitaButton" style="border-radius:30px; font-size:30px;">Avaa Peli!</button>
                </form>
            <?php else: ?>
                <form action="register">
                    <button href="register" type="submit" class="btn btn-primary btn-lg aloitaButton" style="border-radius:30px; font-size:30px;">Aloita nyt!</button>
                </form>
            <?php endif ?>
        </div>
        <p class="mt-5" style="color:white">Made by: Miro L. ja Atte V.</p>
    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>

</html>
