<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Vos concerts</title>
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
      <h1>App Concerts</h1>
      <div class="mb-4 me-5">
        <label for="moteurDeRecherche" class="form-label"></label>
        <input
          type="text"
          id="moteurDeRecherche"
          class="form-control"
          placeholder="Tapez votre titre"
        />
      </div>
      <div class="mb-2 ml-2">
      <input
          type="button"
          name="moteurDeRecherche"
          id="moteurDeRecherche"
          class="form-control"
          placeholder="Tapez votre titre"
        />
      </div>
    </header>
    <main>
      <section class="filtres">
        <h3>Filtres</h3>
        <input type="button"
        
        >
        <button id="btn-default" class="btn btn-outline-primary mt-2">
          Par défaut
        </button>
        <br>
        <button id="btn-date" class="btn btn-outline-secondary mt-2">
          Trier par date
        </button>
        <br>
        <button id="btn-artiste" class="btn btn-outline-success mt-2">
          Artiste
        </button>
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

      <!-- Fiches produits -->
      <section class="fiches container-fluid">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Festival_des_Vieilles_Charrues_2022_-_Ninho_-_041.jpg/330px-Festival_des_Vieilles_Charrues_2022_-_Ninho_-_041.jpg" alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><h2>Ninho</h2>
              <br>
              Ouai c'est Ninho
              </p>
              <button id="btn-artiste" class="btn btn-outline-primary mt-2">Voir les concerts</button>
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
