<?php
    $host = "localhost";
    $username = "root";
    $password = "123";
    $db_name = "united_tractor_leads_db";

    $conn = new mysqli($host, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
?>