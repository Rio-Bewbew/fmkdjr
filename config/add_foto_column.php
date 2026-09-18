<?php
require_once 'db.php';

// Cek apakah kolom foto sudah ada
$stmt = $pdo->prepare("
    SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_SCHEMA = :dbname 
    AND TABLE_NAME = 'pengurus' 
    AND COLUMN_NAME = 'foto'
");
$stmt->execute([':dbname' => 'fmkdjr_db']);
$exists = $stmt->fetchColumn();

if ($exists == 0) {
    // Kolom belum ada, tambahkan sekarang
    $pdo->exec("ALTER TABLE pengurus ADD COLUMN foto VARCHAR(255) DEFAULT NULL");
    echo "<div style='font-family:sans-serif;max-width:600px;margin:40px auto;padding:20px;background:#d1fae5;border:1px solid #34d399;border-radius:8px;'>
        <h2 style='color:#065f46;margin:0 0 8px'>✅ Berhasil!</h2>
        <p style='color:#047857;margin:0'>Kolom <strong>foto</strong> berhasil ditambahkan ke tabel <strong>pengurus</strong>.</p>
        <p style='color:#047857;margin:8px 0 0'>Sekarang Anda bisa mengisi kolom foto melalui phpMyAdmin.</p>
    </div>";
} else {
    echo "<div style='font-family:sans-serif;max-width:600px;margin:40px auto;padding:20px;background:#dbeafe;border:1px solid #60a5fa;border-radius:8px;'>
        <h2 style='color:#1e40af;margin:0 0 8px'>ℹ️ Info</h2>
        <p style='color:#1d4ed8;margin:0'>Kolom <strong>foto</strong> sudah ada di tabel <strong>pengurus</strong>.</p>
        <p style='color:#1d4ed8;margin:8px 0 0'>Tidak ada yang perlu dilakukan.</p>
    </div>";
}
?>
