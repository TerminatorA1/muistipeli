<?php include('server.php') ?>
<?php if(!(isset($_SESSION['username']))){
    header('location: login');

}
?>

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
</head>

<body>
    <div class="flex-container">
        <div><a href="index">Alkusivu</a></div>
        <div><a href="honortable">Kunniataulu</a></div>
        <div><a href="index?logout='1'">Kirjaudu Ulos</a></div>
    </div>
    <form method="post" action="peli" onsubmit="copyContent()">
        <?php include('errors.php'); ?>

        <p>Tervetuloa pelaamaan muistipeliä!</p>
        <div id="sw-time" name="score">00:00:00</div>
            <table id="myTable" style="border: solid 1px black">

            </table>
        <br>
        <input type="hidden" name="u_score_value" id="u_score_value">
        <input type="hidden" name="gamemode" id="gamemode">
        <div id="modeButtons">
    		<p id="modeText">Valitse pelimuoto</p>
    		<button type="button" id="4x4" style="display:block" onclick="createPlayfield(this, 4, 4)">4 x 4</button>
    		<br>
    		<button type="button" id="6x6" style="display:block" onclick="createPlayfield(this, 6, 6)">6 x 6</button>
    	</div>
        <button id="submitTime" style="display:none; width:150px; height;50px;" type="submit" name="lb_add">Tallenna Aika</button>
    </form>
    <br>
    <script src="index.js"></script>
    <br>
    <p>Valitse yllä olevasta ruudusto ei näkyvisssä oleva tiili ja etsi sille pari.<br>
        Jos et löydä paria sekunnin kuluessa, niin tiilet sulkeutuvat.<br>
        Jos löydät parin, se jää näkyviin.<br>
        Peli on ratkaistu, kun kaikki kuvaparit on löydetty.<br>
        Tuloksesi on ratkaisemiseen käytetty aika.<br>
        Mitä pienempi aika, sitä parempi tulos.<br>
        Voit käydä vertaamassa tulostasi muihin pelaajiin yläpalkin "Kunniataulu"-kohdasta.
    </p>
</body>
