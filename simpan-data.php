<?php
    include 'koneksi.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tanggal = $_POST['tanggal'];
        $id_sales = $_POST['id_sales'];
        $id_produk = $_POST['id_produk'];
        $nama_lead = $_POST['nama_lead'];
        $no_wa = $_POST['no_wa'];
        $kota = $_POST['kota'];
        $id_user = 1;

        $stmt = $conn -> prepare("INSERT INTO leads (tanggal, id_sales, id_produk, no_wa, nama_lead, kota, id_user) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("siisssi", $tanggal, $id_sales, $id_produk, $no_wa, $nama_lead, $kota, $id_user);
        $stmt -> execute();

        $stmt -> close();
        $conn -> close();

        header("Location: tampil-data.php");
        exit();
    }
?>