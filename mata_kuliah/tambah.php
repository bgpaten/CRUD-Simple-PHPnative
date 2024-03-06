<?php

require "../config.php";

// tangkep kiriman data dari user
$kategori = mysqli_query($connect, "SELECT * FROM  kategori");
$pengajar = mysqli_query($connect, "SELECT * FROM  pengajar");
$kode = htmlspecialchars($_POST["kode"]);
$nama = htmlspecialchars($_POST["nama"]);
$jumlah = htmlspecialchars($_POST["jumlah"]);
$kategorid = htmlspecialchars($_POST["kategorid"]);
$pengajard = htmlspecialchars($_POST["pengajard"]);
$query = "INSERT INTO mata_kuliah(kode,nama_matkul,jumlah_peserta,kategori_id,pengajar_id) VALUES ('$kode','$nama','$jumlah','$kategorid','$pengajard')";
$query2 = "SELECT * FROM mata_kuliah WHERE kode='$kode'";
$cek_kode = mysqli_query($connect, $query2);

// simpan data nya ke database
// 1. tombol simpan diklik
if (isset($_POST["simpan"])) {

    if (mysqli_num_rows($cek_kode) > 0) {
        $error = true;
    } else {
        // 2. simpan data inputan user kedalam database
        mysqli_query(
            $connect,
            "$query"
        );
        // membuat session dengan variabel super global $_Session
        // session dibaut agar dapat digunakan di kode program yang lain
        // selama session tersebut belum di hapus
        session_start();
        $_SESSION['status'] = "Horeeeee....!!";
        // 3. redirect halaman ke index.php
        header("location:index.php");
    }
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
        <div class="row ">
            <div class="col-md-5 mt-5">
                <div class="card border-info" style="width: 100%;">
                    <div class="card-body">
                        <a href="index.php"><button class="btn btn-warning btn-sm float-end mt-5"><i class="fas fa-arrow-circle-left"></i> Back</button></a>
                        <h3 class="mt-5 fw-bold">Tambah Data Kategori</h3>
                        <?php
                        // menampilkan error jika terjadi salah satu
                        if ($error == true) {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong></strong> Data yang kamu masukkan sudah ada !.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                        }
                        ?>
                        <form method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode</label>
                                <input type="text" name="kode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Matkul</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jumlah Peserta</label>
                                <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kategori</label>
                                <select name="kategorid" class="form-select" required>
                                    <option value="" hidden></option>
                                    <?php
                                    foreach ($kategori as $data1) {
                                    ?>
                                        <option value="<?= $data1["id"] ?>"><?= $data1["kategori"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Pengajar</label>
                                <select name="pengajard" class="form-select" required>
                                    <option value="" hidden></option>
                                    <?php
                                    foreach ($pengajar as $data2) {
                                    ?>
                                        <option value="<?= $data2["id"] ?>"><?= $data2["nama"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <img src="../../img/animestop.png" alt="" width="500">
                <h5 class="ms-5">Isi baek" kasian databasenya klw di edit trs</h5>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>