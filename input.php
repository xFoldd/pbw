<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    

<div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <!-- Form Input -->
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">Form Input Buku</h5>
                        <form method="POST" action="input_data.php">
                            <div class="form-group mb-3">
                                <label for="exampleFormControlInput1">Judul Buku</label>
                                <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleFormControlSelect1">Tahun Terbit</label>
                                <input type="text" name="tahun" class="form-control" id="exampleFormControlInput1" >
                            </div>
                            <button type="submit" class="btn btn-primary"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                            Simpan
                            </button>
                            <a href="home.php" class="btn btn-danger">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


<form method="POST" action="input_data.php">
    Judul: <input type="text" name="judul"><br>
    Tahun Terbit: <input type="text" name="tahun"><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>