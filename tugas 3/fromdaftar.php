<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran</title>
</head>
<body>

<h2>Form Pendaftaran Calon Siswa</h2>

<form action="proses-pendaftaran-2.php" method="POST">
    <label>Nama Lengkap</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Alamat</label><br>
    <textarea name="alamat" required></textarea><br><br>

    <label>Jenis Kelamin</label><br>
    <input type="radio" name="jk" value="Laki-laki" required> Laki-laki
    <input type="radio" name="jk" value="Perempuan"> Perempuan<br><br>

    <label>Agama</label><br>
    <select name="agama" required>
        <option>Islam</option>
        <option>Kristen</option>
        <option>Katolik</option>
        <option>Hindu</option>
        <option>Buddha</option>
    </select><br><br>

    <label>Sekolah Asal</label><br>
    <input type="text" name="sekolah" required><br><br>

    <button type="submit" name="daftar">Daftar</button>
</form>

</body>
</html>
