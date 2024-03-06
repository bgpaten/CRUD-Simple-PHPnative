<?php

require "../config.php";
$id = $_GET["id"];

$query1 = "SELECT * FROM mata_kuliah WHERE id=$id";
$query2 = "SELECT * FROM kategori";
$query3 = "SELECT * FROM pengajar";

$edit1 = mysqli_query($connect, $query1);
$edit2 = mysqli_query($connect, $query2);
$edit3 = mysqli_query($connect, $query3);

// ketika tombol update di pencet
if (isset($_POST["simpan"])) {

    $kode = htmlspecialchars($_POST["kode"]);
    $nama =  htmlspecialchars($_POST["nama"]);
    $jumlah =  htmlspecialchars($_POST["jumlah"]);
    $kategorid =  htmlspecialchars($_POST["kategorid"]);
    $pengajard =  htmlspecialchars($_POST["pengajard"]);

    $query = "UPDATE mata_kuliah set kode='$kode', nama_matkul='$nama', jumlah_peserta='$jumlah', kategori_id='$kategorid', pengajar_id='$pengajard' WHERE id=$id";

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
                <h3 class="mt-5 fw-bold">Edit Data Mata Kuliah</h3>
                <?php
                foreach ($edit1 as $dataedit) {
                ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kode</label>
                            <input value="<?= $dataedit["kode"] ?>" type="text" name="kode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Matkul</label>
                            <input value="<?= $dataedit["nama_matkul"] ?>" type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah Peserta</label>
                            <input value="<?= $dataedit["jumlah_peserta"] ?>" type="text" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <select name="kategorid" class="form-select" required>
                                    <option value="" hidden></option>
                                    <?php
                                    foreach ($edit2 as $datakat) {
                                    ?>
                                    <option <?php echo $datakat['id'] == $dataedit['kategori_id'] ? "selected" : ""?> 
                                    value="<?= $datakat["id"] ?>"><?= $datakat["kategori"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pengajar</label>
                            <select name="pengajard" class="form-select" required>
                                    <option value="" hidden></option>
                                    <?php
                                    foreach ($edit3 as $datapgjr) {
                                    ?>
                                    <option <?php echo $datapgjr['id'] == $dataedit['pengajar_id'] ? "selected" : ""?> 
                                    value="<?= $datapgjr["id"] ?>"><?= $datapgjr["nama"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
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