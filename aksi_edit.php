<?php
// Koneksi ke database
include 'connection.php'; // Pastikan file ini sudah sesuai dengan koneksi Anda

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Cek apakah key 'id', 'judul', dan 'tahun' ada di $_POST
  $id = $_POST['id'] ?? null;
  $judul = $_POST['judul'] ?? null;
  $tahun = $_POST['tahun'] ?? null;

  // Validasi input
  if (empty($judul) || empty($tahun)) {
      echo "Judul dan tahun tidak boleh kosong!";
  } else {
      // Query untuk mengupdate data
      $query = "UPDATE buku SET judul = :judul, tahun = :tahun, updated_by = :updated_by, updated_at = :updated_at WHERE id = :id";

      // Eksekusi query
      try {
          $stmt = $koneksi->prepare($query);
          $stmt->execute([
              ':judul' => $judul,
              ':tahun' => $tahun,
              ':updated_by' => 1, // Sesuaikan dengan user ID yang relevan
              ':updated_at' => date('Y-m-d H:i:s'),
              ':id' => $id,
          ]);

          echo "Data berhasil diperbarui!";
      } catch (PDOException $e) {
          echo "Terjadi kesalahan: " . $e->getMessage();
      }
  }
}
header("location:home.php");
?>
