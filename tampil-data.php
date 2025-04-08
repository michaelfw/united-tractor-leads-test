<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Data Leads</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Data Leads</h1>
            <form action="tampil-data.php" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <label for="cari_produk" class="form-label">Cari Produk</label>
                        <input type="text" id="cari_produk" name="cari_produk" class="form-control"
                                value="<?php echo isset($_GET['cari_produk']) ? htmlspecialchars($_GET['cari_produk']) : ''; ?>"
                                placeholder="Masukkan Nama Produk">
                    </div>
                    <div class="col-md-3">
                        <label for="cari_sales" class="form-label">Cari Sales</label>
                        <input type="text" id="cari_sales" name="cari_sales" class="form-control"
                                value="<?php echo isset($_GET['cari_sales']) ? htmlspecialchars($_GET['cari_sales']) : ''; ?>"
                                placeholder="Masukkan Nama Sales">
                    </div>
                    <div class="col-md-3">
                        <label for="filter_bulan" class="form-label">Filter Bulan</label>
                        <select id="filter_bulan" name="filter_bulan" class="form-control">
                            <option value="">-- Pilih Bulan --</option>
                            <option value="1" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '1') ? 'selected' : ''; ?>>Januari</option>
                            <option value="2" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '2') ? 'selected' : ''; ?>>Februari</option>
                            <option value="3" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '3') ? 'selected' : ''; ?>>Maret</option>
                            <option value="4" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '4') ? 'selected' : ''; ?>>April</option>
                            <option value="5" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '5') ? 'selected' : ''; ?>>Mei</option>
                            <option value="6" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '6') ? 'selected' : ''; ?>>Juni</option>
                            <option value="7" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '7') ? 'selected' : ''; ?>>Juli</option>
                            <option value="8" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '8') ? 'selected' : ''; ?>>Agustus</option>
                            <option value="9" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '9') ? 'selected' : ''; ?>>September</option>
                            <option value="10" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '10') ? 'selected' : ''; ?>>Oktober</option>
                            <option value="11" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '11') ? 'selected' : ''; ?>>November</option>
                            <option value="12" <?php echo (isset($_GET['filter_bulan']) && $_GET['filter_bulan'] == '12') ? 'selected' : ''; ?>>Desember</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success me-2">Cari</button>
                        <a href="tampil-data.php" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Input</th>
                        <th>Tanggal</th>
                        <th>Sales</th>
                        <th>Produk</th>
                        <th>Nama Lead</th>
                        <th>No. WhatsApp</th>
                        <th>Kota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'koneksi.php';

                        $cari_produk = isset($_GET['cari_produk']) ? $_GET['cari_produk'] : '';
                        $cari_sales = isset($_GET['cari_sales']) ? $_GET['cari_sales'] : '';
                        $filter_bulan = isset($_GET['filter_bulan']) ? $_GET['filter_bulan'] : '';

                        $query = "SELECT l.id_leads, l.tanggal, s.nama_sales, p.nama_produk, l.nama_lead, l.no_wa, l.kota
                                        FROM leads l
                                        JOIN sales s ON l.id_sales = s.id_sales
                                        JOIN produk p ON l.id_produk = p.id_produk
                                        WHERE 1=1";

                        if($cari_produk != '') {
                            $cari_produk = $conn -> real_escape_string($cari_produk);
                            $query .= " AND p.nama_produk LIKE '%$cari_produk%'";
                        }

                        if($cari_sales != '') {
                            $cari_sales = $conn -> real_escape_string($cari_sales);
                            $query .= " AND s.nama_sales LIKE '%$cari_sales%'";
                        }

                        if($filter_bulan != '') {
                            $bulan = (int) $filter_bulan;
                            $query .= " AND MONTH(l.tanggal) = $bulan";
                        }

                        $result = $conn -> query($query);

                        $no = 1;

                        if($result -> num_rows > 0) {
                            while($row = $result -> fetch_assoc()) {
                                echo "<tr>
                                        <td>$no</td>
                                        <td>{$row['id_leads']}</td>
                                        <td>{$row['tanggal']}</td>
                                        <td>{$row['nama_sales']}</td>
                                        <td>{$row['nama_produk']}</td>
                                        <td>{$row['nama_lead']}</td>
                                        <td>{$row['no_wa']}</td>
                                        <td>{$row['kota']}</td>
                                    </tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>Data tidak ditemukan</td></tr>";
                        }

                        $conn -> close();
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>