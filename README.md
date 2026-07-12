# UAS Laundry - Sistem Manajemen Laundry

Aplikasi manajemen laundry berbasis web menggunakan CodeIgniter 3, MySQL/MariaDB, dan Bootstrap 5.

---

## FITUR

### Admin/Kasir
- Login & logout
- Dashboard dengan statistik dan grafik 6 bulan
- Manajemen Pelanggan (tambah, edit, hapus)
- Manajemen Layanan (tambah, edit, hapus)
- Manajemen Transaksi (tambah, edit, hapus, update status)
- Cetak Nota Transaksi
- Laporan Transaksi

### Pelanggan
- Registrasi & login mandiri
- Dashboard pribadi (statistik, riwayat laundry)
- Riwayat transaksi lengkap
- Detail transaksi per invoice
- Edit profil & ganti password

---

## CARA INSTALASI

### Prasyarat
- PHP 7.4+ atau PHP 8.x
- MySQL 5.7+ atau MariaDB 10.x
- Apache dengan mod_rewrite aktif (XAMPP/WAMP/Laragon)

### Langkah-langkah

1. **Copy folder ke htdocs**
   ```
   Salin folder `uas_laundry` ke `C:\xampp\htdocs\` (atau setara)
   ```

2. **Import database**
   - Buka phpMyAdmin: http://localhost/phpmyadmin
   - Buat database baru bernama `uas_laundry`
   - Import file `uas_laundry.sql`

3. **Konfigurasi database** (jika perlu)
   Edit file: `application/config/database.php`
   ```php
   'hostname' => 'localhost',
   'username' => 'root',      // sesuaikan
   'password' => '',          // sesuaikan
   'database' => 'uas_laundry',
   ```

4. **Aktifkan mod_rewrite Apache**
   Di XAMPP: buka `httpd.conf`, pastikan baris ini tidak dikomentari:
   ```
   LoadModule rewrite_module modules/mod_rewrite.so
   ```
   Dan cari `AllowOverride None` ubah jadi `AllowOverride All` di bagian htdocs.

5. **Akses aplikasi**
   Buka browser: http://localhost/uas_laundry

---

## AKUN DEFAULT

### Admin
| Username | Password | Role  |
|----------|----------|-------|
| admin    | password | Admin |
| kasir    | password | Kasir |

### Pelanggan (sudah ada di database)
- Bisa daftar baru via tombol "Daftar Sekarang" di halaman login
- Atau gunakan akun yang sudah ada (username: `Mhmmdzrkniamril`, `arabi`, `ucup`)

---

## STRUKTUR FOLDER

```
uas_laundry/
├── application/
│   ├── config/          # Konfigurasi (database, routes, dll)
│   ├── controllers/     # Auth, Dashboard, Pelanggan, Layanan, Transaksi, Laporan, UserPanel, Register
│   ├── models/          # M_user, M_pelanggan, M_pelanggan_login, M_layanan, M_transaksi
│   └── views/
│       ├── auth/        # Login, Register
│       ├── layouts/     # Header & Footer admin
│       ├── dashboard/   # Dashboard admin
│       ├── pelanggan/   # Dashboard, Riwayat, Detail, Profil pelanggan + form admin
│       ├── transaksi/   # Index, Form, Nota
│       ├── layanan/     # Index, Form
│       └── laporan/     # Laporan
├── assets/
│   └── css/style.css
├── system/              # CodeIgniter core (jangan diubah)
├── .htaccess            # URL rewriting
├── index.php
└── uas_laundry.sql      # File SQL database
```

---

## BUG YANG DIPERBAIKI

1. **routes.php** - Baris route yang tidak berakhiran newline (menyebabkan route tidak terbaca)
2. **header.php** - Tag `<link>` CSS hilang atribut `rel="stylesheet"`
3. **Folder duplikat** - `controllers/application/controllers/AuthUser.php` yang tidak digunakan
4. **CRLF line endings** - Register.php dan M_pelanggan_login.php
5. **generate_kode()** - Bisa menghasilkan kode duplikat; diperbaiki pakai `max(id_transaksi)`
6. **Validasi form** - Ditambahkan validasi `greater_than[0]` untuk berat, `valid_email`
7. **Update profil** - Belum ada fitur ganti password; sekarang sudah ada
8. **Register** - Tidak cek duplikasi email; sekarang sudah dicek
9. **XSS protection** - Ditambahkan `htmlspecialchars()` pada output data user
10. **Auth redirect** - Sudah login tapi bisa akses /login lagi; sekarang langsung redirect
11. **.htaccess** - Dibuat untuk clean URL (tanpa `index.php`)
12. **index_page config** - Dikosongkan untuk mendukung mod_rewrite
