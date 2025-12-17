<?php
include 'koneksi.php';

// TAMBAH DATA
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $deskripsi = $_POST['deskripsi'];

  mysqli_query($conn, "INSERT INTO produk VALUES('', '$nama', '$harga', '$deskripsi')");
  header("Location: produk.php");
}

// HAPUS DATA
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");
  header("Location: produk.php");
}

// AMBIL DATA EDIT
$edit = false;
if (isset($_GET['edit'])) {
  $edit = true;
  $id = $_GET['edit'];
  $dataEdit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'"));
}

// UPDATE DATA
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $deskripsi = $_POST['deskripsi'];

  mysqli_query($conn, "UPDATE produk SET 
    nama='$nama',
    harga='$harga',
    deskripsi='$deskripsi'
    WHERE id='$id'
  ");

  header("Location: produk.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>CRUD Produk Wisata</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>CRUD Produk Wisata Dieng</h1>
</header>

<div class="container">

  <!-- FORM -->
  <div class="box">
    <h2><?= $edit ? 'Edit Produk' : 'Tambah Produk' ?></h2>

    <form method="post">
      <?php if ($edit): ?>
        <input type="hidden" name="id" value="<?= $dataEdit['id'] ?>">
      <?php endif; ?>

      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" required
          value="<?= $edit ? $dataEdit['nama'] : '' ?>">
      </div>

      <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" required
          value="<?= $edit ? $dataEdit['harga'] : '' ?>">
      </div>

      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi"><?= $edit ? $dataEdit['deskripsi'] : '' ?></textarea>
      </div>

      <?php if ($edit): ?>
        <button type="submit" name="update" class="btn-edit">Update</button>
      <?php else: ?>
        <button type="submit" name="simpan" class="btn-add">Simpan</button>
      <?php endif; ?>
    </form>
  </div>

  <!-- TABEL -->
  <div class="box">
    <h2>Data Produk</h2>
    <table>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>

      <?php
      $no = 1;
      $result = mysqli_query($conn, "SELECT * FROM produk");
      while ($row = mysqli_fetch_assoc($result)) :
      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td>Rp <?= number_format($row['harga']) ?></td>
        <td><?= $row['deskripsi'] ?></td>
        <td>
          <a href="?edit=<?= $row['id'] ?>">
            <button class="btn-edit">Edit</button>
          </a>
          <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus data?')">
            <button class="btn-delete">Hapus</button>
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>

</div>

<footer>
  © 2025 CRUD Wisata
</footer>

</body>
</html>
