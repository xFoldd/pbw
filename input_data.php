<?php 
    include "connection.php";
    session_start();

    if (!$_SESSION['isLoggedIn']) {
        header("location: login.php");
        exit();
    } 

    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];

    $dbh = $koneksi->prepare("INSERT INTO buku(judul,tahun,created_by,created_at) VALUES (?,?,?,?)");

    $dbh->execute([$judul,$tahun,$_SESSION['userid'],date("Y-m-d H:i:s")]);

    header("location: home.php");