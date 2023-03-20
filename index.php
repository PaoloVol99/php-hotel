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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php
    $parking = $_GET['parking'] ?? null;
    ?>

    <form action="." class="ms-2" method="GET">
        <!-- <select name="parking">
            <option value="true">Con parcheggio</option>
            <option value="false">Senza parcheggio</option>
        </select> -->
        <div class="mb-3 mt-3 form-check">
            <input class="form-check-input" type="checkbox" id="parking" name="parking" value="yes">
            <label class="form-check-label" for="parking">Parcheggio</label>
        </div>
        <button class="btn btn-success mb-5" type="submit">Filtra</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro</th>
            </tr>
            <?php 
            foreach ($hotels as $hotel) :
                if ($parking === 'yes' && $hotel['parking'] || $parking !== 'yes') {
            ?>
                    <tr>
                        <?php 
                        foreach ($hotel as $key => $data) :
                            if ($key === 'name') {
                                ?>
                                    <th scope="row"> <?php echo $data ?></th>   

                                <?php     
                            } else if ($key === 'parking') {
                                ?>
                                    <td style="color: <?php echo ($data) ? 'green;' : 'red;' ?>"> <?php echo ($data) ? '&check;' : '&cross;' ?> </td>
                                <?php
                            } else if ($key === 'vote') {
                                ?>
                                    <td> <?php echo $data . '/5' ?> </td>
                                <?php
                            } else if ($key === 'distance_to_center') {
                                ?>
                                    <td> <?php echo $data . ' ' . 'Km' ?> </td>
                                <?php
                            } else {
                                ?>
                                    <td> <?php echo $data ?></td>
                                <?php
                            }
                        endforeach; 
                        ?>
                    </tr>
            <?php 
                }
            endforeach;
            ?>
        </thead>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>