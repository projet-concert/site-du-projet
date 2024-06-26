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
      <h1 class="ms-4">Gérez vos salles</h1>
    </header>
    <div class="container alignement">
    <form action="page_ajout_salle.php" method="post">
    
      <section class="fiches container-auto">
        <div class="row blabla">
      <div class="col-md-12">
          <div class="card mb-3">
            <img class="card-img-top" src="https://thumbs.dreamstime.com/b/estampille-d-exemple-28420393.jpg"
              alt="Card image cap">
            <div class="card-body">
              <input type="text" name="url_image_concert" id="url_image_concert" placeholder="Url de votre image" pattern="https://.*"
                class="form-control mt-2" required />
              <br>
              <h2><input type="text" id="nom_salle" name="nom_salle" class="form-control mt-2"
                  placeholder="Entrez le nom de votre salle" required /></h2>
              <br>
              <input type="text" id="ville" name="ville" class="form-control mt-2"
                placeholder="Entrez la ville de votre salle" required />
              <br>
              <input type="int" id="code_postal" name="code_postal" class="form-control mt-2"
                placeholder="Entrez le code postal" required />
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

  if (isset($_POST["nom_salle"]) && isset($_POST["ville"]) && isset($_POST["code_postal"]) && isset($_POST["url_image_concert"])){
    $nom_salle = $_POST["nom_salle"];
    $ville = $_POST["ville"];
    $code_postal = $_POST["code_postal"];
    $url_image_concert = $_POST["url_image_concert"];

    $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

    $stmt = $db->prepare("INSERT INTO salle_concert (nom_salle, ville, code_postal, url_image_concert) VALUES (:nom_salle, :ville, :code_postal, :url_image_concert)");
    $stmt->bindParam(":nom_salle", $nom_salle);
    $stmt->bindParam(":ville", $ville);
    $stmt->bindParam(":code_postal", $code_postal);
    $stmt->bindParam(":url_image_concert", $url_image_concert);

    $stmt->execute();

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>C est nickel</strong> l\'ajout est OK.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }



  ?>
  </form>



<div class="row">
<?php

$db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

$data = $db->query("SELECT * FROM salle_concert")->fetchALL();

foreach ($data as $row) {



 echo '
         <section class="fiches2 container-fluid">
          <div class="card test2" style="width: 20rem;">
            <img class="card-img-top"
              src="'.$row['url_image_concert'].'"
              alt="Card image cap">
            <div class="card-body">
              <p class="card-text">
              <h2>'.$row['nom_salle'].'</h2>
              </p>
              <br>
              <p>Ville : '.$row['ville'].'</p>
              <p>Code postal : '.$row['code_postal'].'</p>
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