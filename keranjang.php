
<?php
session_start();
require_once __DIR__ . '/includes/fungsi.php';
require_once __DIR__ . '/data/menu.php';

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

$subtotal = 0;
foreach ($_SESSION['keranjang'] as $kode => $jumlah) {
    if (isset($daftarMenu[$kode])) {
        $subtotal += hitungSubtotal($daftarMenu[$kode]['harga'], $jumlah);
    }
}

$diskon = hitungDiskon($subtotal);
$total = hitungTotal($subtotal);

require __DIR__ . '/includes/header.php';
?>

<h2>Keranjang Belanja</h2>

<?php if (empty($_SESSION['keranjang'])): ?>
    <p>Keranjang masih kosong.</p>
    <a class="button-link" href="index.php">Lihat Menu</a>
<?php else: ?>
    <div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['keranjang'] as $kode => $jumlah):
            if (!isset($daftarMenu[$kode])) continue;
            $menu = $daftarMenu[$kode];
        ?>
            <tr>
                <td><?= e($menu['nama']) ?></td>
                <td><?= rupiah($menu['harga']) ?></td>
                <td><?= e($jumlah) ?></td>
                <td><?= rupiah(hitungSubtotal($menu['harga'], $jumlah)) ?></td>
                <td>
                    <form method="POST" action="proses.php">
                        <input type="hidden" name="aksi" value="hapus">
                        <input type="hidden" name="kode" value="<?= e($kode) ?>">
                        <button type="submit" class="danger">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>

    <section class="summary">
        <p>Subtotal: <strong><?= rupiah($subtotal) ?></strong></p>
        <p>Diskon: <strong><?= rupiah($diskon) ?></strong></p>
        <p>Total: <strong><?= rupiah($total) ?></strong></p>
        <?php if ($subtotal >= 50000): ?>
            <p>Diskon 10% diberikan karena subtotal minimal Rp 50.000.</p>
        <?php else: ?>
            <p>Belanja minimal Rp 50.000 untuk mendapatkan diskon 10%.</p>
        <?php endif; ?>
    </section>

    <form method="POST" action="proses.php"
          onsubmit="return confirm('Kosongkan seluruh keranjang?')">
        <input type="hidden" name="aksi" value="kosongkan">
        <button type="submit" class="danger">Kosongkan Keranjang</button>
    </form>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
