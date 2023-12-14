<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vos salles</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <header>
      <a href="main.php"><img src="images/logo1.png" alt="LOGO" /></a>
      <h1 class="ms-4">Ajout artiste</h1>
      <a href="page_label_bis.php" class="btn btn-light">Ajouter un concert</a>
    </header>
    <div class="container affiche1">
    <form action="page_ajout_artiste.php" method="post">
    
      <section class="fiches3 container-auto">
        <div class="row test4">
      <div class="col-md-12">
          <div class="card mb-3">
            <img class="card-img-top" src="https://thumbs.dreamstime.com/b/estampille-d-exemple-28420393.jpg"
              alt="Card image cap">
            <div class="card-body">
              <input type="text" name="url_image" id="url_image" placeholder="Url de l'image de votre Artiste" pattern="https://.*"
                class="form-control mt-2" required />
              <br>
              <h2><input type="text" id="nom_artiste" name="nom_artiste" class="form-control mt-2"
                  placeholder="Entrez le nom de votre artiste" required /></h2>

              <input type="text" name="url_info_artiste" id="url_info_artiste" placeholder="Url du site d'information de l'artiste" pattern="https://.*"
                class="form-control mt-2" required />
              <br>
              <input type="reset" class="btn btn-danger" value="Clear" />
              <br>
              <br>
              <input type="submit" class="btn btn-outline-primary mt-2" value="Ajouter">
            </div>
          </div>
          </div>
        </div>
      </section>
    

<?php

if (isset($_POST["nom_artiste"])  && isset($_POST["url_image"]) && isset($_POST["url_info_artiste"])){
  $nom_artiste = $_POST["nom_artiste"];
  $url_image = $_POST["url_image"];
  $url_info_artiste = $_POST["url_info_artiste"];

  $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

  $stmt = $db->prepare("INSERT INTO artiste (nom_artiste, url_image_artiste, url_info_artiste) VALUES (:nom_artiste, :url_image_artiste, :url_info_artiste)");
  $stmt->bindParam(":nom_artiste", $nom_artiste);
  $stmt->bindParam(":url_image_artiste", $url_image);
  $stmt->bindParam(":url_info_artiste", $url_info_artiste);

  $stmt->execute();

  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>C est nickel</strong> l\'ajout est OK.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>
</form>

<div class="row test4">
<?php

$db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

$data = $db->query("SELECT * FROM artiste")->fetchALL();

foreach ($data as $row) {

echo '

<section class="fiches container-fluid">
<div class="card test42" style="width: 18rem;">
    <img class="card-img-top" src="' . $row['url_image_artiste'] . '" alt="Card image cap">
    <div class="card-body">
      <p class="card-text"><h2><b>' . $row['nom_artiste'] . '</b></h2></p>
      <a href="'.$row['url_info_artiste'].'" class="btn btn-outline-primary mt-2" target="_blank">À propos</a>
      
    </div>
</div>
</section>';
}
 ?>

</div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
   
</body>

</html>