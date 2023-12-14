<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <title>Vos concerts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <header>
    <a href="main.php"><img src="images/logo1.png" class="taille_image" alt="LOGO" /></a>
    <h1>App Concerts</h1>
    <div class="btn-connect">
      <a href="page_log.php" class="btn btn-light mt-2">Se connecter</a>
    </div>
  </header>
  <main>
    <div class="row test">
      <?php

      $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

      $data = $db->query("SELECT * FROM artiste")->fetchALL();

      foreach ($data as $row) {



        echo '
<section class="fiches container-fluid">
<div class="card test42" style="width: 18rem;">
    <img class="card-img-top" src="' . $row['url_image_artiste'] . '" alt="Card image cap">
    <div class="card-body">
      <p class="card-text"><h2>' . $row['nom_artiste'] . '</h2></p>
      <a href="'.$row['url_info_artiste'].'" class="btn btn-outline-primary mt-2" target="_blank">À propos</a>
      <a href="page_concert.php" class="btn btn-outline-primary mt-2">Voir les concerts</a>
      
    </div>
</div>
</section>';

      }

      ?>
    </div>

  </main>
  <script type="module" src="event.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>