<?php
include 'process/conSQL.php';

$username = $_SESSION["uname"];


?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load jQuery -->
    <script src="lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Load Bootstrap -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/customIndex.css">
    <title>SIM Mahasiswa</title>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-secondary">

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="#" class="nav-link active">Data Barang</a></li>

            </ul>
        </div>
    </nav>
</header>
<main class="container" role="main">
    <div class="col-md-6">
        <?php
        // Query data sesuai dengan id mahasiswa yang ingin di update
        $id = $_GET["id"];
        $query = "SELECT * FROM " . barang . " WHERE id_barang=$id";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <form action="controller/updateBarang.php" method="POST">
                <!--
                    ID mahasiswa tidak perlu ditampilkan, namun tetap kita butuhkan untuk
                    keperluan query update, sehingga tipe input menggunakan "hidden"
                    Tips :
                    Element dengan atribut hidden tetap akan muncul jika kita melakukan
                    inspect element melalui browser
                 -->
                <input type="hidden" name="id_mhs" value="<?php echo $row["id_barang"]; ?>">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $row["nama_barang"]; ?>">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="Harga" value="<?php echo $row["harga"]; ?>">
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" name="stok" value="<?php echo $row["stok"]; ?>">
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <textarea rows="3" class="form-control" name="gambar"><?php echo $row["foto"]; ?></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-warning" name="btn-update" value="Update">
                </div>
            </form>
            <?php
        } // Kurung kurawal tutup dari if
        mysqli_close($con);
        ?>
    </div>
</main>

</body>
</html>
