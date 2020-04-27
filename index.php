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
<style>
p {
    font-size: large;
}
.flex-container {
    display: flex;
    background-color: DodgerBlue;
}

.flex-container > div {
    background-color: #f1f1f1;
    margin: 10px;
    padding: 20px;
    font-size: 30px;
}
</style>
<title>Muistipeli</title>
</head>
<body>
<div class="flex-container">
    <div><a href="index">Alkusivu</a></div>
    <?php  if (isset($_SESSION['username'])) : ?>
    <div><a href="index?logout='1'">Kirjaudu Ulos</a></div>
    <?php else : ?>
    <div><a href="login">Kirjaudu Sisään</a></div>
    <div><a href="register">Uuden käyttäjän rekisteröinti</a> </div>
    <?php endif ?>
</div>
<p>Tervetuloa muistipeli-saitille!</>
<br>
<p>Pelin pelaamista varten sinulla on oltava oma käyttäjätunnus.<br>
Jos sinulla on käyttäjätunnus, niin valitse "Kirjaudu sisään", <br> muussa tapauksessa valitse "Uuden käyttäjän rekisteröinti".<br>
<br>
Saitilla pelaaminen on ilmaista!
</p>
</body>
</html>
