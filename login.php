<?php include('server.php') ?>
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

        .flex-container>div {
            background-color: #f1f1f1;
            margin: 10px;
            padding: 20px;
            font-size: 30px;
        }
    </style>
    <title>Muistipeli, Kirjautumissivu</title>
</head>

<body>
    <div class="flex-container">
        <div><a href="index">Alkusivu</a></div>
        <div><a href="register">Uuden käyttäjän rekisteröinti</a></div>
    </div>
    <p>Muistipeliin kirjautuminen
        <p/>
        <form method="post" action="login">
            <?php include('errors.php'); ?>
        	<div class="input-group">
        		<label>Käyttäjätunnus</label>
        		<input type="text" name="username" >
        	</div>
        	<div class="input-group">
        		<label>Salasana</label>
        		<input type="password" name="password">
        	</div>
        	<div class="input-group">
        		<button type="submit" class="btn" name="login_user">Login</button>
        	</div>
        	<p>
        		Ei ole käyttäjää? <a href="register">Luo käyttäjä!</a>
        	</p>
        </form>
        <p>
            Jos haluat pelata, kirjaudu sisään ja aloita peli! <br>
            Pelin pelaamista varten sinulla on oltava oma käyttäjätunnus.<br>
            Jos sinulla ei ole käyttäjätunnuksia, niin valitse "Uuden käyttäjän rekisteröinti".<br>
            <br>
        </p>

</html>
