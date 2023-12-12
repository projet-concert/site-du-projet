<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Gerer vos concerts</title>
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
        <h1 class="ms-4">Gérez vos salles</h1>
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
          <button id="btn-date" class="btn btn-outline-secondary mt-2">
            Trier par artiste
          </button>
          <br>
          <button id="btn-artiste" class="btn btn-outline-success mt-2">
            Trier par prix
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
    <section class="fiches container-fluid">
        <div class="card text-center" style="width: 28em;">
            <img class="card-img-top" src="https://www.ccc-lyon.com/sites/congres/files/styles/lfe_home_slider/public/2021-06/2-gradins-pleins-quentin-lafont.jpg?itok=6Kw1rk6r" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><h2>Salle de Spéctacle : </h2></p>
              <p><strong>Le dôme</strong> Marseille 13015</p>
              <br>
              <h2>Liste des Artistes:</h2>
                <p>Ninho<p>
              <br>
              <h2>Date et Heure : </h2>
                <p>Vendredi 15 Décembre à 20H30<p>
              <br>
              <h2>Listes des sponsors :</h2>
             <p>Universal</p>
             <p>Skyrock</p>
              <br>
              <h2>Choix du thème :</h2>
              <p>Rap</p>
              <br>
              <button type="button" class="btn btn-primary btn-lg">Modifier</button>
              <button type="button" class="btn btn-secondary btn-lg">Suprimer</button>
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
