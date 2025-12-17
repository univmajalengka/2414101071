<?php
// 1. Pembuatan fungsi
function hitungDiskon($totalBelanja) {
    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja;
    } elseif ($totalBelanja >= 50000 && $totalBelanja < 100000) {
        $diskon = 0.05 * $totalBelanja;
    } else {
        $diskon = 0;
    }

    // 3. Nilai kembalian (nominal Rupiah)
    return $diskon;
}

// 4. Eksekusi program
$totalBelanja = 120000;
$diskon = hitungDiskon($totalBelanja);
$totalBayar = $totalBelanja - $diskon;

// Output
echo "Total Belanja : Rp " . number_format($totalBelanja, 0, ',', '.') . "<br>";
echo "Diskon        : Rp " . number_format($diskon, 0, ',', '.') . "<br>";
echo "Total Bayar   : Rp " . number_format($totalBayar, 0, ',', '.');
?>
