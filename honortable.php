<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kunniataulu</title>

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript">
    function changeLeaderboard(btn){
        var content4 = document.getElementById('content4')
        var content6 = document.getElementById('content6')
        if(btn.id == '4x4'){
            content4.style.display = "";
            content6.style.display = "none";
        }else{
            content4.style.display = "none";
            content6.style.display = "";
        }
    }
    </script>
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
                <li class="nav-item"><a class="nav-item nav-link" href="index?logout='1'" style="color:rgb(3, 107, 252)">Kirjaudu Ulos</a></li>
                <?php else : ?>
                <li class="nav-item"><a class="nav-item nav-link" href="login">Kirjaudu Sisään</a></li>
                <li class="nav-item"><a class="nav-item nav-link" href="register" style="color:rgb(3, 107, 252)"><b>Luo Käyttäjä!</b></a></li>
                <?php endif ?>

            </ul>
        </div>
    </nav>
<div class="leaderboard-container login-form-1">
    <div class="text-center">
        <h1>Muistipelin Kunniataulu</h1>
        <p>Kumman pelimuodon kunniataulun haluat nähdä?</p>
        <button type="button" class="btn btn-primary btn-lg mb-2" name="button" id="4x4" onclick="changeLeaderboard(this)">4x4</button>
        <button type="button" class="btn btn-primary btn-lg mb-2" name="button" id="6x6" onclick="changeLeaderboard(this)">6x6</button>
    </div>
    <div id="content4" class="text-center" style="display:none; max-width: 50%; margin: auto auto">

      	<?php
        $query = "SELECT * FROM `leaderboard` WHERE gamemode = '4x4' ORDER by `score` ASC LIMIT 10 ";
        $result =  mysqli_query($db, $query) or die("Error: ". mysql_error(). " with query ");;
        $result_amount = mysqli_num_rows($result);
        $rank = 1;
        ?>
        <h1>Pelimuoto - 4x4</h1>
        <table class="table table-bordered thead-dark text-center login-container login-form-1 table-responsive tableMobile">
            <thead class="thead-light">
                <tr>
                  <th style="text-align: center !important;">Sijoitus</th>
                  <th style="text-align: center !important;">Käyttäjänimi</th>
                  <th style="text-align: center !important;">Aika</th>
                </tr>
            </thead>

          <?php
           while($row = mysqli_fetch_array($result)){
             ?>
             <tbody>


             <tr>
               <td><?php echo $rank; ?>.</td>
               <td><?php echo $row['username']; ?></td>
               <td><?php echo $row['score']; ?></td>
             <?php
               $rank = $rank + 1; /* Lisätään Rank muuttujaan numero*/
             ?>
             </tr>
        <?php
            } /* Lopetetaan while silmukka*/
         ?>
         </tbody>
        </table>

    </div>
    <div id="content6" class="text-center" style="display:none; max-width: 50%; margin: auto auto">

      	<?php
        $query = "SELECT * FROM `leaderboard` WHERE gamemode = '6x6' ORDER by `score` ASC LIMIT 10 ";
        $result =  mysqli_query($db, $query) or die("Error: ". mysql_error(). " with query ");;
        $result_amount = mysqli_num_rows($result);
        $rank = 1;
        ?>
        <h1>Pelimuoto - 6x6</h1>
        <table class="table table-bordered thead-dark text-center w-50 login-container login-form-1">
            <thead class="thead-light">
                <tr>
                  <th style="text-align: center !important;">Sijoitus</th>
                  <th style="text-align: center !important;">Käyttäjänimi</th>
                  <th style="text-align: center !important;">Aika</th>
                </tr>
            </thead>

          <?php
           while($row = mysqli_fetch_array($result)){
             ?>
             <tbody>


             <tr>
               <td><?php echo $rank; ?>.</td>
               <td><?php echo $row['username']; ?></td>
               <td><?php echo $row['score']; ?></td>
             <?php
               $rank = $rank + 1; /* Lisätään Rank muuttujaan numero*/
             ?>
             </tr>
        <?php
            } /* Lopetetaan while silmukka*/
         ?>
         </tbody>
        </table>

    </div>
</div>


</body>
</html>
