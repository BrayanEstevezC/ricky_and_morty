<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="icon" href="icon.png">
  <link rel="stylesheet" href="personajes.css">
  <script src="https://kit.fontawesome.com/8ecd014e5f.js" crossorigin="anonymous"></script>
  <title>Personajes</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg border border-dark ">
    <div class="container-fluid">
      <a href="index.php"><img src="rick.svg" alt="Logo" width="150" style="margin-left: 30px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav " style="margin-left:30px;">
          <a class="nav text" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i>Home</a>
          <a class="nav text" href="personajes.php"><i class="fa-solid fa-user"></i> Personajes</a>
          <a class="nav text" href="episodios.php"><i class="fa-solid fa-play"></i> Episodios</a>
          <a class="nav text"></a>
        </div>
      </div>
    </div>
  </nav>
  <div class="Fondo">
    <div class="container text-center">
      <h2><br> Personajes <br></h2>
      <div class="row g-3 text-center justify-content-center">
        <?php
        require("funciones.php");
        $pages = ApiConsulta("https://rickandmortyapi.com/api/character");
        for ($i = 1; $i <= $pages->info->pages; $i++) {
          $personajes = ApiConsulta("https://rickandmortyapi.com/api/character/?page=" . $i);

          foreach ($personajes->results as $personaje) {
            if ($personaje->gender == "Male") {
              $personaje->gender = "Hombre";
            } elseif ($personaje->gender == "Female") {
              $personaje->gender = "Mujer";
            } else {
              $personaje->gender = "Desconocido";
            }
            $status = "Estatus: " . $personaje->status;
            $gender= "Genero: " . $personaje->gender;
            $type= "Tipo: " . $personaje->type;
            $origin= "Origen: " . $personaje->origin->name;
            $location= "Locación: " . $personaje->location->name;
            card($personaje->image, $personaje->name, $gender, $status, $type, $origin, $location);
          }
        }

        ?>
      </div>
    </div>



  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>