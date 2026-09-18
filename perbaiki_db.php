<?php
require_once 'config/db.php';

// Fix colors for Kadiv
$pdo->exec("UPDATE pengurus SET badge_color='bg-blue-800 text-white' WHERE kategori='dpd' AND level='kadiv' AND jabatan LIKE '%Perencanaan%'");
$pdo->exec("UPDATE pengurus SET badge_color='bg-purple-700 text-white' WHERE kategori='dpd' AND level='kadiv' AND (jabatan LIKE '%Kominfo%' OR jabatan LIKE '%Digital%')");
$pdo->exec("UPDATE pengurus SET badge_color='bg-yellow-600 text-white' WHERE kategori='dpd' AND level='kadiv' AND jabatan LIKE '%Humas%'");
$pdo->exec("UPDATE pengurus SET badge_color='bg-teal-600 text-white' WHERE kategori='dpd' AND level='kadiv' AND (jabatan LIKE '%Ekraf%' OR jabatan LIKE '%Usaha%')");

// Fix colors for Kasi
$pdo->exec("UPDATE pengurus SET badge_color='bg-blue-600 text-white' WHERE kategori='dpd' AND level='kasi' AND jabatan LIKE '%Perencanaan%'");
$pdo->exec("UPDATE pengurus SET badge_color='bg-purple-500 text-white' WHERE kategori='dpd' AND level='kasi' AND (jabatan LIKE '%Media%' OR jabatan LIKE '%Digital%')");
$pdo->exec("UPDATE pengurus SET badge_color='bg-yellow-500 text-white' WHERE kategori='dpd' AND level='kasi' AND (jabatan LIKE '%Hubungan%' OR jabatan LIKE '%Eksternal%')");
$pdo->exec("UPDATE pengurus SET badge_color='bg-teal-500 text-white' WHERE kategori='dpd' AND level='kasi' AND (jabatan LIKE '%Pengembangan%' OR jabatan LIKE '%Usaha%')");

// Update Staff Jabatans to match Kasi names so they render properly
// Kasi Perencanaan Strategis
$pdo->exec("UPDATE pengurus SET jabatan='Staff Perencanaan Strategis', badge_color='bg-blue-400 text-white' WHERE kategori='dpd' AND level='staff' AND jabatan LIKE '%Perencanaan%'");
// Kasi Media Digital
$pdo->exec("UPDATE pengurus SET jabatan='Staff Media Digital', badge_color='bg-purple-400 text-white' WHERE kategori='dpd' AND level='staff' AND jabatan LIKE '%Kominfo%'");
// Kasi Hubungan Eksternal
$pdo->exec("UPDATE pengurus SET jabatan='Staff Hubungan Eksternal', badge_color='bg-yellow-400 text-white' WHERE kategori='dpd' AND level='staff' AND jabatan LIKE '%Humas%'");
// Kasi Pengembangan Usaha
$pdo->exec("UPDATE pengurus SET jabatan='Staff Pengembangan Usaha', badge_color='bg-teal-400 text-white' WHERE kategori='dpd' AND level='staff' AND jabatan LIKE '%Ekraf%'");

echo "<h1>Database berhasil diperbaiki!</h1>";
echo "<p>Warna pengurus dan staff sekarang sudah disesuaikan agar cocok dengan tampilan web.</p>";
echo "<p><a href='database.php'>Klik di sini untuk melihat halaman Database Kepengurusan</a></p>";
?>
