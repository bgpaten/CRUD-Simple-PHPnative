<?php

require "../config.php";
$id = $_GET["id"];

$query = "SELECT * FROM soal WHERE id=$id";

$detail = mysqli_query($connect, $query);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIJAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7ae1982935.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <a href="index.php"><button class="btn btn-warning btn-sm float-end mt-5"><i class="fas fa-arrow-circle-left"></i> Back</button></a>
                <h3 class="mt-5 fw-bold">Detail Data Soal</h3>
                <img src="../../img/animeini.png" alt="" width="300">
                <div class="card text-bg-dark" style="width: 18rem;">
                    <div class="card-header">
                        Detail
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach ($detail as $soal) {
                        ?>
                            <li class="list-group-item">Nama Soal : <?= $soal["nama"] ?></li>
                            <li class="list-group-item">Waktu Mulai : <?= $soal["tgl_mulai"] ?></li>
                            <li class="list-group-item">Waktu Selesai : <?= $soal["tgl_selesai"] ?></li>
                            <li class="list-group-item">Jenis Soal : <?= $soal["jenis_soal"] == 't' ? "Tugas" : ($soal["jenis_soal"] == 'u' ? "Ujian" : "Kuis") ?></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>