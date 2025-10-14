CREATE DATABASE jadwal_kuliah;
USE jadwal_kuliah;

CREATE TABLE mata_kuliah (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hari VARCHAR(20) NOT NULL,
  waktu VARCHAR(50) NOT NULL,
  nama_mk VARCHAR(100) NOT NULL,
  dosen VARCHAR(100) NOT NULL,
  ruang VARCHAR(20) NOT NULL
);

INSERT INTO mata_kuliah (hari, waktu, nama_mk, dosen, ruang) VALUES
('Senin', '09:10 - 10:40', 'Pemrograman Web', 'Muhammad Fizriannur, S.Kom., M.Kom', 'R.101'),
('Selasa', '09:10 - 10:40', 'Basis Data', 'Muhammad Riduan, S.Kom., M.Kom', 'R.202'),
('Rabu', '09:10 - 10:40', 'Struktur Data', 'Muhammad Ikhsan, S.Kom., M.Kom', 'R.103'),
('Kamis', '09:10 - 10:40', 'Organisasi dan Arsitektur Komputer', 'Muhammad Kurniawan, S.Kom., M.Kom., Ph.D., ASEAN Eng', 'R.306'),
('Jumat', '09:10 - 10:40', 'Aljabar Linier', 'Muhammad Faras, S.Kom., M.Kom', 'R.307');
