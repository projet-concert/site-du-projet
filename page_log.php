<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Authentification</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="Style_Header.css" />
  </head>
  <body>
    <div class="container">
      <header>
        <a href="main.php"><img src="images/logo.png" alt="LOGO" /></a>
        <h1 class="ms-4">App Concerts</h1>
        <button id="btn-default" class="btn btn-outline-primary me-5 pr-5">
          Par défaut
        </button>
      </header>
      <form action="page_log.html" method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label"
            >Adresse e-mail</label
          >
          <input
            type="email"
            class="form-control w-75 p-3"
            id="email"
            name="email"
            placeholder="Veuillez renseigner votre adresse e-mail."
          />
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label"
            >Mot de passe</label
          >
          <input
            type="password"
            class="form-control w-75 p-3"
            id="password"
            name="password"
            placeholder="Veuillez renseigner votre mot de passe."
          />
        </div>
        <button class="btn btn-primary btn-lg md-4" id="btn-SeConnecter">
          Me connecter
        </button>
      </form>
    </div>

    <script>
      src =
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js";
      integrity =
        "sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL";
      crossorigin = "anonymous";
    </script>
  </body>
</html>
