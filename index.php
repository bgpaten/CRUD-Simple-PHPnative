
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIJAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7ae1982935.js" crossorigin="anonymous"></script>
</head>
<!-- fitur yang di tambah -->
<!-- 1. mysqli_num_rows -->
<body>
    <div class="container">
        <h3 class="mt-5 fw-bold">PIJAR</h3>
        <p>Copyright by Ahyar Pattani @2023</p>

        <div class="row mt-5">
            <div class="col-md-3">
                <h5 class="fw-bold">Main Menu</h5>
                <ul>
                    <a href="kategori/index.php">
                        <li>Manage Categories</li>
                    </a>
                    <a href="mata_kuliah/index.php">
                        <li>Manage Mata Kuliah</li>
                    </a>
                    <a href="pengajar/index.php">
                        <li>Manage Pengajar</li>
                    </a>
                    <a href="soal/index.php">
                        <li>Manage Soal</li>
                    </a>
                </ul>
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