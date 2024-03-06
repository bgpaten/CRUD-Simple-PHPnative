<?php
require "../config.php";
session_start();

// menampilkan data relasi tabel kategori dengan tabel berita
// menyeleksi field dari tabel kategori yang diambil fieldnya itu hanya nama_kategori
$pengajar = mysqli_query($connect, "SELECT * FROM  pengajar");

if (isset($_GET['cari'])) {
    $search = $_GET['cari'];
    $cari = "SELECT kategori.nama_kategori, berita. * FROM berita
    INNER JOIN kategori ON berita.kategori_id = kategori.id
    WHERE judul LIKE '%$search%'
    OR nama_kategori LIKE '%$search%'";

    $berita = mysqli_query($connect, $cari);

    if (mysqli_num_rows($berita) == 0) {
        $error == true;
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
    <?php
    if (isset($_SESSION['status'])) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>" . $_SESSION['status'] . "</strong> Data berhasil ditambahkan !.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";

        session_destroy();
    } elseif (isset($_SESSION['status_edit'])) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>" . $_SESSION['status_edit'] . "</strong> Data berhasil diedit !.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    //   session dihapus
    session_destroy();



    ?>
    <div class="container-fluid px-5 mt-5">
        <h3 class="fw-bold">PIJAR</h3>
        <p>Copyright by Ahyar Pattani @2023</p>
        <div class="row mt-5">
            <div class="col-md-3">
                <h5 class="fw-bold">Main Menu</h5>
                <ul>
                    <a href="../kategori/index.php">
                        <li>Manage Categories</li>
                    </a>
                    <a href="../mata_kuliah/index.php">
                        <li>Manage Mata Kuliah</li>
                    </a>
                    <a href="index.php">
                        <li>Manage Pengajar</li>
                    </a>
                    <a href="../soal/index.php">
                        <li>Manage Soal</li>
                    </a>
                </ul>
            </div>
            <div class="col-md-9">
                <h4 class="fw-bold">Data Pengajar</h4>
                <form class="row float-end row-cols-lg-auto g-2 align-items-center" method="get">
                    <div class="col-12">
                        <div class="form-check pb-5">
                            <img src="../../img/animehmm.png" alt="" width="100">
                            <input name="cari" type="text" class="form-control mb-1" placeholder="cari di sini">
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-search"></i> Cari</button>
                    </div>
                </form>
                <a href="tambah.php">
                    <button class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i> Tambah Data
                    </button>
                </a>
                <div class="col">
                    <img src="../../img/animengintip.png" alt="" width="200">
                </div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengajar as $data) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $data["nama"] ?></td>
                                <td><?= $data["gender"] == 'l' ? "Laki-Laki" : "Perempuan" ?></td>
                                <td><?php
                                    // batasi tampilan string dari deskripsi, klw di atas 100, baru nampil [.....]
                                    // strlen itu untuk menghitung banyaknya jumlah string
                                    // format penulisan substr(data_string, mulai dari str ke berapa, sampai str ke berapa)
                                    if (strlen($data['alamat']) > 100) echo substr($data['alamat'], 0, 100) . '...';
                                    else echo $data['alamat'];
                                    ?></td>
                                <td>
                                    <a href="detail.php?id=<?= $data["id"] ?>" style="text-decoration: none;">
                                        <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="edit.php?id=<?= $data["id"] ?>" style="text-decoration: none;">
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                    <a href="hapus.php?id=<?= $data["id"] ?>" onclick="return confirm('Apakah anda yakin data ini akan dihapus ?')" style="text-decoration: none;">
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                        <?php
                        if (isset($error)) {
                            echo "<tr><td colspan='5' class='text-center text-muted'>
                            data tidak ditemukan
                            </td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>