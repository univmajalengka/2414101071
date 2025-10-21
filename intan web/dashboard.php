<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard CRUD</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

  <div class="mx-auto max-w-7xl py-10 px-4">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-10 gap-4">
      <a href="index.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">
        Ke Home
      </a>
      <h1 class="text-2xl font-bold text-center">Dashboard CRUD</h1>
      <a href="create.php" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">
        Tambah Data
      </a>
    </div>

    <?php
    include 'db.php';
    $sql = "SELECT * FROM produk ORDER BY created_at DESC";
    $result = $conn->query($sql);
    ?>

    <!-- Data Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="border border-gray-200 rounded-xl overflow-hidden shadow-lg bg-white hover:shadow-xl transition duration-300">
            <!-- Gambar Produk -->
            <img
              src="gambar/<?= htmlspecialchars($row['gambar']) ?>"
              alt="<?= htmlspecialchars($row['nama']) ?>"
              class="w-full h-56 object-cover" />

            <!-- Konten Produk -->
            <div class="p-4 space-y-2">
              <h2 class="font-bold text-lg text-gray-900"><?= htmlspecialchars($row['nama']) ?></h2>
              <p class="text-sm text-gray-600"><?= htmlspecialchars($row['harga']) ?></p>

              <div class="flex gap-2 pt-4">
                <a href="update.php?id=<?= urlencode($row['id']) ?>"
                   class="flex-1 text-center bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                  Edit
                </a>
                <a href="delete.php?id=<?= urlencode($row['id']) ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                   class="flex-1 text-center bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                  Hapus
                </a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="col-span-full text-center text-gray-500">Belum ada data!</p>
      <?php endif; ?>
    </div>

    <?php $conn->close(); ?>
  </div>

</body>
</html>
