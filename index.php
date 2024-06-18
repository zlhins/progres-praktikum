<?php
include "tampilkan_data.php";
include "koneksi.php";

$data_edit = isset($_GET['id']) ? mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = " . $_GET['id'])) : null;

// Bagian untuk pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';
if ($search != '') {
    $query = "SELECT * FROM mahasiswa WHERE prodi LIKE '%$search%'";
    
} else {
    $query = "SELECT * FROM mahasiswa";
    
}
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
    <div class="span9" id="content">
        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Input Data Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action="<?php echo isset($data_edit['id']) ? 'edit_data.php?id=' . $data_edit['id'] . '&proses=1' : 'percobaan8.php'; ?>" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Input Data Mahasiswa</legend>

                                <div class="control-group">
                                    <label class="control-label" for="NPM">NAMA MAHASISWA : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge focused" id="NPM" name="nama" value="<?php echo isset($data_edit['nama_mahasiswa']) ? $data_edit['nama_mahasiswa'] : ''; ?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="NPM">NPM MAHASISWA : </label>
                                    <div class="controls">
                                        <input type="text" minlength="13" maxlength="13" class="input-xlarge focused" id="NPM" name="prodi" value="<?php echo isset($data_edit['prodi']) ? $data_edit['prodi'] : ''; ?>">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Proses</button>
                                    <button type="reset" class="btn">Batal</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Data Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <!-- BAGIAN SEARCH START -->
                        <form method="GET" action="" class="form-inline">
                            <div class="input-group">
                                <input type="text" size="13" minlength="13" maxlength="13" name="search" placeholder="Ketik NPM Mahasiswa" class="form-control" value="<?php echo $search; ?>">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </span>
                            </div>
                        </form>
                        <!-- BAGIAN SEARCH END -->
                        <table class="table" id="mahasiswaTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NPM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['id'] ?></td>
                                    <td><?php echo $data['nama_mahasiswa'] ?></td>
                                    <td><?php echo $data['prodi'] ?></td>
                                    <td><a href="index.php?id=<?php echo $data['id']; ?>">Edit</a> | <a href="hapus_data.php?id=<?php echo $data['id']; ?>">Hapus</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
