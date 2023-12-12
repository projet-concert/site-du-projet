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
        <img src="images/logo.png" alt="LOGO" />
        <h1 class="ms-4">Gerez vos artistes</h1>
        <div class="mb-4 me-5">
          <label for="moteurDeRecherche" class="form-label"></label>
          <input
            type="text"
            id="moteurDeRecherche"
            class="form-control"
            placeholder="Effectuez une recherche"
          />
      </header>
      <main>
        <section class="filtres">
          <h3>Filtres</h3>
          <button id="btn-default" class="btn btn-outline-primary mt-2">
            Trier au plus récent
          </button>
          <br>
          <button id="btn-artiste" class="btn btn-outline-success mt-2">
            Trier par artiste
          </button>
          <br>
          <br>
          <input
            type="text"
            id="keyword"
            name="keyword"
            class="form-control mt-2"
            placeholder="Entrez votre artiste"
          />
          <br>
          <input type="month" id="dateChoix" name="dateChoix" class="form-control mt-2" />
        </section>
        <form action="page_label_bis.php" method="post">
        <section class="fiches container-fluid">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://thumbs.dreamstime.com/b/estampille-d-exemple-28420393.jpg"
              alt="Card image cap">
            <div class="card-body">
              <input type="text" name="nom_concert" id="nom_concert" placeholder="Entrez le nom du concert" 
                class="form-control mt-2" required />
              <br>
              <h2><input type="date" id="date" name="date" class="form-control mt-2"
                  placeholder="Entrez la date du concert" required /></h2>
              <br>
              <input type="time" id="heure" name="heure" class="form-control mt-2"
                placeholder="Entrez l'heure du concert" required />
              <br>
              <input type="text" id="url_image" name="url_image" class="form-control mt-2" pattern="https://.*"
                placeholder="Entrez l'image du concert" required />
              <br>
              <input type="select" id="salle_concert" name="salle_concert" class="form-control mt-2"
                placeholder="choisissez le nom de la salle" required />
              <br>
              <input type="select" id="artiste" name="artiste" class="form-control mt-2"
                placeholder="choisissez le nom de l'artiste" required />
              <br>
              <input type="select" id="theme" name="theme" class="form-control mt-2"
                placeholder="choisissez 'rap' 'rock' ou 'electro'" required />
              <br>
              <input type="text" id="sponsor" name="sponsor" class="form-control mt-2"
                placeholder="Renseigner les sponsors" required />
              <input type="submit" class="btn btn-outline-primary mt-2" value="Ajouter">
            </div>
          </div>
      </section>

      <?php

  if (isset($_POST["nom_concert"]) && isset($_POST["date"]) && isset($_POST["heure"]) && isset($_POST["url_image"]) && isset($_POST["salle_concert"]) && isset($_POST["artiste"]) && isset($_POST["theme"])&& isset($_POST["sponsor"])){
  $nom_concert = $_POST["nom_concert"];
  $date = $_POST["date"];
  $heure = $_POST["heure"];
  $url_image = $_POST["url_image"];
  $salle_concert = $_POST["salle_concert"];
  $rtiste_concert = $_POST["artiste"];
  $theme = $_POST["theme"];
  $sponsor = $_POST["sponsor"];


  $db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

  $stmt = $db->prepare("INSERT INTO concert (nom_concert, date, heure, url_image, salle_concert, artiste, theme, sponsor) VALUES (:nom_concert, :date, :heure, :url_image, :salle_concert, :artiste, :theme)");
  $stmt->bindParam(":nom_concert", $nom_concert);
  $stmt->bindParam(":date", $date);
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

      <div class="row">
<?php

$db = new PDO("mysql:host=localhost;dbname=projet_concert;charset=utf8mb4", "root", "");

$data = $db->query("SELECT * FROM concert")->fetchALL();

foreach ($data as $row) {
  echo '
  <div class="card text-center" style="width: 28em;">
  <img class="card-img-top" src="'.$row['url_image'].'" alt="Card image cap">
  <div class="card-body">
    <p class="card-text"><h2>Nom du Concert : </h2></p>
    <p>'.$row['nom_concert'].'</p>
    <br>
    <h2>Date du concert:</h2>
      <p>'.$row['date'].'<p>
    <br>
    <h2>Heure du concert:</h2>
      <p>'.$row['heure'].'<p>
    <br>
    <h2>Listes des sponsors :</h2>
   <p>'.$row['sponsor'].'</p>
    <br>
    <h2>Nom de la salle :</h2>
    <p>'.$row['salle_concert'].'</p>
    <br>
    <h2>Nom de l\'artiste :</h2>
      <p>'.$row['artiste'].'<p>
    <br>
    <h2>Thème des couleurs :</h2>
      <p>'.$row['theme'].'<p>
    <br>
    <input
   type="button"
   name="btnModifier"
   id="btnModifier"
   class="btn btn-primary btn-lg"
   value="Modifier"
   />
    <input
   type="button"
   name="btnSuprimer"
   id="btnSuprimer"
   class="btn btn-secondary btn-lg"
   value="Suprimer"
   />
  </div>
</div>';
}
  
  ?>
  
    <section class="fiches container-fluid">
        <div class="card text-center" style="width: 28em;">
            <img class="card-img-top" src="https://www.ccc-lyon.com/sites/congres/files/styles/lfe_home_slider/public/2021-06/2-gradins-pleins-quentin-lafont.jpg?itok=6Kw1rk6r" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><h2>Nom du Concert : </h2></p>
              <p>Binks to binks</p>
              <br>
              <h2>Date du concert:</h2>
                <p>15 Décembre<p>
              <br>
              <h2>Heure du concert:</h2>
                <p>20H30<p>
              <br>
              <h2>Listes des sponsors :</h2>
             <p>Universal</p>
             <p>Skyrock</p>
              <br>
              <h2>Nom de la salle :</h2>
              <p>Le dôme</p>
              <br>
              <h2>Nom de l'artiste :</h2>
                <p>Ninho<p>
              <br>
              <h2>Nom des sponsors :</h2>
                <p>Universal<p>
                <p>Skyrock<p>
              <br>
              <h2>Thème des couleurs :</h2>
                <p>Rap<p>
              <br>
              <input
             type="button"
             name="btnModifier"
             id="btnModifier"
             class="btn btn-primary btn-lg"
             value="Modifier"
             />
              <input
             type="button"
             name="btnSuprimer"
             id="btnSuprimer"
             class="btn btn-secondary btn-lg"
             value="Suprimer"
             />
            </div>
        </div>
      </section>
    </main>
    <script type="module" src="event.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>