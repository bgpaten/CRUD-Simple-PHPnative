<?php

require "../config.php";
$id = $_GET["id"];

$query = "SELECT * FROM kategori WHERE id=$id";

$edit = mysqli_query($connect, $query);

// ketika tombol update di pencet
if (isset($_POST["simpan"])) {

    $idktg = htmlspecialchars($_POST["id"]);
    $kategori =  htmlspecialchars($_POST["kategori"]);

    $query = "UPDATE kategori set id='$idktg', kategori='$kategori' WHERE id=$id";

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
                <h3 class="mt-5 fw-bold">Edit Data Kategori/h3>
                <?php
                foreach ($edit as $dataedit) {
                ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ID</label>
                            <input value="<?= $dataedit["id"] ?>" type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama Kategori</label>
                            <input value="<?= $dataedit["kategori"] ?>" type="text" name="kategori" class="form-control" id="exampleInputPassword1" required>
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