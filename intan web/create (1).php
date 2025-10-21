<?php
if (isset($_POST['create'])) {
  include 'db.php';

  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $gambar = $_FILES['gambar']['name'] ?? '';
  $tempGambar = $_FILES['gambar']['tmp_name'] ?? '';
  $errorUpload = $_FILES['gambar']['error'] ?? UPLOAD_ERR_NO_FILE;

  $target_dir = realpath(__DIR__ . '/gambar');
  if ($target_dir === false) {
    $target_dir = __DIR__ . '/gambar';
    if (!is_dir($target_dir)) {
      mkdir($target_dir, 0775, true);
    }
  }

  $target_file = rtrim($target_dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . basename($gambar);
  if (!is_writable($target_dir)) {
    echo "Folder tidak upload tidak diizinkan: $target_dir";
    exit;
  }

  if ($errorUpload === UPLOAD_ERR_OK && move_uploaded_file($tempGambar, $target_file)) {
    $sql = "INSERT INTO produk (nama, harga, gambar) VALUES ('$nama', '$harga', '$gambar')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Data berhasil disimpan.'); window.location.href='dashboard.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Error uploading file: " . $errorUpload;
  }

  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Data</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

  <div class="mx-auto max-w-4xl py-10 px-4">
    <!-- Header -->
    <div class="flex flex-row justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Tambah Data</h1>
      <a href="dashboard.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
        Kembali
      </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
      <form action="" method="post" enctype="multipart/form-data">
        <!-- Nama -->
        <div class="mb-4">
          <label for="nama" class="block text-sm font-medium mb-1">Nama:</label>
          <input
            type="text"
            id="nama"
            name="nama"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
            required />
        </div>

        <!-- Harga -->
        <div class="mb-4">
          <label for="harga" class="block text-sm font-medium mb-1">Harga:</label>
          <input
            type="number"
            id="harga"
            name="harga"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
            required />
        </div>

        <!-- Gambar -->
        <div class="mb-6">
          <label for="gambar" class="block text-sm font-medium mb-1">Gambar:</label>
          <input
            type="file"
            id="gambar"
            name="gambar"
            accept="image/*"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none"
            required />
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          name="create"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-200">
          Simpan
        </button>
      </form>
    </div>
  </div>

</body>
</html>
