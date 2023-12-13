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
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="container">
      <header>
        <a href="main.php"><img src="images/logo.png" alt="LOGO" /></a>
        <h1 class="ms-4">App Concerts</h1>
      </header>
      <form action="page_log.php" method="post">
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
        <input type="submit" class="btn btn-primary btn-lg md-4" value="Me connnecter">
      </form>
    </div>

    <?php

    $email = $_POST["email"];
    $pass = $_POST["password"];

    $db = new PDO('mysql:host=localhost;dbname=projet_concert;charset=utf8mb4','root','');

    $data = $db->query('SELECT * FROM user')->fetchAll() ;
    $success=false;

    foreach ($data as $row) {
        if ($row['email'] == $email and $row['mot_de_passe'] == $pass ) {
          $success = true; 
          break;
        }

      }

        if ($success and $row['role'] == 1 ) {
          header('Location: page_label_bis.php');
          } 
        elseif ($success and $row['role'] == 2 ) {
          header('Location: page_ajout_salle.php');
          } 
        else {
          echo "<br> <p class='text-center'> You have entered the wrong username or password. Please try again. </p> <br>";

        }
    ?>

    <script>
      src =
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js";
      integrity =
        "sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL";
      crossorigin = "anonymous";
    </script>
  </body>
</html>
