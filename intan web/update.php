<?php
include 'db.php';

$id = $_GET['id'] ?? null;
$row = null;

if ($id) {
  $sql = "SELECT * FROM produk WHERE id=$id";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
  } else {
    echo "Data tidak ditemukan!";
    exit();
  }
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $gambar = $_FILES['gambar']['name'];
  $target_dir = "gambar/";
  $target_file = $target_dir . basename($gambar);

  if ($gambar) {
    // ambil gambar lama
    $sql = "SELECT gambar FROM produk WHERE id=$id";
    $result = $conn->query($sql);
    $old = $result->fetch_assoc();
    $old_image = $old['gambar'];

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
      $sql = "UPDATE produk 
                    SET nama='$nama', harga='$harga', gambar='$gambar' 
                    WHERE id=$id";
      if ($conn->query($sql) === TRUE) {
        if ($old_image && file_exists($target_dir . $old_image)) {
          unlink($target_dir . $old_image);
        }
        echo "<script>alert(' berhasil diperbarui!');window.location.href='dashboard.php';</script>";
      } else {
        echo "Error: " . $conn->error;
      }
    } else {
      echo "Gagal upload gambar.";
    }
  } else {
    $sql = "UPDATE produk SET nama='$nama', harga='$harga' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert(' berhasil diperbarui!');window.location.href='dashboard.php';</script>";
    } else {
      echo "Error: " . $conn->error;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Data Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">
  <div class="mx-auto max-w-4xl py-10 px-4">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
      <h1 class="text-2xl font-bold">Edit Data Produk</h1>
      <a href="dashboard.php" class="bg-red-500 hover:bg-red-600 text-white rounded-lg px-4 py-2 transition">
        Kembali
      </a>
    </div>

    <!-- Form Card -->
    <div class="border border-gray-200 p-6 rounded-lg shadow bg-white">
      <form action="update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?? ''; ?>" />

        <!-- Nama -->
        <div>
          <label for="nama" class="block text-sm font-medium mb-1">Nama Produk:</label>
          <input
            type="text"
            id="nama"
            name="nama"
            value="<?php echo $row['nama'] ?? ''; ?>"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
            required />
        </div>

        <!-- harga -->
        <div>
          <label for="harga" class="block text-sm font-medium mb-1">harga:</label>
          <input
            type="number"
            id="harga"
            name="harga"
            value="<?php echo $row['harga'] ?? ''; ?>"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
            required />
        </div>

        <!-- Upload Gambar -->
        <div>
          <label for="gambar" class="block text-sm font-medium mb-1">Gambar Produk:</label>
          <input
            type="file"
            id="gambar"
            name="gambar"
            accept="image/*"
            class="w-full border border-gray-300 rounded-lg px-4 py-2"
          />
          <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>

          <!-- Gambar saat ini -->
          <?php if (!empty($row['gambar'])): ?>
            <div class="mt-4">
              <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
              <img src="gambar/<?php echo $row['gambar']; ?>" alt="Foto Produk"
                class="w-40 h-40 object-cover rounded-lg border border-gray-300 shadow" />
            </div>
          <?php endif; ?>
        </div>

        <!-- Tombol Simpan -->
        <button
          type="submit"
          name="update"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg px-6 py-2 transition">
          Perbarui
        </button>
      </form>
    </div>
  </div>
</body>

</html>
