<?php
$pageTitle = 'Kegiatan & Berita';
include 'components/header.php';
include 'components/navbar.php';

// Include Database
require_once 'config/db.php';

// Logic Pagination
$items_per_page = 6;

// Hitung total artikel
$stmt_total = $pdo->query("SELECT COUNT(*) FROM artikel");
$total_items = $stmt_total->fetchColumn();
$total_pages = ceil($total_items / $items_per_page);

// Ambil halaman saat ini dari parameter URL (default: 1)
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Pastikan current page berada dalam range yang valid
if ($current_page < 1) $current_page = 1;
if ($current_page > $total_pages && $total_pages > 0) $current_page = $total_pages;

// Hitung offset
$offset = ($current_page - 1) * $items_per_page;

// Ambil artikel untuk halaman saat ini (terbaru di atas)
if ($total_items > 0) {
    $stmt_articles = $pdo->prepare("SELECT * FROM artikel ORDER BY date DESC, id DESC LIMIT :limit OFFSET :offset");
    $stmt_articles->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
    $stmt_articles->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt_articles->execute();
    $current_page_articles = $stmt_articles->fetchAll(PDO::FETCH_ASSOC);
} else {
    $current_page_articles = [];
}

// Untuk Highlight (Artikel Pertama di Halaman 1)
$highlightArticle = count($current_page_articles) > 0 ? $current_page_articles[0] : null;

function getCategoryColor($cat) {
    $c = ['Kegiatan' => 'bg-blue-600', 'Opini' => 'bg-purple-600', 'Pengabdian' => 'bg-emerald-500', 'Akademik' => 'bg-orange-500'];
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
?>

<!-- Page Header -->
<section class="relative pt-32 pb-16 bg-transparent overflow-hidden min-h-[400px] flex items-center justify-center">
    <div class="absolute inset-0 z-0" style="-webkit-mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%); mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%);">
        <!-- Abstract Background -->
        <img src="assets/img/artikel_bg.jpg" alt="Kunjungan Instansi FMKD" class="w-full h-full object-cover opacity-40 mix-blend-overlay animate-[pulse-slow_20s_ease-in-out_infinite] scale-105">
        <div class="absolute inset-0 bg-gradient-to-b from-navy/95 via-navy/80 to-transparent"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSIvPjwvc3ZnPg==')] opacity-40"></div>
        
        <!-- Glowing Orbs -->
        <div class="absolute top-0 right-0 w-80 h-80 bg-cyan-500/20 rounded-full blur-[100px] animate-pulse-slow mix-blend-screen"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-600/30 rounded-full blur-[120px] mix-blend-screen animate-float"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-12 reveal reveal-scale">
        <div class="inline-flex items-center justify-center space-x-2 bg-white/10 backdrop-blur-md px-5 py-2 rounded-full mb-6 border border-white/20 shadow-[0_0_15px_rgba(34,211,238,0.3)] animate-float">
            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse shadow-[0_0_10px_rgba(34,211,238,1)]"></span>
            <span class="text-cyan-300 text-xs font-black tracking-widest uppercase">Informasi Terkini</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] leading-tight">
            Kegiatan & <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-300">Berita</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto drop-shadow-xl font-light">
            Dapatkan informasi terbaru, opini tajam, dan dokumentasi kegiatan seru seputar <strong class="text-white">Forum Mahasiswa Kedinasan Daerah Jakarta Raya</strong>.
        </p>
    </div>
</section>

<!-- Magazine Layout Section -->
<section class="py-32 bg-transparent relative min-h-screen overflow-hidden">
    <!-- Decorative Glowing Elements -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-500/10 rounded-full blur-[150px] z-0 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-cyan-400/10 rounded-full blur-[150px] z-0 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <?php if ($current_page == 1 && $highlightArticle): ?>
        <!-- Featured Article (Hanya tampil di halaman 1) -->
        <div class="mb-32 reveal">
            <div class="bg-white/10 backdrop-blur-2xl rounded-[3rem] border border-white/10 overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.1)] hover:shadow-[0_30px_60px_rgba(37,99,235,0.2)] transition-all duration-700 group flex flex-col lg:flex-row transform hover:-translate-y-3 relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-[3rem] blur opacity-0 group-hover:opacity-30 transition duration-1000"></div>
                
                <div class="lg:w-3/5 relative overflow-hidden aspect-video lg:aspect-auto z-10">
                    <img src="<?= $highlightArticle['image'] ?>" alt="<?= htmlspecialchars($highlightArticle['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy/90 via-navy/30 to-transparent lg:hidden"></div>
                    <div class="absolute top-8 left-8 inline-block px-5 py-2 text-sm font-black text-white shadow-lg rounded-full <?= getCategoryColor($highlightArticle['category']) ?> z-10 animate-pulse-slow border border-white/30 backdrop-blur-md">
                        <i class="fa-solid fa-star mr-2 text-yellow-300"></i> Highlight
                    </div>
                </div>
                <div class="lg:w-2/5 p-12 lg:p-16 flex flex-col justify-center relative bg-gradient-to-br from-white/5 to-white/10 backdrop-blur-xl z-10">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-cyan-400/10 rounded-bl-full -z-10 group-hover:scale-150 transition-transform duration-1000"></div>
                    
                    <span class="inline-block px-4 py-1.5 text-xs font-black text-white uppercase tracking-wider rounded-full mb-6 w-max shadow-sm <?= getCategoryColor($highlightArticle['category']) ?>">
                        <?= $highlightArticle['category'] ?>
                    </span>
                    
                    <h2 class="text-4xl md:text-5xl font-black text-white mb-8 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-cyan-300 group-hover:to-blue-300 transition-all duration-500 leading-tight drop-shadow-sm">
                        <a href="artikel-detail.php?id=<?= $highlightArticle['id'] ?>"><?= htmlspecialchars($highlightArticle['title']) ?></a>
                    </h2>
                    
                    <p class="text-gray-300 mb-10 leading-relaxed line-clamp-4 font-medium text-lg">
                        <?= htmlspecialchars($highlightArticle['excerpt']) ?>
                    </p>
                    
                    <div class="mt-auto flex items-center justify-between border-t border-white/20 pt-8 relative">
                        <div class="flex items-center">
                            <div class="w-14 h-14 rounded-[1rem] bg-gradient-to-tr from-blue-100 to-cyan-50 flex items-center justify-center text-blue-600 mr-5 shadow-inner border border-white transform group-hover:rotate-12 transition-transform duration-500">
                                <i class="fa-solid fa-pen-nib text-xl"></i>
                            </div>
                            <div>
                                <p class="text-base font-black text-white tracking-wide"><?= htmlspecialchars($highlightArticle['author']) ?></p>
                                <p class="text-xs font-bold text-cyan-400 uppercase tracking-widest mt-1"><?= formatTanggalIndo($highlightArticle['date']) ?></p>
                            </div>
                        </div>
                        <a href="artikel-detail.php?id=<?= $highlightArticle['id'] ?>" class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-gradient-to-r hover:from-blue-600 hover:to-cyan-500 hover:scale-110 hover:shadow-[0_0_20px_rgba(34,211,238,0.5)] transition-all duration-300">
                            <i class="fa-solid fa-arrow-right text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Section Title -->
        <div class="flex justify-between items-center mb-12 reveal">
            <h3 class="text-3xl font-black text-white border-l-8 border-blue-600 pl-6 rounded-l-sm">Berita Lainnya</h3>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-24 stagger-children">
            <?php foreach ($current_page_articles as $index => $article): ?>
                <?php $delay = 0.1 * (($index % 3) + 1); ?>
                <div class="bg-white/10 backdrop-blur-2xl rounded-[2.5rem] overflow-hidden border border-white/10 shadow-[0_15px_40px_rgba(0,0,0,0.08)] hover:shadow-[0_25px_50px_rgba(37,99,235,0.2)] transform hover:-translate-y-4 transition-all duration-500 group flex flex-col relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/0 to-blue-500/0 group-hover:from-cyan-400/5 group-hover:to-blue-500/5 transition-colors duration-500 z-0"></div>
                    
                    <!-- Thumbnail -->
                    <div class="relative overflow-hidden aspect-[4/3] z-10">
                        <img src="<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy/80 via-navy/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute top-5 left-5 text-white text-xs font-black uppercase tracking-wider px-4 py-1.5 rounded-full shadow-lg border border-white/20 backdrop-blur-md <?= getCategoryColor($article['category']) ?> transform group-hover:-translate-y-1 transition-transform">
                            <?= $article['category'] ?>
                        </div>
                        <div class="absolute bottom-5 right-5 translate-y-10 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                            <span class="w-12 h-12 bg-white/10 backdrop-blur-xl border border-white/40 text-white rounded-full flex items-center justify-center hover:bg-white hover:text-blue-600 transition-colors">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-8 flex-grow flex flex-col relative z-10 bg-transparent">
                        <h3 class="text-2xl font-black text-white mb-4 group-hover:text-blue-400 transition-colors line-clamp-2 leading-tight">
                            <a href="artikel-detail.php?id=<?= $article['id'] ?>" class="after:absolute after:inset-0"><?= htmlspecialchars($article['title']) ?></a>
                        </h3>
                        <p class="text-gray-300 mb-8 text-base line-clamp-3 flex-grow font-medium leading-relaxed">
                            <?= htmlspecialchars($article['excerpt']) ?>
                        </p>
                        
                        <!-- Meta -->
                        <div class="flex items-center justify-between border-t border-white/20 pt-6 mt-auto">
                            <div class="flex items-center text-xs font-bold text-gray-400 uppercase tracking-wider">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 flex items-center justify-center text-white mr-3 border border-white/20 shadow-sm">
                                    <i class="fa-solid fa-pen-nib text-[10px]"></i>
                                </div>
                                <span class="mr-4 text-white"><?= htmlspecialchars($article['author']) ?></span>
                            </div>
                            <div class="text-xs font-bold text-cyan-400 uppercase flex items-center tracking-wider">
                                <i class="fa-regular fa-calendar mr-2"></i>
                                <?= formatTanggalIndo($article['date']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
        <div class="flex justify-center mt-16 reveal">
            <nav class="flex items-center space-x-3 bg-white/10 backdrop-blur-xl p-3 rounded-full shadow-[0_10px_30px_rgba(0,0,0,0.05)] border border-white/10">
                <!-- Tombol Prev -->
                <?php if ($current_page > 1): ?>
                    <a href="?page=<?= $current_page - 1 ?>" class="w-12 h-12 rounded-full flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white hover:shadow-lg transition-all duration-300"><i class="fa-solid fa-angle-left"></i></a>
                <?php else: ?>
                    <span class="w-12 h-12 rounded-full flex items-center justify-center text-gray-300 cursor-not-allowed bg-white/5"><i class="fa-solid fa-angle-left"></i></span>
                <?php endif; ?>

                <!-- Angka Halaman -->
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <?php if ($i == $current_page): ?>
                        <span class="w-12 h-12 rounded-full flex items-center justify-center bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg font-black text-lg transform scale-110"><?= $i ?></span>
                    <?php else: ?>
                        <a href="?page=<?= $i ?>" class="w-12 h-12 rounded-full flex items-center justify-center text-gray-300 hover:bg-white/20 hover:text-blue-300 hover:shadow-md transition-all duration-300 font-bold text-lg"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <!-- Tombol Next -->
                <?php if ($current_page < $total_pages): ?>
                    <a href="?page=<?= $current_page + 1 ?>" class="w-12 h-12 rounded-full flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white hover:shadow-lg transition-all duration-300"><i class="fa-solid fa-angle-right"></i></a>
                <?php else: ?>
                    <span class="w-12 h-12 rounded-full flex items-center justify-center text-gray-300 cursor-not-allowed bg-white/5"><i class="fa-solid fa-angle-right"></i></span>
                <?php endif; ?>
            </nav>
        </div>
        <?php endif; ?>

    </div>
</section>

<?php include 'components/footer.php'; ?>



