<?php
    include "connection.php";
    session_start();

    if (!$_SESSION['isLoggedIn']) {
        header("location: login.php");
    }

    $id = $_GET['id'];
    
    $dbh = $koneksi->prepare("select * from buku where id = ?");

    $dbh->execute([$id]);

    if($dbh->rowCount()==1)
    {
        $data = $dbh->fetch(PDO::FETCH_ASSOC);
        ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Form Edit Buku</h4>
                    </div>
                    <div class="card-body">
                        <form action="aksi_edit.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" />

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" value="<?php echo isset($data['judul']) ? $data['judul'] : ''; ?>" required />
                            </div>

                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="number" name="tahun" id="tahun" class="form-control" value="<?php echo isset($data['tahun']) ? $data['tahun'] : ''; ?>" required />
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <?php
    }
    else
    {
        echo "<div class='alert alert-danger mt-3'>Data tidak ditemukan</div>";
    }
    ?>

    

