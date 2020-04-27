<?php
session_start();


$username = "";
$errors = array();

// Yhdistetään tietokantaan
$db = mysqli_connect('81.16.28.1', 'u178350957_admin', '12345', 'u178350957_muistipeli');

// Rekisteröinti systeemi
if (isset($_POST['reg_user'])) {
  // Otetaan kaikki muuttujat formista
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Katotaan että kaikissa on teksti
  if (empty($username)) { array_push($errors, "Käyttäjänimi on pakollinen!"); }
  if (empty($password_1)) { array_push($errors, "Salasana on pakollinen!"); }
  if (strlen($password_1) < 15) { array_push($errors, "Salasanan pitää olla vähintään 15 merkkiä!");}
  if ($password_1 != $password_2) {
	array_push($errors, "Salasanat eivät ole samat!");
  }

  // Tarkistetaan että onko tietokannassa samalla nimellä oleva käyttäjä
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  // Jos käyttäjä löytyy
  if ($user) {
     array_push($errors, "Käyttäjänimi on käytössä");

  }

  // Jos ei ole mitään virheitä, rekisteröidään käyttäjä
  if (count($errors) == 0) {
  	$password = md5($password_1); // Encryptataan salasana, jotta ei tallenneta salasanaa suoraan

  	$query = "INSERT INTO users (username, password)
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Kirjauduttu sisään!";
  	header('location: index.php');
  }
}

// Kirjautumis systeemi
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Käyttäjänimi on pakollinen!");
  }
  if (empty($password)) {
  	array_push($errors, "Salasana on pakollinen!");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Kirjauduttu sisään!";
  	  header('location: peli.php');
  	}else {
  		array_push($errors, "Käyttäjätunnus tai salasana on väärä!");
  	}
  }
}

// Leaderboard systeemi
if (isset($_POST['lb_add'])) {
    if(isset($_SESSION['username'])){
        $score = mysqli_real_escape_string($db, $_POST['u_score_value']);
        $username = mysqli_real_escape_string($db, $_SESSION['username']);

        $query = "INSERT INTO `leaderboard`(`username`, `score`) VALUES ('$username','$score')";
        $results = mysqli_query($db, $query) or die("Error: ". mysql_error(). " with query ");
        //header('location: peli.php?success=1')
    }

}

?>
