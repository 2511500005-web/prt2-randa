-- Database: pertemuan_2
-- Jalankan file ini di phpMyAdmin (tab SQL) setelah membuat database baru

CREATE TABLE jurusan (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  kode_jurusan VARCHAR(32),
  nama_jurusan VARCHAR(64),
  fakultas VARCHAR(32)
);

CREATE TABLE mahasiswa (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  jurusan_id INT(11),
  nama VARCHAR(32),
  nim VARCHAR(32),
  created_at DATE,
  FOREIGN KEY (jurusan_id) REFERENCES jurusan(id)
);

CREATE TABLE matakuliah (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  jurusan_id INT(11),
  kode_mk VARCHAR(32),
  nama_mk VARCHAR(64),
  sks INT(8),
  semester INT(8),
  FOREIGN KEY (jurusan_id) REFERENCES jurusan(id)
);

-- Contoh data (opsional, boleh dihapus)
INSERT INTO jurusan (kode_jurusan, nama_jurusan, fakultas) VALUES
('TI', 'Teknik Informatika', 'Fakultas Teknik');

INSERT INTO mahasiswa (jurusan_id, nama, nim, created_at) VALUES
(1, 'Randa', '2026001', CURDATE());
