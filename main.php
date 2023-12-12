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
    <a href="main.php"><img src="images/logo.png" alt="LOGO" /></a>
    <h1>App Concerts</h1>
    <div class="mb-4 me-5">
      <label for="moteurDeRecherche" class="form-label"></label>
      <input type="text" id="moteurDeRecherche" class="form-control" placeholder="Tapez votre titre" />
    </div>
    <div class="mb-2 ml-2">
      <!-- <input type="submit" class="btn btn-light mt-2" value="Se connecter"> -->
      <a href="page_log.php" class="btn btn-light mt-2">Se connecter</a>
    </div>
  </header>
  <main>
    <section class="filtres">
      <h3>Filtres</h3>
      <input type="submit" class="btn btn-outline-primary mt-2" value="Par défaut">
      <br>
      <input type="submit" class="btn btn-outline-secondary mt-2" value="Trier par date">
      <br>
      <input type="submit" class="btn btn-outline-success mt-2" value="Artiste">
      <br>
      <input type="text" id="keyword" name="keyword" class="form-control mt-2" placeholder="Entrez votre artiste" />
      <br>
      <input type="month" id="dateChoix" name="dateChoix" class="form-control mt-2" />
    </section>

    <!-- Fiches produits -->
    <section class="fiches container-fluid">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top"
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Festival_des_Vieilles_Charrues_2022_-_Ninho_-_041.jpg/330px-Festival_des_Vieilles_Charrues_2022_-_Ninho_-_041.jpg"
          alt="Card image cap">
        <div class="card-body">
          <p class="card-text">
          <h2>Ninho</h2>
          <br>
          Ouai c'est Ninho
          </p>
          <input type="submit" class="btn btn-outline-primary mt-2" value="Voir les concerts">
        </div>
      </div>
    </section>

    <?php

    if (isset($_POST["nom_artiste"]) && isset($_POST["url_image"])) {
      $nom_artiste = $_POST["nom_artiste"];
      $url_image = $_POST["url_image"];

      $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

      $stmt = $db->prepare("INSERT INTO salle_concert (nom_artiste, url_image) VALUES (:nom_artiste, :url_image)");
      $stmt->bindParam(":nom_artiste", $nom_artiste);
      $stmt->bindParam(":url_image", $url_image);

      $stmt->execute();

      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>C est nickel</strong> l ajout est OK.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }



    ?>
    </form>



    <div class="row">
      <?php

      $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

      $data = $db->query("SELECT * FROM artiste")->fetchALL();

      foreach ($data as $row) {



        echo '
<section class="fiches container-fluid">
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="' . $row['url_image'] . '" alt="Card image cap">
    <div class="card-body">
      <p class="card-text"><h2>' . $row['nom_artiste'] . '</h2>
      <input type="submit" class="btn btn-outline-primary mt-2" value="Voir les concerts">
    </div>
</div>
</section>';

      }

      ?>







  </main>
  <script type="module" src="event.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>