<?php

require "../config.php";
$id = $_GET["id"];

$query = "SELECT * FROM pengajar WHERE id=$id";

$edit = mysqli_query($connect, $query);

// ketika tombol update di pencet
if (isset($_POST["simpan"])) {

    $nama = htmlspecialchars($_POST["nama"]);
    $gender =  htmlspecialchars($_POST["kelamin"]);
    $alamat =  htmlspecialchars($_POST["alamat"]);

    $query = "UPDATE pengajar set nama='$nama', gender='$gender', alamat='$alamat' WHERE id=$id";

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
                <h3 class="mt-5 fw-bold">Edit Data Pengajar</h3>
                <?php
                foreach ($edit as $dataedit) {
                ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input value="<?= $dataedit["nama"] ?>" type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Gender</label>
                            </div>
                            <?php
                            if ($dataedit['gender'] == 'l') {
                            ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kelamin" id="inlineRadio1" value="l" checked>
                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kelamin" id="inlineRadio2" value="p">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kelamin" id="inlineRadio1" value="l">
                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kelamin" id="inlineRadio2" value="p" checked>
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                            <textarea type="text" name="alamat" class="form-control" id="exampleInputPassword1" required><?= $dataedit["alamat"] ?></textarea>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-success">Update</button>
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