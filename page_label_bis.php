<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Gerez vos artistes</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header>
        <a href="main.php"><img src="images/logo1.png" alt="LOGO" /></a>
        <h1>Gerez vos concerts</h1>       
        <a href="page_ajout_artiste.php" class="btn btn-light mt-2">Ajouter un artiste</a>
      </header>
      <main>
      <div class="container test8">
        <form action="page_label_bis.php" method="post">
        <div class="col-md-4">
        <section class="fiches6 container-fluid">
          <div class="card" style="width: 22em;">
            <img class="card-img-top" src="https://thumbs.dreamstime.com/b/estampille-d-exemple-28420393.jpg"
              alt="Card image cap">
            <div class="card-body">
              <input type="text" name="nom_concert" id="nom_concert" placeholder="Entrez le nom du concert" 
                class="form-control mt-2" required />
              <br>
              <h2><input type="text" id="date" name="date" class="form-control mt-2"
                  placeholder="Entrez la date du concert" required /></h2>
              <br>
              <input type="text" id="heure" name="heure" class="form-control mt-2"
                placeholder="Entrez l'heure du concert" required />
              <br>
              <input type="text" id="url_image" name="url_image" class="form-control mt-2" pattern="https://.*"
                placeholder="Entrez l'image du concert" required />
              <br>
              <select class="form-select" name="salle_concert">
              <?php

              $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

              $data = $db->query("SELECT * FROM salle_concert")->fetchALL();

              foreach ($data as $row) {

              echo '
                    <option value="'.$row['id'].'">'.$row['nom_salle'].'</option>
                      ';

              }

              ?>
              </select>
              <br>
              <select class="form-select" name="artiste" aria-label="Nom d'artiste">
              <?php

                $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

                $data = $db->query("SELECT * FROM artiste")->fetchALL();

                foreach ($data as $row) {

                echo '
                      <option value="'.$row['id'].'">'.$row['nom_artiste'].'</option>
                        ';

                }

                ?>
              </select>
              <br>
              <select class="form-select" name="theme">
              <?php

                $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

                $data = $db->query("SELECT * FROM theme")->fetchALL();

                foreach ($data as $row) {

                echo '
                      <option value="'.$row['id'].'">'.$row['nom_theme'].'</option>
                        ';

                }

                ?>
              </select>
              <br>
              <input type="text" id="sponsor" name="sponsor" class="form-control mt-2"
                placeholder="Renseigner les sponsors" required />
              <input type="submit" class="btn btn-outline-primary mt-2" value="Ajouter">
            </div>
          </div>
      </section>
      </div>

      <?php

  if (isset($_POST["nom_concert"]) && isset($_POST["date"]) && isset($_POST["heure"]) && isset($_POST["url_image"]) && isset($_POST["salle_concert"]) && isset($_POST["artiste"]) && isset($_POST["theme"])&& isset($_POST["sponsor"])){
  $nom_concert = $_POST["nom_concert"];
  $date = $_POST["date"];
  $heure = $_POST["heure"];
  $url_image = $_POST["url_image"];
  $salle_concert = $_POST["salle_concert"];
  $artiste = $_POST["artiste"];
  $theme = $_POST["theme"];
  $sponsor = $_POST["sponsor"];


  $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

  $stmt = $db->prepare("INSERT INTO concert (nom_concert, date_concert, heure, url_image, salle_concert, artiste, theme, sponsor) VALUES (:nom_concert, :date_concert, :heure, :url_image, :salle_concert, :artiste, :theme, :sponsor)");
  $stmt->bindParam(":nom_concert", $nom_concert);
  $stmt->bindParam(":date_concert", $date);
  $stmt->bindParam(":heure", $heure);
  $stmt->bindParam(":url_image", $url_image);
  $stmt->bindParam(":salle_concert", $salle_concert);
  $stmt->bindParam(":artiste", $artiste);
  $stmt->bindParam(":theme", $theme);
  $stmt->bindParam(":sponsor", $sponsor);

  $stmt->execute();

  
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>C est nickel</strong> l ajout est OK.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}


    ?>
      </form>
<?php

$db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

$data = $db->query("SELECT * 
                    FROM artiste
                    INNER JOIN concert ON artiste.id = concert.artiste
                    INNER JOIN theme ON concert.theme = theme.id
                    INNER JOIN salle_concert ON concert.salle_concert = salle_concert.id")->fetchALL();

foreach ($data as $row) {
  echo '
  <section class="fiches2 container-fluid">
  <div class="col-md-4">
  <div class="card text-center" style="width: 22em;">
  <img class="card-img-top" src="'.$row['url_image'].'" alt="Card image cap">
  <div class="card-body">
    <p class="card-text"><h2>Nom du Concert : </h2></p>
    <p>'.$row['nom_concert'].'</p>
    <br>
    <h5>Date du concert:</h5>
      <p>'.$row['date_concert'].'<p>
    
    <h5>Heure du concert:</h5>
      <p>'.$row['heure'].'<p>
    
    <h5>Listes des sponsors :</h5>
    <p>'.$row['sponsor'].'</p>
    
    <h5>Nom de la salle :</h5>
    <p>'.$row['nom_salle'].'</p>

    <h5>Nom de l\'artiste :</h5>
    <p>'.$row['nom_artiste'].'<p>
    
    <h5>Thème des couleurs :</h5>
    <p>'.$row['nom_theme'].'<p>
    
    <input
   type="button"
   name="btnSuprimer"
   id="btnSuprimer"
   class="btn btn-secondary btn-lg"
   value="Suprimer"
   />
  </div>
</div>
</div>
</section>';
}
  
  ?>
  </div>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>