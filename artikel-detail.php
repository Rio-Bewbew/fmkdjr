<?php
require_once 'config/db.php';

// Ambil ID dari URL
$article_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Cari artikel berdasarkan ID
$stmt = $pdo->prepare("SELECT * FROM artikel WHERE id = :id");
$stmt->execute([':id' => $article_id]);
$current_article = $stmt->fetch(PDO::FETCH_ASSOC);

function getCategoryColor($cat) {
    $c = ['Kegiatan' => 'bg-blue-600', 'Opini' => 'bg-purple-600', 'Pengabdian' => 'bg-green-600', 'Akademik' => 'bg-orange-500'];
    return $c[$cat] ?? 'bg-gray-600';
}

function formatTanggalIndo($dateStr) {
    if (empty($dateStr)) return '';
    $timestamp = strtotime($dateStr);
    if (!$timestamp) return $dateStr;
    $bulan = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    return date('j', $timestamp) . ' ' . ($bulan[(int)date('n', $timestamp)] ?? date('M', $timestamp)) . ' ' . date('Y', $timestamp);
}

// Jika artikel tidak ditemukan, redirect ke halaman artikel
if (!$current_article) {
    header('Location: artikel.php');
    exit;
}

$pageTitle = $current_article['title'];
include 'components/header.php';
include 'components/navbar.php';
?>

<!-- Article Header -->
<section class="relative pt-32 pb-16 bg-navy overflow-hidden">
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-slide-up">
        <span class="inline-block px-3 py-1 text-xs font-bold text-white rounded-full mb-6 shadow-sm <?= getCategoryColor($current_article['category']) ?>">
            <?= $current_article['category'] ?>
        </span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">
            <?= $current_article['title'] ?>
        </h1>
        <div class="flex items-center justify-center text-gray-300 space-x-6">
            <div class="flex items-center">
                <i class="fa-solid fa-user mr-2 text-blue-400"></i>
                <span><?= $current_article['author'] ?></span>
            </div>
            <div class="flex items-center">
                <i class="fa-regular fa-calendar mr-2 text-blue-400"></i>
                <span><?= formatTanggalIndo($current_article['date']) ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-16 bg-transparent text-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Hero Image -->
        <div class="rounded-3xl overflow-hidden shadow-2xl mb-12 -mt-24 relative z-20 animate-fade-in aspect-video border border-white/10">
            <img src="<?= $current_article['image'] ?>" alt="<?= htmlspecialchars($current_article['title']) ?>" class="w-full h-full object-cover">
        </div>

        <!-- Prose Content -->
        <div class="prose prose-lg prose-invert max-w-none text-gray-200 leading-relaxed animate-slide-up" style="animation-delay: 0.1s;">
            <?= $current_article['content'] ?>
        </div>
        
        <!-- Back Button -->
        <div class="mt-16 pt-8 border-t border-white/10 text-center">
            <a href="artikel.php" class="inline-flex items-center px-8 py-3.5 border border-white/20 text-base font-bold rounded-full shadow-lg text-white bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-700 hover:to-cyan-600 hover:scale-105 transition-all">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Artikel
            </a>
        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>
