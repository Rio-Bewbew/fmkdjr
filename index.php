<?php
$pageTitle = 'Home';
include 'components/header.php';
include 'components/navbar.php';
?>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">

    <!-- SLIDESHOW BACKGROUND (full screen) -->
    <div class="absolute inset-0 z-0" style="-webkit-mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%); mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%);">
        <!-- Slide 1 -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-100">
            <img src="assets/img/kegiatan/foto1.jpg" class="w-full h-full object-cover scale-105 animate-[pulse-slow_15s_ease-in-out_infinite]" alt="Kegiatan FMKD 1">
        </div>
        <!-- Slide 2 -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="assets/img/kegiatan/Gemini_Generated_Image_48lg7l48lg7l48lg.png" class="w-full h-full object-cover scale-105" alt="Kegiatan FMKD 2">
        </div>
        <!-- Slide 3 -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="assets/img/kegiatan/foto3.jpg" class="w-full h-full object-cover scale-105" alt="Kegiatan FMKD 3" onerror="this.src='assets/img/kegiatan/ptkexpo.png'">
        </div>
        <!-- Slide 4 -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="assets/img/kegiatan/foto4.jpg" class="w-full h-full object-cover scale-105" alt="Kegiatan FMKD 4" onerror="this.src='assets/img/kegiatan/ptkexpo.png'">
        </div>
        <!-- Slide 5 -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="assets/img/kegiatan/foto5.jpg" class="w-full h-full object-cover scale-105" alt="Kegiatan FMKD 5" onerror="this.src='assets/img/kegiatan/ptkexpo.png'">
        </div>

        <!-- Dark gradient overlay & particles -->
        <div class="absolute inset-0 bg-gradient-to-b from-navy/90 via-navy/60 to-transparent backdrop-blur-[2px]"></div>
        
        
        <!-- Glowing Orbs -->
        <div class="absolute top-[10%] left-[10%] w-[500px] h-[500px] bg-blue-600/30 rounded-full blur-[120px] mix-blend-screen animate-pulse-slow"></div>
        <div class="absolute bottom-[10%] right-[10%] w-[600px] h-[600px] bg-cyan-500/20 rounded-full blur-[150px] mix-blend-screen animate-float"></div>
    </div>

    <!-- TEXT CONTENT -->
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-28 pb-20 reveal reveal-scale">
        
        <!-- Live Clock Widget Glassmorphism -->
        <div class="inline-flex flex-col items-center justify-center mb-8 animate-float">
            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl px-10 py-5 shadow-[0_15px_40px_rgba(0,0,0,0.5)] flex flex-col items-center group hover:bg-white/15 transition-all duration-500 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-tr from-cyan-400/20 to-blue-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>
                <div class="text-white font-mono text-5xl md:text-6xl font-black tracking-widest drop-shadow-[0_0_15px_rgba(34,211,238,0.5)] relative z-10" id="live-time">00:00:00</div>
                <div class="text-cyan-300 text-sm md:text-base font-bold tracking-widest uppercase mt-2 drop-shadow-md relative z-10" id="live-date">Loading...</div>
            </div>
        </div>

        <br>
        <span class="inline-block py-2 px-6 rounded-full bg-white/5 border border-cyan-400/30 text-cyan-300 text-xs font-black tracking-[0.2em] mb-6 uppercase shadow-[0_0_20px_rgba(6,182,212,0.3)] backdrop-blur-md">
            Sinergi Mahasiswa Kedinasan
        </span>

        <!-- Slogan -->
        <div class="mb-8 relative z-10">
            <style>
                @keyframes textShine {
                    0% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                    100% { background-position: 0% 50%; }
                }
                .text-shine-anim {
                    background-size: 200% auto;
                    animation: textShine 4s linear infinite;
                }
            </style>
            <!-- Glow effect behind text -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[80%] h-[100%] bg-blue-500/20 blur-[80px] rounded-full z-0 animate-pulse"></div>
            <p class="relative z-10 text-5xl md:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-300 text-shine-anim italic tracking-tight uppercase leading-none drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)]">
                "FMKD JAKARTA RAYA<br>GAK ADA MATINYE!"
            </p>
        </div>

        <p class="text-xl md:text-2xl text-gray-300 mb-10 leading-relaxed font-light max-w-3xl mx-auto drop-shadow-xl z-10 relative">
            Wadah silaturahmi, pengembangan minat, bakat, dan kompetensi serta pengabdian masyarakat untuk seluruh <strong class="text-white font-semibold">Taruna/i dan Mahasiswa/i Perguruan Tinggi Kedinasan</strong> se-Jakarta Raya.
        </p>

                <div class="flex flex-col sm:flex-row justify-center gap-6 relative z-10">
            <a href="tentang.php" class="btn-ripple py-4 px-10 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold text-lg hover:from-blue-500 hover:to-cyan-400 transition-all duration-300 shadow-[0_10px_30px_rgba(6,182,212,0.4)] hover:shadow-[0_15px_40px_rgba(6,182,212,0.6)] hover:-translate-y-1">
                Pelajari Lebih Lanjut
            </a>
            <a href="database.php" class="btn-ripple py-4 px-10 rounded-2xl bg-white/10 text-white font-bold text-lg border border-white/20 hover:bg-white/20 transition-all duration-300 backdrop-blur-md hover:-translate-y-1">
                <i class="fa-solid fa-users mr-2"></i> Lihat Database
            </a>
        </div>
        
        <!-- PTK EXPO 2026 Button -->
        <div class="mt-8 flex justify-center relative z-10">
            <a href="javascript:alert('Coming Soon! Website PTK EXPO 2026 sedang dipersiapkan.');" class="btn-ripple py-4 px-8 md:px-12 rounded-2xl bg-gradient-to-r from-red-600 via-orange-500 to-yellow-500 text-white font-black text-lg md:text-xl hover:scale-105 transition-all duration-300 shadow-[0_0_30px_rgba(239,68,68,0.6)] hover:shadow-[0_0_50px_rgba(239,68,68,0.8)] border border-yellow-300/50 animate-pulse relative overflow-hidden group">
                <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></span>
                <i class="fa-solid fa-star text-yellow-200 mr-2 group-hover:rotate-180 transition-transform duration-700"></i> 
                <span class="drop-shadow-md">PTK EXPO 2026 !!</span> 
                <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform duration-300"></i>
            </a>
        </div>

        <!-- Dot Indicators -->
        <div class="flex justify-center gap-3 mt-16 z-10 relative">
            <button class="hero-dot w-3 h-3 rounded-full bg-cyan-400 transition-all duration-300 opacity-100 scale-125 shadow-[0_0_10px_rgba(34,211,238,0.8)]" onclick="goToSlide(0)"></button>
            <button class="hero-dot w-3 h-3 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300" onclick="goToSlide(1)"></button>
            <button class="hero-dot w-3 h-3 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300" onclick="goToSlide(2)"></button>
            <button class="hero-dot w-3 h-3 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300" onclick="goToSlide(3)"></button>
            <button class="hero-dot w-3 h-3 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300" onclick="goToSlide(4)"></button>
        </div>
    </div>

    <!-- Scroll down indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce z-10">
        <a href="#about" class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-cyan-300 hover:bg-cyan-500/20 hover:text-cyan-200 transition-colors shadow-[0_0_15px_rgba(34,211,238,0.2)]">
            <i class="fa-solid fa-arrow-down text-xl"></i>
        </a>
    </div>
</section>

<script>
    // Live Clock function
    function updateClock() {
        const now = new Date();
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        const dayName = days[now.getDay()];
        const date = now.getDate();
        const monthName = months[now.getMonth()];
        const year = now.getFullYear();
        
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        
        const timeString = `${hours}:${minutes}:${seconds}`;
        const dateString = `${dayName}, ${date} ${monthName} ${year}`;
        
        const timeElement = document.getElementById('live-time');
        const dateElement = document.getElementById('live-date');
        
        if (timeElement && dateElement) {
            timeElement.textContent = timeString;
            dateElement.textContent = dateString;
        }
    }
    updateClock();
    setInterval(updateClock, 1000);

    // Hero Slideshow
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');

    function goToSlide(n) {
        slides[currentSlide].style.opacity = '0';
        dots[currentSlide].classList.remove('opacity-100', 'scale-125', 'bg-cyan-400', 'shadow-[0_0_10px_rgba(34,211,238,0.8)]');
        dots[currentSlide].classList.add('bg-white/30');
        currentSlide = n;
        slides[currentSlide].style.opacity = '1';
        dots[currentSlide].classList.add('opacity-100', 'scale-125', 'bg-cyan-400', 'shadow-[0_0_10px_rgba(34,211,238,0.8)]');
        dots[currentSlide].classList.remove('bg-white/30');
    }

    function nextSlide() {
        goToSlide((currentSlide + 1) % slides.length);
    }

    setInterval(nextSlide, 6000);
</script>

<!-- Quick About Section -->
<section id="about" class="py-32 bg-transparent relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('assets/img/jakarta_skyline_bg.png')] bg-cover bg-center opacity-5 mix-blend-screen z-0"></div>
    <div class="absolute top-0 right-[-10%] w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[150px] z-0 animate-pulse-slow"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative reveal reveal-right">
                <div class="aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] relative z-10 group border border-white/10">
                    <img src="assets/img/home_about.jpg" alt="Students Gathering" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy via-navy/20 to-transparent opacity-80 group-hover:opacity-40 transition-opacity duration-500"></div>
                </div>
                <!-- Glowing Decors -->
                <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-cyan-500/30 blur-[50px] rounded-full z-0 group-hover:bg-cyan-400/50 transition-colors duration-500"></div>
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-blue-600/30 blur-[50px] rounded-full z-0 group-hover:bg-blue-500/50 transition-colors duration-500"></div>
            </div>
            
            <div class="reveal reveal-left" data-delay="100">
                <div class="inline-flex items-center gap-2 py-1.5 px-5 rounded-full bg-blue-500/10 border border-blue-400/20 text-cyan-300 text-xs font-black tracking-widest mb-6 uppercase">
                    Tentang Kami
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight drop-shadow-lg">
                    Membangun <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Sinergi</span>,<br> Mengukir Prestasi
                </h2>
                <p class="text-lg text-gray-400 mb-8 leading-relaxed font-light">
                    FMKD Jakarta Raya hadir sebagai platform kolaboratif yang menyatukan berbagai Perguruan Tinggi Kedinasan. Kami berkomitmen untuk menjadi wadah yang tidak hanya mempererat tali persaudaraan, namun juga memfasilitasi pengembangan karakter dan profesionalisme anggotanya.
                </p>
                <div class="space-y-5 mb-10 stagger-children visible">
                    <div class="flex items-center glass-dark p-4 rounded-2xl border border-white/5 hover:border-cyan-500/30 transition-colors">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-shield-halved text-white text-xl"></i>
                        </div>
                        <span class="ml-4 text-white font-semibold text-lg">Integritas dan Profesionalisme tinggi</span>
                    </div>
                    <div class="flex items-center glass-dark p-4 rounded-2xl border border-white/5 hover:border-emerald-500/30 transition-colors">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-users text-white text-xl"></i>
                        </div>
                        <span class="ml-4 text-white font-semibold text-lg">Berlandaskan asas kekeluargaan</span>
                    </div>
                    <div class="flex items-center glass-dark p-4 rounded-2xl border border-white/5 hover:border-orange-500/30 transition-colors">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-orange-400 to-pink-500 flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-hand-holding-heart text-white text-xl"></i>
                        </div>
                        <span class="ml-4 text-white font-semibold text-lg">Pengabdian nyata kepada masyarakat</span>
                    </div>
                </div>
                <a href="tentang.php" class="btn-ripple inline-flex items-center py-4 px-8 rounded-2xl bg-white/10 text-white font-bold border border-white/20 hover:bg-cyan-600 hover:border-cyan-500 transition-all duration-300 backdrop-blur-md">
                    Baca Selengkapnya 
                    <i class="fa-solid fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles Section -->
<section class="py-32 bg-transparent relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20 reveal">
            <div class="inline-flex items-center gap-2 py-1.5 px-5 rounded-full bg-blue-500/10 border border-blue-400/20 text-blue-400 text-xs font-black tracking-widest mb-6 uppercase">
                Informasi Terkini
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6">Kegiatan & Berita <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Terbaru</span></h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-600 to-cyan-400 mx-auto rounded-full"></div>
        </div>

        <?php
        require_once 'config/db.php';
        $stmt_latest = $pdo->query("SELECT * FROM artikel ORDER BY id DESC LIMIT 3");
        $latest_articles = $stmt_latest->fetchAll(PDO::FETCH_ASSOC);

        if (!function_exists('getCategoryColor')) {
            function getCategoryColor($cat) {
                $c = ['Kegiatan' => 'bg-blue-600', 'Opini' => 'bg-purple-600', 'Pengabdian' => 'bg-emerald-500', 'Akademik' => 'bg-orange-500'];
                return $c[$cat] ?? 'bg-gray-600';
            }
        }
        ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 stagger-children">
            <?php foreach ($latest_articles as $article): ?>
            <!-- Article Card Glassmorphism -->
            <div class="group bg-white/10 backdrop-blur-xl rounded-[2.5rem] overflow-hidden shadow-xl border border-white hover:shadow-[0_20px_50px_rgba(37,99,235,0.15)] hover:border-blue-300 transition-all duration-500 transform hover:-translate-y-3 flex flex-col h-full">
                <div class="relative overflow-hidden aspect-[4/3]">
                    <img src="<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-5 left-5 <?= getCategoryColor($article['category']) ?> text-white text-xs font-black uppercase tracking-wider px-4 py-1.5 rounded-full shadow-lg transform group-hover:-translate-y-1 transition-transform">
                        <?= $article['category'] ?>
                    </div>
                </div>
                <div class="p-8 flex-grow flex flex-col bg-transparent">
                    <div class="flex items-center text-xs font-bold text-gray-400 mb-4 uppercase tracking-widest">
                        <i class="fa-regular fa-calendar-days text-blue-500 mr-2"></i> <?= $article['date'] ?>
                    </div>
                    <h3 class="text-2xl font-black text-white mb-4 group-hover:text-blue-400 transition-colors line-clamp-2 leading-tight"><?= htmlspecialchars($article['title']) ?></h3>
                    <p class="text-gray-400 mb-6 line-clamp-3 font-medium leading-relaxed flex-grow"><?= htmlspecialchars($article['excerpt']) ?></p>
                    <a href="artikel-detail.php?id=<?= $article['id'] ?>" class="btn-ripple w-full py-4 rounded-2xl bg-blue-50 text-blue-600 font-bold text-center hover:bg-blue-600 hover:text-white transition-colors duration-300 flex items-center justify-center gap-2 group-hover:gap-3">
                        Baca Selengkapnya <i class="fa-solid fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-16">
            <a href="artikel.php" class="btn-ripple inline-flex items-center py-4 px-10 rounded-full bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold tracking-wider hover:shadow-[0_10px_30px_rgba(6,182,212,0.4)] transition-all duration-300 transform hover:-translate-y-1 text-lg">
                Lihat Semua Artikel <i class="fa-solid fa-newspaper ml-3"></i>
            </a>
        </div>
    </div>
</section>

<!-- Asal Politeknik / Mitra PTK Section -->
<section class="py-32 bg-transparent text-white relative overflow-hidden">
    
    
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 py-1.5 px-5 rounded-full bg-blue-50 border border-blue-100 text-blue-400 text-xs font-black tracking-widest mb-6 uppercase">
            Kolaborasi Institusi
        </div>
        <h2 class="text-4xl md:text-5xl font-black text-white mb-16">Perguruan Tinggi <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Tergabung</span></h2>
        
        <?php
        $daftar_ptk = [
            ['nama' => 'Politeknik Statistika STIS', 'logo' => 'assets/img/ptk/stis.png'],
            ['nama' => 'Politeknik Imigrasi dan Pemasyarakatan', 'logo' => 'assets/img/ptk/kemenkumham.png'],
            ['nama' => 'Politeknik Kelautan dan Perikanan Sidoarjo', 'logo' => 'assets/img/ptk/kkp_sidoarjo.png'],
            ['nama' => 'Politeknik Siber dan Sandi Negara', 'logo' => 'assets/img/ptk/poltek_ssn.png'],
            ['nama' => 'Sekolah Tinggi Ilmu Pelayaran', 'logo' => 'assets/img/ptk/stip.png'],
            ['nama' => 'Politeknik Keuangan Negara STAN', 'logo' => 'assets/img/ptk/stan.png'],
            ['nama' => 'Politeknik Ketenagakerjaan', 'logo' => 'assets/img/ptk/polteknaker.png'],
            ['nama' => 'Politeknik Ahli Usaha Perikanan Jakarta', 'logo' => 'assets/img/ptk/aup.png'],
            ['nama' => 'Politeknik Pembangunan Pertanian', 'logo' => 'assets/img/ptk/polbangtan.png'],
            ['nama' => 'Politeknik Kelautan dan Perikanan Pangandaran', 'logo' => 'assets/img/ptk/kkp_pangandaran.png'],
            ['nama' => 'Politeknik Kelautan dan Perikanan Karawang', 'logo' => 'assets/img/ptk/kkp_karawang.png'],
            ['nama' => 'Politeknik Enjiniring Pertanian Indonesia', 'logo' => 'assets/img/ptk/pepi.png'],
            ['nama' => 'Politeknik Penerbangan Surabaya', 'logo' => 'assets/img/ptk/poltekbang_surabaya.png'],
            ['nama' => 'Politeknik Pelayaran Sulawesi Utara', 'logo' => 'assets/img/ptk/poltekpel_sulut.png'],
        ];
        ?>
        <style>
            .ptk-card {
                position: relative;
                background: transparent;
            }
            .ptk-card-inner {
                position: relative;
                z-index: 1;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 2rem;
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 2rem 1.5rem;
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.05);
                transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                overflow: hidden;
            }
            .ptk-card:hover .ptk-card-inner {
                transform: translateY(-12px);
                border-color: #93c5fd;
                box-shadow: 0 25px 40px -10px rgba(59, 130, 246, 0.2);
            }
            .ptk-img-wrap {
                width: 130px;
                height: 130px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1.5rem;
                transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                background: white; border-radius: 50%; padding: 1.25rem; box-shadow: 0 10px 30px rgba(255,255,255,0.15), inset 0 0 20px rgba(0,0,0,0.05); border: 1px solid rgba(255,255,255,0.5);
            }
            .ptk-card:hover .ptk-img-wrap {
                transform: scale(1.15) rotate(5deg);
            }
            .ptk-card-glow {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100px;
                height: 100px;
                background: rgba(59, 130, 246, 0.2);
                border-radius: 50%;
                filter: blur(40px);
                opacity: 0;
                transition: opacity 0.5s ease;
                z-index: 0;
            }
            .ptk-card:hover .ptk-card-glow {
                opacity: 1;
            }
        </style>
        <div class="flex flex-wrap justify-center gap-8 px-4 stagger-children visible">
            <?php foreach ($daftar_ptk as $ptk): ?>
            <div class="ptk-card w-[220px] h-[280px] cursor-pointer group" title="<?= htmlspecialchars($ptk['nama']) ?>">
                <div class="ptk-card-glow"></div>
                <div class="ptk-card-inner">
                    <div class="ptk-img-wrap">
                        <img src="<?= htmlspecialchars($ptk['logo']) ?>" alt="<?= htmlspecialchars($ptk['nama']) ?>" class="max-w-full max-h-full object-contain mix-blend-normal" >
                    </div>
                    <p class="text-[15px] font-black text-center text-slate-200 leading-snug line-clamp-3 group-hover:text-blue-400 transition-colors"><?= htmlspecialchars($ptk['nama']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
                <div class="mt-32 max-w-6xl mx-auto reveal">
            <div class="text-center mb-12">
                <h3 class="text-2xl md:text-3xl font-black text-white mb-4">Daftar Lengkap 60 Perguruan Tinggi Kedinasan</h3>
                <p class="text-gray-400 text-lg">Hingga saat ini FMKD dibawah naungan FMKI beranggotakan 60 Perguruan Tinggi Kedinasan dengan rincian sebagai berikut:</p>
            </div>
            
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-[2.5rem] p-8 md:p-12 shadow-2xl">
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-4">
                    <?php
                    $full_ptk_list = [
                        'Akademi Angkatan Laut (AAL)', 'Akademi Metrologi dan Instrumentasi (AKMET) Bandung', 'Akademi Penerbangan Indonesia Banyuwangi', 'Institut Pemerintahan Dalam Negeri (IPDN)', 'Perguruan Tinggi Ilmu Kepolisian (PTIK STIK)', 'Politeknik Ahli Usaha Perikanan (POLTEK AUP) Jakarta-Bogor', 'Politeknik Akademi Kimia Analisis (POLTEK AKA) Bogor', 'Politeknik Akademi Pimpinan Perusahaan (POLTEK APP) Jakarta', 'Politeknik Akademi Teknologi Kulit (POLTEK ATK) Yogyakarta', 'Politeknik Energi dan Mineral Akamigas (PEM Akamigas) Cepu', 'Politeknik Enjiniring Pertanian Indonesia', 'Politeknik Ilmu Pelayaran (PIP) Semarang', 'Politeknik Ilmu Pemasyarakatan (POLTEKIP)', 'Politeknik Imigrasi (POLTEKIM)', 'Politeknik Industri Furnitur dan Pengolahan Kayu (POLITUR) Kendal', 'Politeknik Kelautan dan Perikanan (POLTEK KP) Aceh', 'Politeknik Kelautan dan Perikanan (POLTEK KP) Bone', 'Politeknik Kelautan dan Perikanan (POLTEK KP) Jembrana, Bali', 'Politeknik Kelautan dan Perikanan (POLTEK KP) Karawang', 'Politeknik Kelautan dan Perikanan (POLTEK KP) Pangandaran', 'Politeknik Kelautan dan Perikanan (POLTEK KP) Sidoarjo', 'Politeknik Kesehatan (POLTEKKES) Jakarta II', 'Politeknik Kesehatan (POLTEKKES) Jakarta III', 'Politeknik Kesejahteraan Sosial (POLTEKESOS) Bandung', 'Politeknik Keselamatan Transportasi Jalan (PKTJ) Tegal', 'Politeknik Keuangan Negara STAN (PKN STAN)', 'Politeknik Pelayaran (POLTEKPEL) Banten', 'Politeknik Pelayaran (POLTEKPEL) Malahayati Aceh', 'Politeknik Pelayaran (POLTEKPEL) Sorong', 'Politeknik Pelayaran (POLTEKPEL) Sulawesi Utara', 'Politeknik Pelayaran (POLTEKPEL) Sumatera Barat', 'Politeknik Pelayaran (POLTEKPEL) Surabaya', 'Politeknik Pembangunan Pertanian (POLBANGTAN) Bogor', 'Politeknik Pembangunan Pertanian (POLBANGTAN) Gowa', 'Politeknik Pembangunan Pertanian (POLBANGTAN) Malang', 'Politeknik Pembangunan Pertanian (POLBANGTAN) Manokwari', 'Politeknik Pembangunan Pertanian (POLBANGTAN) Medan', 'Politeknik Pembangunan Pertanian (POLBANGTAN) Yogyakarta Magelang', 'Politeknik Penerbangan (POLTEKBANG) Jayapura', 'Politeknik Penerbangan (POLTEKBANG) Makasar', 'Politeknik Penerbangan (POLTEKBANG) Medan', 'Politeknik Penerbangan (POLTEKBANG) Palembang', 'Politeknik Penerbangan (POLTEKBANG) Surabaya', 'Politeknik Penerbangan Indonesia (PPI) Curug', 'Politeknik Perkeretaapian Indonesia (PPI) Madiun', 'Politeknik Sekolah Tinggi Manajemen Indonesia (POLTEK STMI) Jakarta', 'Politeknik Sekolah Tinggi Teknologi Tekstil (POLTEK STTT) Bandung', 'Politeknik Siber dan Sandi Negara (POLTEK SSN)', 'Politeknik Statistika STIS (POLTEK STAT STIS) Jakarta', 'Politeknik Transportasi Darat Indonesia - STTD Bekasi', 'Politeknik Transportasi SDP (POLTEKTRANS SDP) Palembang', 'Sekolah Tinggi Ilmu Pelayaran (STIP) Jakarta', 'Sekolah Tinggi Meteorologi Klimatologi dan Geofisika (STMKG)', 'Sekolah Tinggi Pertanahan Nasional (STPN) Yogyakarta', 'Politeknik Teknologi Nuklir Indonesia (Poltek Nuklir) BRIN', 'Politeknik Transportasi Darat (POLTRADA) Bali', 'Politeknik Ketenagakerjaan (POLTEKNAKER) Jakarta', 'Politeknik Ilmu Pelayaran Makassar', 'Sekolah Tinggi Intelijen Negara (STIN)', 'Sekolah Tinggi Multimedia MMTC'
                    ];
                    foreach ($full_ptk_list as $ptk_item): ?>
                        <li class="flex items-start gap-3 group">
                            <i class="fa-solid fa-check text-cyan-400 mt-1 opacity-70 group-hover:opacity-100 transition-opacity"></i>
                            <span class="text-gray-300 text-sm font-medium group-hover:text-white transition-colors leading-relaxed"><?= htmlspecialchars($ptk_item) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

</div>
    </div>
</section>

<?php include 'components/footer.php'; ?>







