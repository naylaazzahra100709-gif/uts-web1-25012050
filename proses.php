
<?php
session_start();
require_once __DIR__ . '/includes/fungsi.php';
require_once __DIR__ . '/data/menu.php';

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$aksi = $_POST['aksi'] ?? '';

if ($aksi === 'tambah') {
    $kode = $_POST['kode'] ?? '';
    $jumlahInput = $_POST['jumlah'] ?? '';

    if (!isset($daftarMenu[$kode])) {
        $_SESSION['flash'] = 'Menu tidak valid.';
        header('Location: index.php');
        exit;
    }

    $jumlahString = is_string($jumlahInput) ? $jumlahInput : '';
    if (!preg_match('/^[1-9][0-9]*$/', $jumlahString)) {
        $_SESSION['flash'] = 'Jumlah harus berupa bilangan bulat 1 sampai 10.';
        header('Location: index.php');
        exit;
    }

    $jumlah = (int) $jumlahString;
    $jumlahLama = $_SESSION['keranjang'][$kode] ?? 0;

    if ($jumlah > 10 || $jumlahLama + $jumlah > 10) {
        $_SESSION['flash'] = 'Jumlah untuk satu menu maksimal 10. Keranjang tidak diubah.';
        header('Location: index.php');
        exit;
    }

    $_SESSION['keranjang'][$kode] = $jumlahLama + $jumlah;
    $_SESSION['flash'] = 'Menu berhasil ditambahkan ke keranjang.';
    header('Location: keranjang.php');
    exit;
}

if ($aksi === 'hapus') {
    $kode = $_POST['kode'] ?? '';
    if (isset($_SESSION['keranjang'][$kode])) {
        unset($_SESSION['keranjang'][$kode]);
        $_SESSION['flash'] = 'Menu berhasil dihapus.';
    }
    header('Location: keranjang.php');
    exit;
}

if ($aksi === 'kosongkan') {
    $_SESSION['keranjang'] = [];
    $_SESSION['flash'] = 'Keranjang berhasil dikosongkan.';
    header('Location: keranjang.php');
    exit;
}

$_SESSION['flash'] = 'Aksi tidak valid.';
header('Location: index.php');
exit;
