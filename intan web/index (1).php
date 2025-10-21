<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko Jam Dinding Imuet</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="font-sans bg-gray-50 text-gray-800">
    <!-- Hero -->
    <section
      class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white text-center py-20"
    >
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Toko Jam Dinding</h1>
      <p class="mb-6 text-lg md:text-xl">
        Hiasi ruanganmu dengan jam dinding elegan & berkualitas
      </p>
      <a
        href="#produk"
        class="bg-white text-blue-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-100"
      >
        Lihat Koleksi
      </a>
    </section>

    <!-- Tentang -->
    <section class="py-16 px-6 max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-6">Tentang Kami</h2>
      <p class="text-gray-700 leading-relaxed">
        Kami adalah penyedia jam dinding dengan berbagai desain, mulai dari
        klasik, minimalis, hingga modern. Dengan kualitas bahan terbaik dan
        harga terjangkau, jam dinding kami siap mempercantik ruangan rumah,
        kantor, maupun kafe Anda.
      </p>
    </section>

    <!-- Produk -->
    <section id="produk" class="py-16 px-6 bg-gray-100">
      <h2 class="text-3xl font-bold text-center">Koleksi Jam Dinding</h2>
      <div class="flex items-center justify-center py-6">
        <a
        href="dashboard.php"
        class="bg-blue-500 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-700"
      >
        Pergi ke Dashboard
      </a>
      </div>
      <?php
    include 'db.php';

    $sql = "SELECT * FROM produk ORDER BY created_at DESC";
    $result = $conn->query($sql);
    ?>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
        <div
          class="bg-white shadow-md rounded-xl overflow-hidden hover:scale-105 transition"
        >
          <img
            src="gambar/<?= htmlspecialchars($row['gambar']) ?>"
            alt="<?= htmlspecialchars($row['nama']) ?>"
            class="w-full h-60 object-cover"
          />
          <div class="p-4">
            <h3 class="font-semibold text-lg"><?= htmlspecialchars($row['nama']) ?></h3>
            <p class="text-gray-600">Rp.<?= htmlspecialchars($row['harga']) ?></p>
          </div>
        </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-center text-gray-500">Belum ada data!</p>
      <?php endif; ?>

      </div>
      <?php $conn->close(); ?>
    </section>

    <!-- Testimoni -->
    <section class="py-16 px-6 max-w-5xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-10">Apa Kata Pembeli</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white shadow-md rounded-xl p-6">
          <p class="italic">
            "Jamnya bagus banget, bikin ruang tamu jadi lebih elegan!"
          </p>
          <h4 class="mt-4 font-semibold">– Rina, Bandung</h4>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6">
          <p class="italic">
            "Kualitas oke, harga ramah di kantong. Recomended seller!"
          </p>
          <h4 class="mt-4 font-semibold">– Dedi, Jakarta</h4>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6">
          <p class="italic">
            "Pengiriman cepat dan aman, jamnya sesuai dengan foto."
          </p>
          <h4 class="mt-4 font-semibold">– Lestari, Yogyakarta</h4>
        </div>
      </div>
    </section>

    <!-- Kontak -->
    <section class="py-16 px-6 bg-gray-100" id="kontak">
      <h2 class="text-3xl font-bold text-center mb-10">Hubungi Kami</h2>
      <div class="max-w-lg mx-auto bg-white shadow-md rounded-xl p-8">
        <form class="space-y-6">
          <div>
            <label class="block mb-2 font-semibold">Nama</label>
            <input
              type="text"
              class="w-full border p-3 rounded-lg"
              placeholder="Masukkan nama"
            />
          </div>
          <div>
            <label class="block mb-2 font-semibold">Email</label>
            <input
              type="email"
              class="w-full border p-3 rounded-lg"
              placeholder="Masukkan email"
            />
          </div>
          <div>
            <label class="block mb-2 font-semibold">Pesan</label>
            <textarea
              class="w-full border p-3 rounded-lg"
              rows="3"
              placeholder="Tulis pesan Anda..."
            ></textarea>
          </div>
          <button
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700"
          >
            Kirim Pesan
          </button>
        </form>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-indigo-700 text-white text-center py-6">
      <p>&copy; 2025 Toko Jam Dinding. All rights reserved.</p>
      <p>📞 0821-1796-3167 | ✉ tokojamdinding@gmail.com</p>
    </footer>
  </body>
</html>
