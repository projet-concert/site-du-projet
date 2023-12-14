<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Page Concert</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <header>
    <a href="main.php"><img src="images/logo1.png" alt="LOGO" /></a>
    <h1 class="ms-4">Page Concert</h1>
    <div class="btn-connect">
      <a href="page_log.php" class="btn btn-light mt-2">Se connecter</a>
    </div>
  </header>
  </div>

  <div class="row test23">
    <?php

    $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

    // $data = $db->query("SELECT * FROM concert")->fetchALL();

    $data = $db->query("SELECT * 
                    FROM artiste
                    INNER JOIN concert ON artiste.id = concert.artiste
                    INNER JOIN theme ON concert.theme = theme.id
                    INNER JOIN salle_concert ON concert.salle_concert = salle_concert.id")->fetchALL();

    foreach ($data as $row) {



      echo '
      <section class="fiches1 container-fluid test23">
      <div class="row-cols-3 test24">
      <div class="card text-center" style="width: 20em;">
      <img class="card-img-top" src="'.$row['url_image'].'" alt="Card image cap">
      <div class="card-body">
        <p class="card-text"><h2>Nom du Concert : </h2></p>
        <p>'.$row['nom_concert'].'</p>
        <br>
        <h5>Date du concert:</h5>
          <p>'.$row['date_concert'].'<p>
        
        <h5>Heure du concert:</h5>
          <p>'.$row['heure'].'<p>
        
        <h5>Nom de la salle :</h5>
        <p>'.$row['nom_salle'].'</p>
    
        <h5>Nom de l\'artiste :</h5>
        <p>'.$row['nom_artiste'].'<p>
        
        <h5>Thème des couleurs :</h5>
        <p>'.$row['nom_theme'].'<p>

        <h5>Listes des sponsors :</h5>
        <p>'.$row['sponsor'].'</p>
        
        
      </div>
    </div>
    </div>
    </section>';

    }

    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>