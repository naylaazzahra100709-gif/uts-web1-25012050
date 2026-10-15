
<?php
session_start();
require_once __DIR__ . '/includes/fungsi.php';
require_once __DIR__ . '/data/menu.php';

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

if (isset($_GET['kategori'])) {
    $pilihanKategori = $_GET['kategori'];

    if (in_array($pilihanKategori, ['Makanan', 'Minuman'], true)) {
        setcookie('kategori_favorit', $pilihanKategori, time() + 604800, '/');
    } else {
        $pilihanKategori = '';
    }
} else {
    $pilihanKategori = $_COOKIE['kategori_favorit'] ?? '';
}

$cari = trim($_GET['cari'] ?? '');

require __DIR__ . '/includes/header.php';
?>

<h2>Daftar Menu Kantin</h2>

<form method="GET" action="index.php" class="search">
    <input type="text" name="cari"
           placeholder="Cari nama menu..."
           value="<?= e($cari) ?>">
    <?php if ($pilihanKategori !== ''): ?>
        <input type="hidden" name="kategori" value="<?= e($pilihanKategori) ?>">
    <?php endif; ?>
    <button type="submit">Cari</button>
</form>

<form method="GET" action="index.php" class="search">
    <label for="kategori">Kategori favorit:</label>
    <select name="kategori" id="kategori">
        <option value="">Semua kategori</option>
        <option value="Makanan" <?= $pilihanKategori === 'Makanan' ? 'selected' : '' ?>>Makanan</option>
        <option value="Minuman" <?= $pilihanKategori === 'Minuman' ? 'selected' : '' ?>>Minuman</option>
    </select>
    <button type="submit">Pilih</button>
</form>

<div class="table-wrap">
<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Menu</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $ditemukan = false;
    foreach ($daftarMenu as $kode => $menu):
        if ($cari !== '' && stripos($menu['nama'], $cari) === false) {
            continue;
        }

        if ($pilihanKategori !== '' && $menu['kategori'] !== $pilihanKategori) {
            continue;
        }

        $ditemukan = true;
    ?>
        <tr>
            <td><?= e($kode) ?></td>
            <td><?= e($menu['nama']) ?></td>
            <td><?= e($menu['kategori']) ?></td>
            <td><?= rupiah($menu['harga']) ?></td>
            <td>
                <form method="POST" action="proses.php" class="order-form">
                    <input type="hidden" name="aksi" value="tambah">
                    <input type="hidden" name="kode" value="<?= e($kode) ?>">
                    <input type="number" name="jumlah" min="1" max="10" value="1" required>
                    <button type="submit">Tambah</button>
                </form>
            </td>
            <td>Pesan menu</td>
        </tr>
    <?php endforeach; ?>

    <?php if (!$ditemukan): ?>
        <tr><td colspan="6">Menu tidak ditemukan.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
