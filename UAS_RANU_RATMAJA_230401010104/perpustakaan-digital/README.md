# Perpustakaan Buku Digital

Aplikasi web manajemen perpustakaan buku digital berbasis **CodeIgniter 4** dan **MySQL**.

## Fitur

1. **CRUD (Create, Read, Update, Delete)** data buku: judul, pengarang, penerbit, tahun terbit, kategori, ISBN, stok, dan deskripsi.
2. **Penanganan Session**: login/logout dengan password hash (`password_hash`), halaman kelola buku dilindungi filter `auth` — hanya bisa diakses setelah login.
3. **Searching**: pencarian berdasarkan judul, pengarang, penerbit, atau ISBN + filter kategori.
4. **Pagination**: daftar buku ditampilkan 6 data per halaman dengan navigasi halaman yang tetap membawa kata kunci pencarian.

## Kebutuhan Sistem

- PHP >= 8.1 dengan ekstensi: `intl`, `mbstring`, `mysqli`/`pdo_mysql`, `curl`, `xml`
- MySQL / MariaDB
- Composer (opsional, folder `vendor/` sudah disertakan)

## Cara Menjalankan

### 1. Siapkan database

Buat database dan import file SQL:

```bash
mysql -u root -p < database/perpustakaan_digital.sql
```

Atau gunakan migration & seeder bawaan CodeIgniter:

```bash
mysql -u root -p -e "CREATE DATABASE perpustakaan_digital CHARACTER SET utf8mb4;"
php spark migrate --all
php spark db:seed DatabaseSeeder
```

### 2. Konfigurasi

File `.env` sudah disertakan. Sesuaikan jika perlu:

```ini
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost:8080/'

database.default.hostname = 127.0.0.1
database.default.database = perpustakaan_digital
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 3. Jalankan server

```bash
php spark serve
```

Buka browser: **http://localhost:8080**

## Akun Demo

| Username    | Password       | Role       |
|-------------|----------------|------------|
| admin       | admin123       | admin      |
| pustakawan  | pustakawan123  | pustakawan |

## Struktur Direktori Penting

```
app/
├── Config/Routes.php          # Routing + filter auth
├── Controllers/
│   ├── Auth.php               # Login, proses login, logout (session)
│   └── Buku.php               # CRUD + searching + pagination
├── Database/
│   ├── Migrations/            # Migrasi tabel users & buku
│   └── Seeds/                 # Data awal user & 25 buku contoh
├── Filters/AuthFilter.php     # Proteksi halaman berbasis session
├── Models/
│   ├── BukuModel.php          # Model + validasi data buku
│   └── UserModel.php          # Model user
└── Views/
    ├── auth/login.php         # Halaman login
    ├── buku/index.php         # Daftar buku (search + pagination)
    ├── buku/form.php          # Form tambah/edit buku
    └── layout/main.php        # Template utama
database/perpustakaan_digital.sql  # Dump database MySQL
public/assets/css/style.css        # Stylesheet
```

## Upload ke GitHub / GitLab

```bash
cd perpustakaan-digital
git init
git add .
git commit -m "Aplikasi Perpustakaan Buku Digital - CodeIgniter 4 + MySQL"

# GitHub
git remote add origin https://github.com/USERNAME/perpustakaan-digital.git
git branch -M main
git push -u origin main

# GitLab
git remote add origin https://gitlab.com/USERNAME/perpustakaan-digital.git
git branch -M main
git push -u origin main
```

> Catatan: folder `vendor/` dan file `.env` secara default masuk `.gitignore`.
> Jika repository di-clone tanpa `vendor/`, jalankan `composer install` terlebih dahulu.
