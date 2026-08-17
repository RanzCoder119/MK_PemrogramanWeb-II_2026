# UAS — Perpustakaan Buku Digital

**Nama:** Ranu Ratmaja
**NIM:** 230401010104
**Mata Kuliah:** Pemrograman Web II — UNSIA IF405 — 2026

Aplikasi web manajemen perpustakaan buku digital berbasis **CodeIgniter 4** dan **MySQL**.

## Fitur

1. **CRUD (Create, Read, Update, Delete)** data buku: judul, pengarang, penerbit, tahun terbit, kategori, ISBN, stok, deskripsi — lengkap dengan validasi form berbahasa Indonesia.
2. **Penanganan Session** — login/logout; password disimpan sebagai hash (`password_hash`); seluruh halaman kelola buku dilindungi `AuthFilter` (akses tanpa login otomatis dialihkan ke halaman login).
3. **Searching** — pencarian berdasarkan judul, pengarang, penerbit, atau ISBN, plus filter kategori.
4. **Pagination** — 6 data per halaman; kata kunci pencarian tetap terbawa saat berpindah halaman.

## Isi Folder

| File / Folder | Keterangan |
|---|---|
| `perpustakaan-digital/` | File project CodeIgniter 4 lengkap (MVC, migration, seeder, filter) |
| `perpustakaan_digital.sql` | Database MySQL siap import (struktur + 25 data buku contoh) |
| `Laporan_Perpustakaan_Buku_Digital.pdf` | Laporan singkat beserta screenshot hasil tampilan form |
| `KONFIGURASI.txt` | Konfigurasi web (URL, nama database, akun login, dll) |
| `screenshots/` | 10 screenshot tampilan aplikasi (login, daftar, form, search, pagination) |
| `presentasi-slides/` | 12 slide presentasi (PNG) untuk video penjelasan |
| `Rekaman_Langkah_Pembuatan_Vibe_Coding.mp4` | Recording langkah-langkah pembuatan web (vibe coding) |

## Cara Menjalankan

```bash
# 1. Buat & import database
mysql -u root -p -e "CREATE DATABASE perpustakaan_digital CHARACTER SET utf8mb4;"
mysql -u root -p perpustakaan_digital < perpustakaan_digital.sql

#    alternatif: migration + seeder dari dalam folder project
#    cd perpustakaan-digital
#    php spark migrate --all
#    php spark db:seed DatabaseSeeder

# 2. Sesuaikan perpustakaan-digital/.env bila perlu (lihat KONFIGURASI.txt)

# 3. Install dependensi (hanya jika folder vendor belum ada)
cd perpustakaan-digital && composer install

# 4. Jalankan
php spark serve
# buka http://localhost:8080
```

## Akun Login Demo

| Username | Password | Role |
|---|---|---|
| `admin` | `admin123` | admin |
| `pustakawan` | `pustakawan123` | pustakawan |

## Konfigurasi Ringkas

- URL: `http://localhost:8080/`
- Database: `perpustakaan_digital` (host `127.0.0.1`, port `3306`, user `root`, driver MySQLi)
- Detail lengkap: lihat `KONFIGURASI.txt`
