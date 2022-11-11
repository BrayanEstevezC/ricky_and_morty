<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" href="icon.png">
    <script src="https://kit.fontawesome.com/8ecd014e5f.js" crossorigin="anonymous"></script>
    <title>RickAndMorty</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg border border-dark ">
        <div class="container-fluid">
            <a href="index.html"><img src="rickandmorty.svg" alt="Logo" width="150" style="margin-left: 30px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav " style="margin-left:30px;">
                    <a class="nav text" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i>Home</a>
                    <a class="nav text" href="personajes.php"><i class="fa-solid fa-user"></i> Personajes</a>
                    <a class="nav text" href="episodios.php"><i class="fa-solid fa-play"></i> Episodios</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid color text-center">
        <img src="rick.gif" height="300" alt="Img">
        <p>Blog Rick And Morty </p> <br>
    </div>
    <div class="Fondo">
        <div class="container">

            <div class="row text-center">
                <p style="margin-top:16px;">Pilot</p>
            </div>
            <div class="row g-3 text-center justify-content-center">
                <?php
                    require("funciones.php");
                    $personajes=ApiConsulta("https://rickandmortyapi.com/api/episode/1");
                    foreach($personajes->characters as $personaje){
                        $json=ApiConsulta($personaje);
                        if($json->gender =="Male"){
                            $json->gender="Hombre";
                        }elseif($json->gender == "Female"){
                            $json->gender="Mujer";
                        }else{
                            $json->gender="Desconocido";
                        }
                        $text="genero: ".$json ->gender;
                        $status = "Estatus: " . $json->status;
                        $gender = "Genero: " . $json->gender;
                        $type = "Tipo: " . $json->type;
                        $origin = "Origen: " . $json->origin->name;
                        $location = "Locacion: " . $json->location->name;
                        card($json->image, $json->name, $gender, $status, $type, $origin, $location);
                    }
                ?>
            </div>
            <div class="container text-center">
            <p> Random</p> <br>
            <div class="row g-3 text-center justify-content-center">
            <?php
                personajeAleatorio(3);
            ?>
            </div>
            
            </div>
        </div>
    </div>

    <footer class="container-fluid">
        <div class="row justify-content-between">

            <div class="col">
                <img src="rickandmorty.svg" alt="Logo" width="150" style="margin-left: 30px;">
            </div>
            <div class="col text-center">
                <a href="https://rickandmortyapi.com/" style="list-style: none; text-decoration: none; color: aliceblue; font-size: 15px;">&copy Derechos sobre la api: Axel Fuhrmann 2022</a>
            </div>
            <div class="col text-center">
                <a href="https://rickandmortyapi.com/" style="list-style: none; text-decoration: none; color: aliceblue; font-size: 15px;">&copy Creado por Brayan Estevez C. </a>
            </div>
        </div>
    </footer>
    <!-- String -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>