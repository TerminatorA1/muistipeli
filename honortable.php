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

.flex-container > div {
  background-color: #f1f1f1;
  margin: 10px;
  padding: 20px;
  font-size: 30px;
}
</style>
<title>Muistipeli, Kunniataulukko</title>
</head>
<body>
<div class="flex-container">
  <div><a href="index">Alkusivu</a></div>
  <div><a href="peli">Muistipeli</a></div>
  <div><a href="index?logout='1'">Kirjaudu ulos</a></div>
</div>
<p>Muistipelin Kunniataulukko, TOP-10</>
    <div class="content">
      	<!-- notification message -->
      	<?php
        $query = "SELECT * FROM `leaderboard` ORDER by `score` DESC LIMIT 10";
        $result =  mysqli_query($db, $query) or die("Error: ". mysql_error(). " with query ");;
        $result_amount = mysqli_num_rows($result);
        $rank = 1;
        ?>
        <table class="gradienttable">
          <tr>
            <th>Sijoitus</th>
            <th>Käyttäjänimi</th>
           <th>Aika</th>
          </tr>
          <?php
           while($row = mysqli_fetch_array($result)){
             ?>
             <tr>
               <td><?php echo $rank; ?></td>
               <td><?php echo $row['username']; ?></td>
               <td><?php echo $row['score']; ?></td>
             <?php
               $rank = $rank + 1; /* Lisätään Rank muuttujaan numero*/
             ?>
             </tr>
        <?php
            } /* Lopetetaan while silmukka*/
         ?>

        </table>

    </div>

</body>
</html>
