<?php

require "../config.php";
$id = $_GET["id"];

$query = "SELECT * FROM soal WHERE id=$id";

$edit = mysqli_query($connect, $query);

// ketika tombol update di pencet
if (isset($_POST["simpan"])) {

    $nama = htmlspecialchars($_POST["nama"]);
    $mulai = htmlspecialchars($_POST["mulai"]);
    $selesai = htmlspecialchars($_POST["selesai"]);
    $soal = htmlspecialchars($_POST["soal"]);

    $query = "UPDATE soal set nama_soal='$nama', tgl_mulai='$mulai', tgl_selesai='$selesai', jenis_soal='$soal' WHERE id=$id";

    mysqli_query($connect, $query);

    session_start();
    $_SESSION['status_edit'] = "Alhamdulillah";

    header("location:index.php");
}

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
            <div class="col-md-5">
                <a href="index.php"><button class="btn btn-warning btn-sm float-end mt-5"><i class="fas fa-arrow-circle-left"></i> Back</button></a>
                <h3 class="mt-5 fw-bold">Edit Data Soal</h3>
                <?php
                foreach ($edit as $dataedit) {
                ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Soal</label>
                            <input value="<?= $dataedit["nama_soal"] ?>" type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Mulai</label>
                                <input value="<?= $dataedit["tgl_mulai"] ?>" name="mulai" type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Selesai</label>
                                <input value="<?= $dataedit["tgl_selesai"] ?>" name="selesai" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col">
                            <label for="exampleInputPassword1" class="form-label">Jenis Soal</label>
                            </div>
                            <?php
                            if ($dataedit['jenis_soal'] == 't') {
                            ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="soal" id="inlineRadio1" value="t" checked>
                                    <label class="form-check-label" for="inlineRadio1">Tugas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="soal" id="inlineRadio1" value="u">
                                    <label class="form-check-label" for="inlineRadio2">Ujian</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="soal" id="inlineRadio2" value="k">
                                    <label class="form-check-label" for="inlineRadio3">Kuis</label>
                                </div>
                            <?php
                            } elseif ($dataedit['jenis_soal'] == 'u') {
                            ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="soal" id="inlineRadio1" value="t">
                                    <label class="form-check-label" for="inlineRadio1">Tugas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="soal" id="inlineRadio1" value="u" checked>
                                    <label class="form-check-label" for="inlineRadio2">Ujian</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="soal" id="inlineRadio2" value="k">
                                    <label class="form-check-label" for="inlineRadio3">Kuis</label>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="soal" id="inlineRadio1" value="t">
                                    <label class="form-check-label" for="inlineRadio1">Tugas</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="soal" id="inlineRadio1" value="u">
                                    <label class="form-check-label" for="inlineRadio2">Ujian</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="soal" id="inlineRadio2" value="k" checked>
                                    <label class="form-check-label" for="inlineRadio3">Kuis</label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                <?php
                }
                ?>
            </div>
            <div class="col-md-7">
                <img src="../../img/animeoke.png" alt="" width="500">
                <h5 class="ms-5">Edit aja GAPAPA</h5>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>