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
    <title>Muistipeli, Rekisteröinti sivu</title>
</head>

<body>
    <div class="flex-container">
        <div><a href="index">Alkusivu</a></div>
        <div><a href="login">Kirjaudu sisään</a></div>
    </div>
    <p>Muistipelin uuden käyttäjän rekisteröinti
        <p />
        <form method="post" action="register">
        	<?php include('errors.php'); ?>
        	<div class="input-group">
        	  <label>Käyttäjänimi</label>
        	  <input type="text" name="username" value="<?php echo $username; ?>">
        	</div>
        	<div class="input-group">
        	  <label>Salasana</label>
        	  <input type="password" name="password_1">
        	</div>
        	<div class="input-group">
        	  <label>Vahvista Salasana</label>
        	  <input type="password" name="password_2">
        	</div>
        	<div class="input-group">
        	  <button type="submit" class="btn" name="reg_user">Rekisteröi</button>
        	</div>
        </form>

        <p>
            Jos haluat pelata, sinun on rekisteröidyttävä antamalla itsellesi <br>
            yksilöllinen käyttäjätunnus ja vähintään 15 merkkiä pitkä salasana. <br>
            Jos sinulla on käyttäjätunnus, niin valitse yläpalkista "Kirjaudu sisään", <br>
            <br>
        </p>

</html>
