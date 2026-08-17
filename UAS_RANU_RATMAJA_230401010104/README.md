# 📚 Perpustakaan Buku Digital

[![Run on Replit](https://replit.com/badge/github/RanzCoder119/MK_PemrogramanWeb-II_2026)](https://replit.com/github/RanzCoder119/MK_PemrogramanWeb-II_2026)&nbsp;
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white)&nbsp;
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.7-EE4623?logo=codeigniter&logoColor=white)&nbsp;
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?logo=mysql&logoColor=white)&nbsp;
![Composer](https://img.shields.io/badge/Composer-2.x-885630?logo=composer&logoColor=white)

---

## 🎓 Student Information

| | |
|---|---|
| **Name** | Ranu Ratmaja |
| **NIM** | 230401010104 |
| **University** | UNSIA — Universitas Siber Asia |
| **Prodi** | PJJ — S1 Informatika |
| **Class** | IF405 — Pemrograman Web II |
| **Tugas** | UAS — Perpustakaan Buku Digital |

---

## 📸 Preview Tampilan

### Halaman Login
![Login](https://raw.githubusercontent.com/RanzCoder119/MK_PemrogramanWeb-II_2026/main/UAS_RANU_RATMAJA_230401010104/screenshots/01_login.png)

### Halaman Daftar Buku
![Daftar Buku](https://raw.githubusercontent.com/RanzCoder119/MK_PemrogramanWeb-II_2026/main/UAS_RANU_RATMAJA_230401010104/screenshots/03_daftar_buku.png)

### Form Tambah Buku (dengan Validasi)
![Form Tambah](https://raw.githubusercontent.com/RanzCoder119/MK_PemrogramanWeb-II_2026/main/UAS_RANU_RATMAJA_230401010104/screenshots/05_form_validasi.png)

### Pencarian Buku
![Pencarian](https://raw.githubusercontent.com/RanzCoder119/MK_PemrogramanWeb-II_2026/main/UAS_RANU_RATMAJA_230401010104/screenshots/08_pencarian.png)

### Pagination
![Pagination](https://raw.githubusercontent.com/RanzCoder119/MK_PemrogramanWeb-II_2026/main/UAS_RANU_RATMAJA_230401010104/screenshots/09_pagination.png)

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
|-------|-----------|
| 📝 CRUD Buku | Create, Read, Update, Delete data buku lengkap dengan validasi |
| 🔐 Penanganan Session | Login/logout dengan session, halaman diproteksi Auth Filter |
| 🔍 Searching | Pencarian judul, pengarang, penerbit, atau ISBN + filter kategori |
| 📄 Pagination | Halaman otomatis (6 data/halaman) dengan keyword tetap terbawa |
| ✅ Validasi Form | Validasi server-side CI4 dengan pesan error Bahasa Indonesia |
| 👥 Multi-Role User | Akun admin & pustakawan dengan password ter-hash |
| 📊 Statistik Ringkas | Info jumlah data dan posisi halaman pada tabel |
| 🔒 Keamanan | Query Builder (anti SQL Injection) + `esc()` (anti XSS) |

---

## 📁 Struktur File

```
UAS_RANU_RATMAJA_230401010104/
├── perpustakaan-digital/        # Project CodeIgniter 4 lengkap
│   ├── app/
│   │   ├── Config/              # Routes, Filters, Database
│   │   ├── Controllers/         # Auth.php, Buku.php
│   │   ├── Filters/             # AuthFilter.php (penjaga session)
│   │   ├── Models/              # BukuModel.php, UserModel.php
│   │   ├── Database/            # Migrations & Seeders
│   │   └── Views/               # login, daftar buku, form
│   ├── public/                  # index.php + assets CSS
│   └── .env                     # Konfigurasi environment
├── perpustakaan_digital.sql     # Struktur Database + Data Contoh
├── KONFIGURASI.txt              # Konfigurasi web (URL, DB, akun)
├── Laporan_Perpustakaan_Buku_Digital.pdf  # Laporan + screenshot
├── Rekaman_Langkah_Pembuatan_Vibe_Coding.mp4  # Video proses pembuatan
├── screenshots/                 # 10 screenshot tampilan web
├── presentasi-slides/           # 12 slide presentasi
└── README.md                    # Dokumentasi Proyek
```

---

## 🗄️ Struktur Database — `perpustakaan_digital`

### Tabel `buku`

| Kolom | Tipe | Atribut | Deskripsi |
|-------|------|---------|-----------|
| id | INT(11) | AUTO_INCREMENT, PK | ID unik buku |
| judul | VARCHAR(200) | NOT NULL, INDEX | Judul buku |
| pengarang | VARCHAR(100) | NOT NULL, INDEX | Nama pengarang |
| penerbit | VARCHAR(100) | NULL | Nama penerbit |
| tahun_terbit | YEAR | NULL | Tahun terbit |
| kategori | VARCHAR(50) | NULL, INDEX | Kategori buku |
| isbn | VARCHAR(20) | UNIQUE | Nomor ISBN |
| stok | INT(11) | DEFAULT 0 | Jumlah stok |
| deskripsi | TEXT | NULL | Sinopsis singkat |
| created_at / updated_at | DATETIME | AUTO | Timestamp otomatis |

### Tabel `users`

| Kolom | Tipe | Atribut | Deskripsi |
|-------|------|---------|-----------|
| id | INT(11) | AUTO_INCREMENT, PK | ID unik user |
| username | VARCHAR(50) | UNIQUE | Username login |
| password | VARCHAR(255) | NOT NULL | Password ter-hash |
| nama_lengkap | VARCHAR(100) | NOT NULL | Nama tampilan |
| role | ENUM | admin / pustakawan | Hak akses |

---

## 🚀 Cara Instalasi (Lokal)

1. Clone repo, lalu masuk ke folder `perpustakaan-digital/`
2. Jalankan `composer install` untuk mengunduh framework
3. Buat database MySQL bernama `perpustakaan_digital`
4. Import `perpustakaan_digital.sql` via phpMyAdmin (atau `php spark migrate && php spark db:seed DatabaseSeeder`)
5. Jalankan `php spark serve` lalu akses `http://localhost:8080/`

> **Konfigurasi lengkap** (URL, nama database, akun demo) ada di file `KONFIGURASI.txt` ☝️

---

## 🔑 Akun Demo

| Username | Password | Role |
|----------|----------|------|
| `admin` | `admin123` | Administrator |
| `pustakawan` | `pustakawan123` | Pustakawan |

---

## 🛡️ Keamanan

- **Query Builder CI4** — escaping otomatis, mencegah SQL Injection
- **`esc()`** di semua output view — mencegah XSS
- **`password_hash()` / `password_verify()`** — password tidak disimpan polos
- **Auth Filter** — semua rute internal wajib login, redirect otomatis ke `/login`
- **CSRF & validasi server-side** — form tervalidasi sebelum masuk database

---

*© 2026 Ranu Ratmaja — NIM 230401010104 — UAS Pemrograman Web II — UNSIA*
