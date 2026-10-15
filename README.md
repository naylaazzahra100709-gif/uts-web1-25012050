# UTS Praktik Web I — Pemesanan Kantin Kampus

## 1. Deskripsi Proyek

Pemesanan Kantin Kampus adalah aplikasi web sederhana yang dibuat menggunakan PHP Native untuk membantu pengguna melihat menu makanan dan minuman serta melakukan pemesanan secara online.

Aplikasi ini dibuat sebagai tugas UTS Praktik Web I.

## 2. Teknologi yang Digunakan

- PHP Native
- HTML
- CSS
- Session PHP untuk menyimpan keranjang belanja
- Cookie untuk menyimpan preferensi kategori
- GitHub untuk penyimpanan kode sumber

## 3. Fitur Aplikasi

- Menampilkan daftar menu makanan dan minuman.
- Menyediakan pencarian menu menggunakan metode GET.
- Menyediakan pemilihan kategori makanan dan minuman.
- Menambahkan menu ke keranjang belanja.
- Memvalidasi jumlah pesanan antara 1 sampai 10.
- Menghitung subtotal dan total pembayaran.
- Memberikan diskon 10% jika subtotal mencapai Rp50.000.
- Menghapus item dari keranjang.
- Mengosongkan seluruh keranjang belanja.
- Menampilkan notifikasi setelah tindakan pengguna.

## 4. Struktur Folder

```text
uts-web1-25012050/
├── README.md
├── index.php
├── keranjang.php
├── proses.php
├── data/
│   └── menu.php
├── includes/
│   ├── fungsi.php
│   ├── header.php
│   └── footer.php
├── assets/
│   └── style.css
└── dokumentasi/
    └── pengujian/
        ├── README.md
        ├── 01-daftar-menu.png
        └── screenshot-pengujian-lainnya.png
```

## 5. Cara Menjalankan Aplikasi

1. Instal dan buka XAMPP.
2. Jalankan Apache melalui XAMPP Control Panel.
3. Letakkan folder proyek di dalam direktori `C:\xampp\htdocs\`.
4. Pastikan file dan folder aplikasi sudah lengkap sesuai struktur proyek.
5. Buka browser.
6. Akses alamat berikut:

   `http://localhost/uts-web1-25012050/`

## 6. Data Menu

Aplikasi menggunakan data menu yang disimpan dalam array PHP, sehingga tidak memerlukan database MySQL.

Menu yang tersedia meliputi:

| Kode | Nama Menu | Kategori | Harga |
|---|---|---|---:|
| M001 | Nasi Goreng | Makanan | Rp20.000 |
| M002 | Mie Goreng | Makanan | Rp15.000 |
| M003 | Ayam Geprek | Makanan | Rp25.000 |
| M004 | Es Teh | Minuman | Rp5.000 |
| M005 | Jus Jeruk | Minuman | Rp10.000 |
| M006 | Roti Bakar | Makanan | Rp12.000 |

## 7. Ketentuan Diskon

Diskon sebesar 10% diberikan apabila subtotal pembelian mencapai minimal Rp50.000.

- Subtotal Rp49.000: tidak mendapatkan diskon.
- Subtotal Rp50.000: mendapatkan diskon Rp5.000.
- Total pembayaran dihitung dengan mengurangi subtotal dengan diskon.

## 8. Dokumentasi Pengujian

Dokumentasi pengujian berisi screenshot hasil pengujian aplikasi, seperti:

- Daftar menu.
- Pencarian menu.
- Filter kategori.
- Penambahan pesanan.
- Validasi jumlah pesanan.
- Perhitungan subtotal dan diskon.
- Penghapusan item.
- Pengosongan keranjang.

Screenshot harus diambil dari aplikasi yang benar-benar dijalankan dan disimpan di folder `dokumentasi/pengujian/`.

## 9. Pengembang

Nama:NAYLA AZ ZAHRA]  
NIM:25012050  
Mata Kuliah: Programan Web I

---

Proyek ini dibuat untuk memenuhi tugas UTS Praktik Web I.