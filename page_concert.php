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
  <a href="main.php"><img src="images/logo.png" alt="LOGO" /></a>
    <h1 class="ms-4">Page Concert</h1>
  </header>
  </div>

  <div class="row">
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
        <section class="fiches container-fluid">
        <div class="row row-cols-3">
        <div class="card col" style="width: 18rem;">
            <img class="card-img-top" src="' . $row['url_image'] . '" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><h2>' . $row['nom_concert'] . '</h2></p>
              <p class="card-text"><h4>' . $row['nom_artiste'] . '</h4></p>
              <p class="card-text">Date : ' . $row['date_concert'] . '</p>
              <p class="card-text">Heure : ' . $row['heure'] . '</p>
              <p class="card-text">Lieu : ' . $row['nom_salle'] . '</p>
              <p class="card-text">à : ' . $row['ville'] . ', ' . $row['code_postal'] . '</p>
              <p class="card-text">Type : ' . $row['nom_theme'] . '</p>
              <p class="card-text">Sponsor : ' . $row['sponsor'] . '</p>
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