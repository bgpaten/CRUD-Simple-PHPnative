<?php

require "../config.php";
$id = $_GET["id"];

$query1 = "SELECT * FROM mata_kuliah WHERE id=$id";
$query2 = "SELECT * FROM kategori WHERE id=$id";
$query3 = "SELECT * FROM pengajar WHERE id=$id";

$detail1 = mysqli_query($connect, "$query1");
$detail2 = mysqli_query($connect, "$query2");
$detail3 = mysqli_query($connect, "$query3");

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
                <h3 class="mt-5 fw-bold">Detail Data Mata Kuliah</h3>
                <img src="../../img/animeini.png" alt="" width="300">
                <div class="card text-bg-dark" style="width: 18rem;">
                    <div class="card-header">
                        Detail
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach ($detail1 as $matkul) {
                        ?>
                            <li class="list-group-item">Kode : <?= $matkul["kode"] ?></li>
                            <li class="list-group-item">Nama Matkul : <?= $matkul["nama_matkul"] ?></li>
                            <li class="list-group-item">Jumlah Peserta : <?= $matkul["jumlah_peserta"] ?></li>
                            <?php
                            foreach ($detail2 as $kat) {
                                if ($kat["id"] == $matkul["kategori_id"]) {
                            ?>
                                    <li class="list-group-item">Kategori : <?= $kat["kategori"] ?></li>
                                <?php
                                }
                            }

                            foreach ($detail3 as $peng) {
                                if ($peng["id"] == $matkul["pengajar_id"]) {
                                ?>
                                    <li class="list-group-item">Pengajar : <?= $peng["nama"] ?></li>

                        <?php
                                }
                            }
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