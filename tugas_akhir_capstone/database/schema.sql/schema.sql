CREATE DATABASE wisata_umkm;
USE wisata_umkm;

CREATE TABLE pesanan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  hp VARCHAR(20),
  tanggal DATE,
  hari INT,
  peserta INT,
  penginapan INT,
  transportasi INT,
  service INT,
  harga_paket INT,
  total INT
);