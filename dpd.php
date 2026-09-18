<?php
$pageTitle = 'DPD - Database Kepengurusan';
include 'components/header.php';
include 'components/navbar.php';

require_once 'config/db.php';

// Fungsi helper untuk mengambil data pengurus
function getPengurus($pdo, $kategori, $level) {
    $stmt = $pdo->prepare("SELECT * FROM pengurus WHERE kategori = :kategori AND level = :level ORDER BY id ASC");
    $stmt->execute([':kategori' => $kategori, ':level' => $level]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Data DPD
$dpd_ketua = getPengurus($pdo, 'dpd', 'ketua');
$dpd_sekbend = getPengurus($pdo, 'dpd', 'sekbend');
$dpd_kadiv = getPengurus($pdo, 'dpd', 'kadiv');
$dpd_kasi = getPengurus($pdo, 'dpd', 'kasi');
$dpd_staff = getPengurus($pdo, 'dpd', 'staff');

// Helper function untuk generate initial avatar
function getInitials($name) {
    $words = explode(' ', $name);
    $initials = '';
    foreach ($words as $w) {
        $initials .= $w[0];
    }
    return strtoupper(substr($initials, 0, 2));
}

function getPtkLogo($kedinasan) {
    $kedinasan_lower = strtolower($kedinasan);
    
    if (strpos($kedinasan_lower, 'siber dan sandi') !== false) return 'assets/img/ptk/poltek_ssn.png';
    if (strpos($kedinasan_lower, 'statistika stis') !== false) return 'assets/img/ptk/stis.png';
    if (strpos($kedinasan_lower, 'keuangan negara stan') !== false) return 'assets/img/ptk/stan.png';
    if (strpos($kedinasan_lower, 'ketenagakerjaan') !== false) return 'assets/img/ptk/polteknaker.png';
    if (strpos($kedinasan_lower, 'imigrasi') !== false || strpos($kedinasan_lower, 'pemasyarakatan') !== false) return 'assets/img/ptk/kemenkumham.png';
    if (strpos($kedinasan_lower, 'enjiniring pertanian') !== false) return 'assets/img/ptk/pepi.png';
    if (strpos($kedinasan_lower, 'pembangunan pertanian') !== false) return 'assets/img/ptk/polbangtan.png';
    if (strpos($kedinasan_lower, 'kelautan dan perikanan karawang') !== false) return 'assets/img/ptk/kkp_karawang.png';
    if (strpos($kedinasan_lower, 'kelautan dan perikanan pangandaran') !== false) return 'assets/img/ptk/kkp_pangandaran.png';
    if (strpos($kedinasan_lower, 'kelautan dan perikanan sidoarjo') !== false) return 'assets/img/ptk/kkp_sidoarjo.png';
    if (strpos($kedinasan_lower, 'penerbangan surabaya') !== false) return 'assets/img/ptk/poltekbang_surabaya.png';
    if (strpos($kedinasan_lower, 'pelayaran sulawesi utara') !== false) return 'assets/img/ptk/poltekpel_sulut.png';
    if (strpos($kedinasan_lower, 'sekolah tinggi ilmu pelayaran') !== false || strpos($kedinasan_lower, 'ilmu pelayaran') !== false || strpos($kedinasan_lower, 'stip') !== false) return 'assets/img/ptk/stip.png';
    if (strpos($kedinasan_lower, 'ahli usaha perikanan') !== false || strpos($kedinasan_lower, 'aup') !== false) return 'assets/img/ptk/aup.png';
    if (strpos($kedinasan_lower, 'fmkd') !== false) return 'assets/img/logo-fmkd-new.png';
    
    return 'assets/img/logo-fmkd-new.png';
}

function renderProfileCard($member) {
    $initials = getInitials($member['nama']);
    $colors = ['bg-blue-100 text-blue-600', 'bg-green-100 text-green-600', 'bg-purple-100 text-purple-600', 'bg-orange-100 text-orange-600', 'bg-pink-100 text-pink-600'];
    $avatarColor = $colors[array_rand($colors)];

    if (stripos($member['nama'], 'Balqis') !== false) {
        $avatarColor = 'bg-blue-200 text-blue-700';
    }

    $avatarContent = "";
    if (!empty($member['foto']) && file_exists($member['foto'])) {
        $ext = strtolower(pathinfo($member['foto'], PATHINFO_EXTENSION));
        if ($ext === 'pdf') {
            $avatarContent = $initials;
        } else {
            $avatarContent = "<img src=\"{$member['foto']}\" alt=\"{$member['nama']}\" class=\"w-full h-full rounded-full object-cover\">";
        }
    } else {
        $avatarContent = $initials;
    }
    
    $ptk_logo = getPtkLogo($member['kedinasan']);

    // Extract base color from badge_color (e.g., 'bg-blue-600' -> 'blue-600')
    preg_match('/bg-([a-z]+-\d+)/', $member['badge_color'], $matches);
    $borderColor = isset($matches[1]) ? 'border-' . $matches[1] : 'border-blue-500';

    return "
    <div class=\"bg-white/10 backdrop-blur-xl rounded-2xl shadow-[0_8px_30px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_30px_rgba(0,0,0,0.12)] transition-all duration-500 p-6 pb-0 flex flex-col items-center text-center border border-white/10 border-t-4 {$borderColor} group transform hover:-translate-y-2 hover:scale-[1.02] w-full h-[360px] relative overflow-hidden\">
        <!-- Decorative Glow -->
        <div class=\"absolute -top-10 -right-10 w-40 h-40 {$member['badge_color']} rounded-full blur-[50px] opacity-10 group-hover:opacity-20 transition-opacity duration-700\"></div>
        
        <div class=\"w-24 h-24 rounded-full flex items-center justify-center text-2xl font-bold mt-2 mb-4 shadow-sm group-hover:shadow-md group-hover:ring-4 ring-offset-2 ring-blue-50 transition-all duration-500 $avatarColor relative z-10 shrink-0\">
            $avatarContent
        </div>
        
        <div class=\"flex-1 w-full flex flex-col justify-center relative z-10\">
            <h4 class=\"text-lg font-bold text-white mb-1 group-hover:text-blue-400 transition-colors leading-tight line-clamp-2\">{$member['nama']}</h4>
            <p class=\"text-xs text-gray-400 font-medium tracking-wide mt-1\">NIP: 199901012026011001</p>
        </div>
        
        <div class=\"w-full h-12 flex items-center justify-center mb-4 relative z-10\">
            <div class=\"inline-block px-4 py-1.5 rounded-full text-[11px] font-extrabold uppercase tracking-widest shadow-sm {$member['badge_color']} text-center line-clamp-2 transition-transform duration-300 group-hover:scale-105 border border-transparent hover:border-white/20\">
                {$member['jabatan']}
            </div>
        </div>
        
        <div class=\"w-full h-16 flex items-center justify-center space-x-3 border-t border-white/10 relative z-10 bg-black/30 px-6 mt-auto transition-colors duration-300 group-hover:bg-white/10\">
            <img src=\"{$ptk_logo}\" alt=\"Logo PTK\" class=\"w-8 h-8 object-contain shrink-0 mix-blend-normal group-hover:rotate-6 transition-transform duration-300 group-hover:scale-110\">
            <p class=\"text-[11px] text-white font-bold drop-shadow-md text-center leading-tight line-clamp-3 uppercase tracking-wide\">
                {$member['kedinasan']}
            </p>
        </div>
    </div>
    ";
}
?>

<!-- Page Header -->
<section class="relative pt-32 pb-16 bg-navy overflow-hidden">
    <div class="absolute inset-0 z-0" style="-webkit-mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%); mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%);">
        <!-- Jakarta Skyline Background -->
        <div class="absolute inset-0 bg-[url('assets/img/jakarta_skyline_bg.png')] bg-cover bg-center bg-no-repeat opacity-30 mix-blend-screen"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-navy via-navy/80 to-transparent"></div>
        <!-- Theme Accents -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-orange-500/10 rounded-full blur-[120px] mix-blend-screen"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-cyan-500/10 rounded-full blur-[120px] mix-blend-screen"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center justify-center space-x-2 bg-white/10 backdrop-blur-sm px-6 py-2 rounded-full mb-6 border border-white/20 animate-slide-up shadow-[0_0_15px_rgba(242,101,34,0.3)]">
            <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
            <span class="text-white text-sm font-semibold tracking-wider uppercase">Jakarta Raya Pride</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 animate-slide-up leading-tight tracking-tight drop-shadow-2xl">
            DATABASE <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-yellow-300 to-cyan-400 filter drop-shadow-lg">DPD</span>
        </h1>
        <p class="text-gray-200 text-lg md:text-xl max-w-3xl mx-auto animate-slide-up font-medium" style="animation-delay: 0.1s;">
            Struktur Dewan Pimpinan Daerah Forum Mahasiswa Kedinasan Daerah Jakarta Raya Periode 2026/2027.
        </p>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-slate-50 min-h-screen relative overflow-hidden">
    <!-- Ambient glowing orbs -->
    <div class="absolute top-1/4 left-0 w-96 h-96 bg-blue-100/50 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-0 w-96 h-96 bg-cyan-100/50 rounded-full blur-[100px] pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section 1: DPD -->
        <div class="mb-20">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-black text-white inline-block relative mb-6 tracking-wide drop-shadow-sm">
                    Dewan Pimpinan Daerah (DPD)
                    <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 w-3/4 h-1 bg-gradient-to-r from-blue-500 via-cyan-400 to-blue-500 rounded-full opacity-80"></div>
                </h2>
                <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-md p-6 md:p-8 rounded-2xl shadow-sm border border-white/10 relative mt-6">
                    <i class="fa-solid fa-quote-left absolute top-4 left-4 text-blue-100 text-3xl"></i>
                    <p class="text-gray-300 leading-relaxed italic relative z-10 px-6 font-medium text-lg">
                        "Dewan Pimpinan Daerah adalah unsur pelaksana yang memiliki tugas, wewenang, dan tanggung jawab untuk melaksanakan amanat Musyawarah Daerah selama satu periode masa bakti sesuai dengan Anggaran Dasar dan Anggaran Rumah Tangga FMKD Jakarta Raya."
                    </p>
                    <i class="fa-solid fa-quote-right absolute bottom-4 right-4 text-blue-100 text-3xl"></i>
                </div>
            </div>

            <!-- Hierarki: Ketua -->
            <div class="flex justify-center mb-10 animate-slide-up">
                <div class="w-full md:w-1/3 lg:w-1/4">
                    <?= renderProfileCard($dpd_ketua[0]) ?>
                </div>
            </div>

            <!-- Sekbend (Optional if they are below Ketua) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12 animate-slide-up" style="animation-delay: 0.1s;">
                <?php foreach($dpd_sekbend as $member): ?>
                    <?= renderProfileCard($member) ?>
                <?php endforeach; ?>
            </div>

            <!-- Struktur Per Divisi -->
            <?php
            $divisi_list = [
                [
                    'nama' => 'Divisi Perencanaan dan Pengembangan',
                    'bg' => 'bg-blue-100/50',
                    'border' => 'border-blue-100',
                    'title_color' => 'text-blue-400',
                    'kadiv' => array_filter($dpd_kadiv, fn($m) => strpos($m['badge_color'], 'blue-800') !== false),
                    'kasi' => array_filter($dpd_kasi, fn($m) => strpos($m['badge_color'], 'blue-600') !== false),
                    'staff' => array_filter($dpd_staff, fn($m) => strpos($m['badge_color'], 'blue-400') !== false),
                ],
                [
                    'nama' => 'Divisi Komunikasi dan Digital',
                    'bg' => 'bg-purple-100/50',
                    'border' => 'border-purple-100',
                    'title_color' => 'text-purple-400',
                    'kadiv' => array_filter($dpd_kadiv, fn($m) => strpos($m['badge_color'], 'purple-700') !== false),
                    'kasi' => array_filter($dpd_kasi, fn($m) => strpos($m['badge_color'], 'purple-500') !== false),
                    'staff' => array_filter($dpd_staff, fn($m) => strpos($m['badge_color'], 'purple-400') !== false),
                ],
                [
                    'nama' => 'Divisi Hubungan Masyarakat',
                    'bg' => 'bg-yellow-100/50',
                    'border' => 'border-yellow-100',
                    'title_color' => 'text-yellow-400',
                    'kadiv' => array_filter($dpd_kadiv, fn($m) => strpos($m['badge_color'], 'yellow-600') !== false),
                    'kasi' => array_filter($dpd_kasi, fn($m) => strpos($m['badge_color'], 'yellow-500') !== false),
                    'staff' => array_filter($dpd_staff, fn($m) => strpos($m['badge_color'], 'yellow-400') !== false),
                ],
                [
                    'nama' => 'Divisi Ekonomi Kreatif',
                    'bg' => 'bg-teal-100/50',
                    'border' => 'border-teal-100',
                    'title_color' => 'text-teal-400',
                    'kadiv' => array_filter($dpd_kadiv, fn($m) => strpos($m['badge_color'], 'teal-600') !== false),
                    'kasi' => array_filter($dpd_kasi, fn($m) => strpos($m['badge_color'], 'teal-500') !== false),
                    'staff' => array_filter($dpd_staff, fn($m) => strpos($m['badge_color'], 'teal-400') !== false),
                ]
            ];
            
            $delay = 0.2;
            foreach ($divisi_list as $div):
            ?>
            <div class="mb-16 border border-white bg-white/70 backdrop-blur-xl shadow-lg rounded-[2.5rem] p-6 md:p-12 animate-slide-up relative overflow-hidden group/divisi" style="animation-delay: <?= $delay ?>s;">
                <!-- Decorative Animated Blobs -->
                <div class="absolute top-0 right-0 w-80 h-80 <?= $div['bg'] ?> rounded-full blur-[80px] -z-10 opacity-60 group-hover/divisi:opacity-100 group-hover/divisi:scale-110 transition-all duration-1000 ease-in-out"></div>
                <div class="absolute bottom-0 left-0 w-80 h-80 <?= $div['bg'] ?> rounded-full blur-[80px] -z-10 opacity-60 group-hover/divisi:opacity-100 group-hover/divisi:scale-110 transition-all duration-1000 ease-in-out"></div>
                
                <div class="flex items-center justify-center mb-14 relative z-10">
                    <h3 class="text-2xl md:text-3xl font-black text-center <?= $div['title_color'] ?> uppercase tracking-widest bg-white/10 backdrop-blur-md px-10 py-5 rounded-2xl shadow-sm border <?= $div['border'] ?> transform hover:scale-105 transition-transform duration-300"><?= $div['nama'] ?></h3>
                </div>
                
                <!-- Kepala Divisi -->
                <div class="flex justify-center mb-8">
                    <?php foreach($div['kadiv'] as $member): ?>
                        <div class="w-full sm:w-72">
                            <?= renderProfileCard($member) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Seksi & Staff -->
                <?php if(count($div['kasi']) > 0): ?>
                <div class="flex flex-wrap justify-center items-start gap-x-8 gap-y-12">
                    <?php foreach($div['kasi'] as $kasi): 
                        $is_bidang = stripos($kasi['jabatan'], 'Bidang') !== false;
                        $prefix_title = $is_bidang ? 'BIDANG' : 'SEKSI';
                        $seksi_name = str_ireplace(['Kepala Seksi ', 'Kepala Bidang '], '', $kasi['jabatan']);
                        $staff_for_this_kasi = array_filter($div['staff'], function($s) use ($seksi_name) {
                            return stripos(trim(str_ireplace('Staff ', '', $s['jabatan'])), trim($seksi_name)) !== false;
                        });
                    ?>
                        <div class="flex-1 min-w-[280px] max-w-[320px] flex flex-col items-center relative z-10">
                            <!-- Card Kasi -->
                            <div class="w-full relative z-10">
                                <div class="text-center text-sm font-extrabold <?= $div['title_color'] ?> uppercase mb-4 bg-white/10 backdrop-blur-md px-5 py-2.5 rounded-xl border <?= $div['border'] ?> shadow-sm tracking-widest">
                                    <?= $prefix_title ?><br/><span class="text-white"><?= $seksi_name ?></span>
                                </div>
                                <?= renderProfileCard($kasi) ?>
                            </div>
                            
                            <!-- Staff List -->
                            <?php if(count($staff_for_this_kasi) > 0): ?>
                            <!-- Garis vertikal penghubung -->
                            <div class="w-1.5 h-10 bg-gradient-to-b from-gray-200 to-transparent rounded-full my-3"></div>
                            
                            <div class="w-full space-y-6 bg-white/60 backdrop-blur-xl p-6 rounded-3xl border border-white/10 shadow-sm hover:shadow-md transition-all duration-300">
                                <h4 class="text-xs font-bold text-center text-gray-400 uppercase mb-4 tracking-widest flex items-center justify-center gap-2">
                                    <span class="w-4 h-px bg-gray-300"></span>
                                    Anggota Staff
                                    <span class="w-4 h-px bg-gray-300"></span>
                                </h4>
                                <?php foreach($staff_for_this_kasi as $staff): ?>
                                    <div class="transform scale-[0.98] origin-top hover:scale-100 transition-transform">
                                        <?= renderProfileCard($staff) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php 
            $delay += 0.1;
            endforeach; 
            ?>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>

