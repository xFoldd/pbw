<?php
    session_start();
    if (!$_SESSION['isLoggedIn']) {
        header("location: login.php");
        exit();
    }
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Menyertakan Bootstrap CSS yang terbaru -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar atau Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Set1awan Store</a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center">Halo, <?php echo $_SESSION['username']; ?>!</h2>
                        <p class="card-text text-center">Selamat datang di halaman utama kami.</p>
                        
                        <div class="text-center mb-3">
                            <p>Username Anda: <strong><?php echo $_SESSION['username']; ?></strong></p>
                            <p>User ID Anda: <strong><?php echo $_SESSION['userid']; ?></strong></p>
                        </div>

                        <div class="text-center">
                            <a href="logout.php" class="btn btn-danger btn-lg">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <?php 
    $dbh = $koneksi->query("select * from buku WHERE isdel = 0");
    $bukus = $dbh->fetch(PDO::FETCH_ASSOC);
    ?>
        <!-- Tabel Output -->
        <div class="row justify-content-center mt-4 w-100">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Data Buku</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Tahun Terbit</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    while ($bukus = $dbh->fetch(PDO::FETCH_ASSOC)) 
                                    {
                                ?>
                                <tr>
                                    <th><?php echo $no ?></th>
                                    <td><?php echo $bukus['judul'] ?></td>
                                    <td><?php echo $bukus['tahun'] ?></td>
                                    <td><a href="edit.php?id=<?php echo $bukus['id'] ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete.php?id=<?php echo $bukus['id'] ?>" class="btn btn-danger">Hapus</a></td>
                                </tr>
                                <?php
                                    $no++;
                                        }
                                    ?>
                            </tbody>
                        </table>
                        <a href="input.php" class="btn btn-primary mb-3">Tambah data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    $dbh = $koneksi->query("select * from buku");
    $bukus = $dbh->fetch(PDO::FETCH_ASSOC);
    ?>

    <a href="input.php">Tambah Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
        <?php
            $no = 1;
            while ($bukus = $dbh->fetch(PDO::FETCH_ASSOC)) 
            {
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $bukus['judul'] ?></td>
            <td><?php echo $bukus['tahun'] ?></td>
            <td>Edit | Hapus</td>
        </tr>
        <?php
        $no++;
            }
        ?>
    </table>

    <!-- Menyertakan Bootstrap JS dan dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
