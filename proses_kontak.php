<?php
header('Content-Type: application/json');

// Panggil file koneksi (yang akan otomatis membuat DB dan Tabel jika belum ada)
require_once 'config/db.php';

// Pastikan request adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subjek = trim($_POST['subjek'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    // Validasi sederhana
    if (empty($nama) || empty($email) || empty($subjek) || empty($pesan)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Semua kolom wajib diisi!'
        ]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Format email tidak valid!'
        ]);
        exit;
    }

    try {
        // Query untuk menyimpan data
        $stmt = $pdo->prepare("INSERT INTO pesan_kontak (nama, email, subjek, pesan) VALUES (:nama, :email, :subjek, :pesan)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subjek', $subjek);
        $stmt->bindParam(':pesan', $pesan);

        $stmt->execute();

        echo json_encode([
            'status' => 'success',
            'message' => 'Pesan Anda berhasil dikirim! Terima kasih.'
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Gagal menyimpan pesan: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Metode request tidak diizinkan.'
    ]);
}
?>
