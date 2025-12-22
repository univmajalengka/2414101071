<!DOCTYPE html>
<html>
<head>
<title>Pemesanan</title>
<script src="assets/js/script.js"></script>
</head>
<body>
<h2>Form Pemesanan</h2>
<form method="POST" action="proses_simpan.php" onsubmit="return hitung()">
Nama: <input type="text" name="nama" required><br>
HP: <input type="text" name="hp" required><br>
Tanggal: <input type="date" name="tanggal" required><br>
Hari: <input type="number" name="hari" id="hari" required><br>
Peserta: <input type="number" name="peserta" id="peserta" required><br>

<input type="checkbox" id="penginapan" value="1000000"> Penginapan<br>
<input type="checkbox" id="transportasi" value="1200000"> Transportasi<br>
<input type="checkbox" id="service" value="500000"> Service/Makan<br>

Harga Paket: <input type="text" name="harga" id="harga" readonly><br>
Total: <input type="text" name="total" id="total" readonly><br>

<button type="submit">Simpan</button>
</form>
</body>
</html>