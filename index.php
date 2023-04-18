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

$hotelIndex = 0;
$parkingOk = 'OK';
$noParking = 'NO';

for($i = 0; $i < count($hotels); $i++) {
    if($hotels[$i]['parking'] == true) {
        $hotels[$i]['parking'] = $parkingOk;
    } else {
        $hotels[$i]['parking'] = $noParking;
    }
}
// $hotels[$hotelIndex]['parking'] = $parkingOk;
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
    <div style="display: inline-block; padding: 20px;">
        <h3>Scegli il parcheggio</h3>
            <form action="index.php">
            <input type="radio" name="parcheggio" value="OK" id="parcheggio">
            <label for="parcheggio">OK</label>
            <input type="radio" name="parcheggio" value="NO" id="parcheggio">
            <label for="parcheggio">NO</label>
            <!-- <input type="submit" value="Submit"> -->
        <!-- </form>
    </div>
    <div style="display: inline-block; padding: 20px;"> -->
            <h3>Scegli il voto</h3>
        <!-- <form action="index.php"> -->
            <input type="radio" name="voto" value="1" id="voto">
            <label for="voto">1</label>
            <input type="radio" name="voto" value="2" id="voto">
            <label for="voto">2</label>
            <input type="radio" name="voto" value="3" id="voto">
            <label for="voto">3</label>
            <input type="radio" name="voto" value="4" id="voto">
            <label for="voto">4</label>
            <input type="radio" name="voto" value="5" id="voto">
            <label for="voto">5</label>
            <input type="submit" value="Submit">
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome Hotel</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php


            foreach($hotels as $hotel) {
                foreach($hotel as $item => $value) {
                    ?>

                    <td><?php echo $value?></td>


                        
                    <?php
                    }
                ?>
                
            </tr>
                
            <?php
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