
<?php

function e($nilai)
{
    return htmlspecialchars(
        (string) $nilai,
        ENT_QUOTES,
        'UTF-8'
    );
}

function rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungSubtotal($harga, $jumlah)
{
    return $harga * $jumlah;
}

function hitungDiskon($subtotal)
{
    return $subtotal >= 50000 ? $subtotal * 0.10 : 0;
}

function hitungTotal($subtotal)
{
    return $subtotal - hitungDiskon($subtotal);
}
