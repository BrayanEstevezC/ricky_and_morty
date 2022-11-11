<?php
function ApiConsulta($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $head = curl_exec($ch);
    curl_close($ch);
    return $json = json_decode($head);
}
function card($img, $title, $des, $status, $type, $origin, $location)
{
    echo '<div class="col col-12 col-md-6 col-lg-6 align-self-center justify-content-center" style="width: 45vh;">
        <div class="card">
            <img src="' . $img . '" alt="Ventas" class="card-img-top align-self-center" style="height: 28vh; width: 100%;" />
            <div class="card-body">
                <h5 class="card-title style="font-family: RickAndMorty;""><b>' . $title . '</b></h5>
                <h6 class="card-text">' . $status . '</h6>
                <h6 class="card-text">' . $des . '</h6>
                <h6 class="card-text">' . $type . '</h6>
                <h6 class="card-text">' . $origin . '</h6>
                <h6 class="card-text">' . $location . '</h6>
            </div>
        </div>
    </div>';
}
function personajeAleatorio($limit)
{
    $personajes = ApiConsulta("https://rickandmortyapi.com/api/character");
    for ($i = 0; $i < $limit; $i++) {
        $personaje = ApiConsulta("https://rickandmortyapi.com/api/character/" . random_int(1, $personajes->info->count));
        if ($personaje->gender == "Male") {
            $personaje->gender = "Hombre";
        } elseif ($personaje->gender == "Female") {
            $personaje->gender = "Mujer";
        } else {
            $personaje->gender = "Desconocido";
        }
        $status = "Estatus: " . $personaje->status;
        $gender = "Genero: " . $personaje->gender;
        $type = "Tipo: " . $personaje->type;
        $origin = "Origen: " . $personaje->origin->name;
        $location = "Locación: " . $personaje->location->name;
        card($personaje->image, $personaje->name, $gender, $status, $type, $origin, $location);
    }
}
