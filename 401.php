<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>401</title>

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="mr-auto text-center" style="padding: 21% 0">
        <div id="teksti">
            <h1 style="font-size:48px">Error Code: <b style="color:rgb(3, 107, 252)">401</b></h1>
            <h1 class="mr-auto text-center">
                Sinun pitää olla kirjautunut sisään jotta voit pelata muistipeliä!
                <br>
                Kirjaudu sisään tai luo käyttäjätunnus!
            </h1>
            <div class="btn-group" role="group">
                <button class="btn btn-primary btn-lg" style="border: 1px black solid; background-color:rgb(3, 107, 252)" type="button" onclick="window.location.replace('./login')">Kirjaudu Sisään</button>
            </div>
            <div class="btn-group" role="group">
                <button class="btn btn-primary btn-lg" style="border: 1px black solid; background-color: rgb(3, 107, 252)" type="button" onclick="window.location.replace('./register')">Luo Käyttäjä</button>
            </div>


        </div>
    </div>
</body>

</html>
