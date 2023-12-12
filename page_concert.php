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
    <img class="artiste" src="images/logo.png" alt="LOGO" />
    <h1 class="ms-4">Page Concert</h1>
  </header>
  </div>


  <section class="filtres">
    <h3>Entrez votre date</h3>
    <br>
    <input type="month" id="dateChoix" name="dateChoix" class="form-control mt-2" />
  </section>
  <section class="fiches container-fluid">
    <div class="card" style="width: 18rem;">
      <img class="card-img-top"
        src="https://www.ccc-lyon.com/sites/congres/files/styles/lfe_home_slider/public/2021-06/2-gradins-pleins-quentin-lafont.jpg?itok=6Kw1rk6r"
        alt="Card image cap">
      <div class="card-body">
        <p class="card-text">
        <h2>Binks to binks</h2>
        </p>
        <h4>Ninho</h4>
        <br>
        <p>Marseille 13015</p>
        <p>Le dôme</p>
      </div>
    </div>
  </section>


  <div class="row">
    <?php

    $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

    $data = $db->query("SELECT * FROM concert")->fetchALL();

    foreach ($data as $row) {



      echo '
<section class="fiches container-fluid">
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="' . $row['url_image'] . '" alt="Card image cap">
    <div class="card-body">
      <p class="card-text"><h2>' . $row['nom_concert'] . '</h2></p>
      <p class="card-text">' . $row['date'] . '</p>
      <p class="card-text">' . $row['heure'] . '</p>
      <p class="card-text">' . $row['salle_concert'] . '</p>
      <p class="card-text">' . $row['theme'] . '</p>
      <p class="card-text">' . $row['sponsor'] . '</p>
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