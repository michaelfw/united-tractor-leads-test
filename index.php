<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tambah Leads</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <h1>Selamat Datang di Tambah Leads</h1>
            <form action="simpan-data.php" method="POST">
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="mb-3">
                    <label for="id_produk" class="form-label">Produk</label>
                    <select id="id_produk" name="id_produk" class="form-control" required>
                        <?php
                            include 'koneksi.php';
                            
                            $result = $conn -> query("SELECT * FROM produk");

                            while($row = $result -> fetch_assoc()) {
                                echo "<option value='{$row['id_produk']}'>{$row['nama_produk']}</option>";
                            }

                            $conn -> close();
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_sales" class="form-label">Sales</label>
                    <select id="id_sales" name="id_sales" class="form-control" required>
                        <?php
                            include 'koneksi.php';
                            
                            $result = $conn -> query("SELECT * FROM sales");

                            while($row = $result -> fetch_assoc()) {
                                echo "<option value='{$row['id_sales']}'>{$row['nama_sales']}</option>";
                            }

                            $conn -> close();
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no_wa" class="form-label">No. WhatsApp</label>
                    <input type="text" class="form-control" id="no_wa" name="no_wa" required>
                </div>
                <div class="mb-3">
                    <label for="nama_lead" class="form-label">Nama Lead</label>
                    <input type="text" class="form-control" id="nama_lead" name="nama_lead" required>
                </div>
                <div class="mb-3">
                    <label for="kota" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </body> 
</html>