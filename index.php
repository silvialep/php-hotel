<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// controllo del valore parcheggio, se non è settato restituisce false senza bloccare la pagina
$parcheggio = $_GET['parcheggio'] ?? 'false';

// if($parcheggio == 'checked') {
//     $parcheggio = true;
// }

$filteredHotels = $hotels;


if($parcheggio == 'OK') {
    
    $tempFilteredHotels = [];

    foreach($hotels as $singleHotel) {
        if($singleHotel['parking'] == true) {
            $tempFilteredHotels[] = $singleHotel;
        }
    }

    $filteredHotels = $tempFilteredHotels;
    
}

if ($parcheggio == 'NO') {

    $tempFilteredHotels = [];

    foreach ($hotels as $singleHotel) {
        if ($singleHotel['parking'] == false) {
            $tempFilteredHotels[] = $singleHotel;
        }
    }

    $filteredHotels = $tempFilteredHotels;

} 

// controllo del valore voto, se non è settato restituisce false senza bloccare la pagina
$voto = $_GET['voto'] ?? 0;


if($voto > 0) {

    $tempFilteredHotels = [];

    // $filteredVoteHotels = $filteredHotels;

    foreach ($filteredHotels as $singleHotel) {
        if ($singleHotel['vote'] == $voto) {
            $tempFilteredHotels[] = $singleHotel;
        }
    }

    $filteredHotels = $tempFilteredHotels;

}

// for($i = 0; $i < count($hotels); $i++) {
//     if($hotels[$i]['parking'] == true) {
//         $hotels[$i]['parking'] = $parkingOk;
//     } else {
//         $hotels[$i]['parking'] = $noParking;
//     }
// }

// var_dump($hotels);

?>



<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h1>Hotels</h1>
    <div style="display: inline-block; padding: 20px;">
        <h3>Scegli il parcheggio</h3>
        <form action="index.php" method="GET">
            <input type="radio" name="parcheggio" value="OK" id="parcheggioOK">
            <label for="parcheggioOK">OK</label>
            <input type="radio" name="parcheggio" value="NO" id="parcheggioNO">
            <label for="parcheggioNO">NO</label>
            <!-- <input type="submit" value="Submit"> -->
            <!-- </form>
    </div>
    <div style="display: inline-block; padding: 20px;"> -->
            <h3>Scegli il voto</h3>
            <!-- <form action="index.php"> -->
            <input type="radio" name="voto" value="1" id="voto1">
            <label for="voto1">1</label>
            <input type="radio" name="voto" value="2" id="voto2">
            <label for="voto2">2</label>
            <input type="radio" name="voto" value="3" id="voto3">
            <label for="voto3">3</label>
            <input type="radio" name="voto" value="4" id="voto4">
            <label for="voto4">4</label>
            <input type="radio" name="voto" value="5" id="voto5">
            <label for="voto5">5</label>
            <input type="submit" value="Submit">
        </form>
    </div>

    <pre>
        Output del form
        Filtro parcheggio: <?php echo $parcheggio ?>
        Filtro voto: <?php echo $voto ?>
    </pre>

    <table class="table">
        <thead>
            <?php

            foreach ($hotels[0] as $hotelProperty => $value) {
            ?>

                <th scope="col"><?php echo $hotelProperty ?></th>

            <?php
            }
            ?>
        </thead>
        <tbody>
            <?php


            foreach ($filteredHotels as $hotel) {

                echo "<tr>";

                foreach ($hotel as $item => $value) {

                    if ($item == 'parking') {
                        if ($value == true) {
                            echo "<td>OK</td>";
                        } else {
                            echo "<td>NO</td>";
                        }
                    } else {
                        echo "<td>{$value}</td>";
                    }
                }

                echo "</tr>";
            }

            ?>
        </tbody>
    </table>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>


<!-- 
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->