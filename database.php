<?php
$pageTitle = 'Database Kepengurusan';
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

// Data Dewas
$dewas_ketua = getPengurus($pdo, 'dewas', 'ketua');
$dewas_komisi = getPengurus($pdo, 'dewas', 'komisi');
$dewas_kasi = getPengurus($pdo, 'dewas', 'kasi');
$dewas_staff = getPengurus($pdo, 'dewas', 'staff');

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
    $colors = ['from-blue-400 to-cyan-300', 'from-green-400 to-emerald-300', 'from-purple-400 to-pink-300', 'from-orange-400 to-yellow-300', 'from-pink-400 to-rose-300'];
    $avatarColor = $colors[array_rand($colors)];

    if (stripos($member['nama'], 'Balqis') !== false) {
        $avatarColor = 'from-blue-600 to-blue-400';
    }

    $avatarContent = "";
    if (!empty($member['foto']) && file_exists($member['foto'])) {
        $ext = strtolower(pathinfo($member['foto'], PATHINFO_EXTENSION));
        if ($ext === 'pdf') {
            $avatarContent = "<span class=\"text-white drop-shadow-md\">{$initials}</span>";
        } else {
            $objectPos = "object-cover object-center";
            if (
                stripos($member['nama'], 'Zabina') !== false ||
                stripos($member['nama'], 'Claudy') !== false ||
                stripos($member['nama'], 'Keyla') !== false
            ) {
                $objectPos = "object-cover object-top";
            }

            if (stripos($member['nama'], 'Fildzah') !== false) {
                $objectPos = "object-cover object-top transform scale-[1.3]";
            }
            if (stripos($member['nama'], 'Gilang Viery') !== false) {
                $objectPos = "object-cover object-top origin-top transform scale-[1.5]";
            }
            $fotoSrc = $member['foto'] . '?v=' . filemtime($member['foto']);
            $avatarContent = "<img src=\"{$fotoSrc}\" alt=\"{$member['nama']}\" class=\"w-full h-full rounded-full {$objectPos}\">";
        }
    } else {
        $avatarContent = "<span class=\"text-white drop-shadow-md\">{$initials}</span>";
    }
    
    $ptk_logo = getPtkLogo($member['kedinasan']);

    // Override badge color to blue for all members
    $display_badge_color = $member['badge_color'];
    if (preg_match('/bg-[a-z]+-(\d+)/', $member['badge_color'], $color_match)) {
        $display_badge_color = "bg-gradient-to-r from-blue-" . $color_match[1] . " to-cyan-500 text-white shadow-[0_0_15px_rgba(37,99,235,0.4)]";
    }

    // Extract base color from display_badge_color
    preg_match('/bg-([a-z]+-\d+)/', $display_badge_color, $matches);
    $borderColor = isset($matches[1]) ? 'border-' . $matches[1] : 'border-blue-500';

    return "
    <div class=\"bg-navy/40 backdrop-blur-xl rounded-3xl shadow-[0_10px_30px_rgba(0,0,0,0.08)] hover:shadow-[0_20px_40px_rgba(37,99,235,0.2)] transition-all duration-500 p-6 pb-0 flex flex-col items-center text-center border-t-[6px] {$borderColor} border-x border-b border-white/10 group transform hover:-translate-y-2 relative overflow-hidden h-full min-h-[350px]\">
        <!-- Decorative Glow -->
        <div class=\"absolute -top-10 -right-10 w-32 h-32 {$display_badge_color} rounded-full blur-[50px] opacity-0 group-hover:opacity-30 transition-opacity duration-700\"></div>
        <div class=\"absolute -bottom-10 -left-10 w-32 h-32 {$display_badge_color} rounded-full blur-[50px] opacity-0 group-hover:opacity-20 transition-opacity duration-700\"></div>
        
        <div class=\"w-32 h-32 overflow-hidden rounded-full flex items-center justify-center text-4xl font-black mb-3 shadow-lg group-hover:shadow-[0_0_20px_rgba(37,99,235,0.4)] group-hover:ring-2 ring-offset-2 ring-white transition-all duration-500 bg-gradient-to-br $avatarColor relative z-10 shrink-0 transform group-hover:scale-110\">
            $avatarContent
        </div>
        
        <div class=\"flex-1 w-full flex flex-col justify-center relative z-10\">
            <h4 class=\"text-xl font-black text-white mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-blue-400 group-hover:to-cyan-300 transition-all duration-300 leading-tight line-clamp-2\">{$member['nama']}</h4>
        </div>
        
        <div class=\"w-full flex items-center justify-center mb-6 relative z-10\">
            <div class=\"inline-block px-4 py-2 rounded-full text-[11px] font-black uppercase tracking-wider shadow-sm {$display_badge_color} text-center line-clamp-2 transition-transform duration-300 group-hover:scale-105 border border-white/40 backdrop-blur-md\">
                {$member['jabatan']}
            </div>
        </div>
        
        <div class=\"w-full h-16 flex items-center justify-center space-x-3 border-t border-white/10 relative z-10 bg-gradient-to-t from-black/30 to-transparent px-5 mt-auto transition-colors duration-300 group-hover:from-white/10\">
            <div class=\"w-9 h-9 rounded-full bg-white shadow-[0_0_15px_rgba(255,255,255,0.3)] flex items-center justify-center shrink-0 p-1.5 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300\">
                <img src=\"{$ptk_logo}\" alt=\"Logo PTK\" class=\"w-full h-full object-contain mix-blend-normal\">
            </div>
            <p class=\"text-[11px] text-white font-bold drop-shadow-md text-left leading-tight line-clamp-2 uppercase tracking-wide\">
                {$member['kedinasan']}
            </p>
        </div>
    </div>
    ";
}
?>

<!-- Page Header -->
<section class="relative pt-32 pb-16 overflow-hidden min-h-[400px] flex items-center justify-center bg-transparent">
    <div class="absolute inset-0 z-0" style="-webkit-mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%); mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%);">
        <div class="absolute inset-0 bg-gradient-to-b from-navy/50 to-transparent"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSIvPjwvc3ZnPg==')] opacity-20"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-12">
        <div class="inline-flex items-center justify-center space-x-3 bg-white/10 backdrop-blur-md px-6 py-2.5 rounded-full mb-6 border border-white/20 animate-float">
            <span class="w-2 h-2 rounded-full bg-blue-400"></span>
            <span class="text-gray-100 text-xs font-bold tracking-widest uppercase">Jakarta Raya Pride</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 drop-shadow-md leading-tight tracking-tight">
            DATABASE <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-blue-500">KEPENGURUSAN</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto font-light">
            Struktur Organisasi <strong class="text-white">Forum Mahasiswa Kedinasan Daerah Jakarta Raya</strong> Periode 2026/2027. Berkolaborasi membangun Jakarta Raya yang lebih baik.
        </p>
    </div>
</section>

<!-- Main Content -->
<section class="py-32 bg-transparent relative min-h-screen overflow-hidden">
    
    <!-- Decorative Glowing Elements -->
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-500/30 rounded-full blur-[150px] z-0 pointer-events-none animate-pulse-slow"></div>
    <div class="absolute top-1/2 left-1/4 w-[400px] h-[400px] bg-indigo-500/20 rounded-full blur-[120px] z-0 pointer-events-none animate-float"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-cyan-400/20 rounded-full blur-[150px] z-0 pointer-events-none animate-pulse-slow" style="animation-delay: 2s;"></div>
    
    <!-- Subtle Pattern overlay -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSIvPjwvc3ZnPg==')] opacity-15 pointer-events-none z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section 1: DPD -->
        <div class="mb-32">
            <div class="text-center mb-24 reveal">
                <h2 class="text-4xl md:text-5xl font-black text-white inline-block relative mb-8 leading-tight">
                    Dewan Pimpinan <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-400">Daerah (DPD)</span>
                </h2>
                <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-xl p-8 md:p-10 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.05)] border border-white relative mt-4 group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-cyan-300 rounded-[2.5rem] blur opacity-0 group-hover:opacity-20 transition duration-1000"></div>
                    <i class="fa-solid fa-quote-left absolute top-6 left-6 text-blue-100 text-4xl group-hover:scale-110 transition-transform"></i>
                    <p class="text-gray-300 text-lg leading-relaxed font-medium relative z-10 px-8 text-center italic">
                        "Dewan Pimpinan Daerah adalah unsur pelaksana yang memiliki tugas, wewenang, dan tanggung jawab untuk melaksanakan amanat Musyawarah Daerah selama satu periode masa bakti sesuai dengan Anggaran Dasar dan Anggaran Rumah Tangga FMKD Jakarta Raya."
                    </p>
                    <i class="fa-solid fa-quote-right absolute bottom-6 right-6 text-blue-100 text-4xl group-hover:scale-110 transition-transform"></i>
                </div>
            </div>

            <!-- Hierarki: Ketua -->
            <div class="flex justify-center mb-16 reveal reveal-scale">
                <div class="w-full md:w-1/3 lg:w-1/4 min-w-[300px]">
                    <?= renderProfileCard($dpd_ketua[0]) ?>
                </div>
            </div>

            <!-- Sekbend -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-24 stagger-children">
                <?php foreach($dpd_sekbend as $member): ?>
                    <?= renderProfileCard($member) ?>
                <?php endforeach; ?>
            </div>

            <!-- Struktur Per Divisi -->
            <?php
            $divisi_list = [
                [
                    'nama' => 'Divisi Perencanaan dan Pengembangan',
                    'bg' => 'bg-blue-400/20',
                    'border' => 'border-blue-400/30',
                    'title_color' => 'text-blue-300',
                    'kadiv' => array_filter($dpd_kadiv, fn($m) => strpos($m['badge_color'], 'blue-800') !== false),
                    'kasi' => array_filter($dpd_kasi, fn($m) => strpos($m['badge_color'], 'blue-600') !== false),
                    'staff' => array_filter($dpd_staff, fn($m) => strpos($m['badge_color'], 'blue-400') !== false),
                ],
                [
                    'nama' => 'Divisi Komunikasi dan Digital',
                    'bg' => 'bg-purple-400/20',
                    'border' => 'border-purple-400/30',
                    'title_color' => 'text-blue-300',
                    'kadiv' => array_filter($dpd_kadiv, fn($m) => strpos($m['badge_color'], 'purple-700') !== false),
                    'kasi' => array_filter($dpd_kasi, fn($m) => strpos($m['badge_color'], 'purple-500') !== false),
                    'staff' => array_filter($dpd_staff, fn($m) => strpos($m['badge_color'], 'purple-400') !== false),
                ],
                [
                    'nama' => 'Divisi Hubungan Masyarakat',
                    'bg' => 'bg-yellow-400/20',
                    'border' => 'border-yellow-400/30',
                    'title_color' => 'text-blue-300',
                    'kadiv' => array_filter($dpd_kadiv, fn($m) => strpos($m['badge_color'], 'yellow-600') !== false),
                    'kasi' => array_filter($dpd_kasi, fn($m) => strpos($m['badge_color'], 'yellow-500') !== false),
                    'staff' => array_filter($dpd_staff, fn($m) => strpos($m['badge_color'], 'yellow-400') !== false),
                ],
                [
                    'nama' => 'Divisi Ekonomi Kreatif',
                    'bg' => 'bg-emerald-400/20',
                    'border' => 'border-emerald-400/30',
                    'title_color' => 'text-blue-300',
                    'kadiv' => array_filter($dpd_kadiv, fn($m) => strpos($m['badge_color'], 'teal-600') !== false),
                    'kasi' => array_filter($dpd_kasi, fn($m) => strpos($m['badge_color'], 'teal-500') !== false),
                    'staff' => array_filter($dpd_staff, fn($m) => strpos($m['badge_color'], 'teal-400') !== false),
                ]
            ];
            
            foreach ($divisi_list as $div):
            ?>
            <div class="mb-24 bg-navy/30 backdrop-blur-2xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-white/10 rounded-[3.5rem] p-8 md:p-16 relative overflow-hidden group/divisi reveal">
                <!-- Decorative Animated Blobs -->
                <div class="absolute top-0 right-0 w-80 h-80 <?= $div['bg'] ?> rounded-full blur-[80px] -z-10 group-hover/divisi:scale-125 transition-transform duration-1000 ease-in-out"></div>
                <div class="absolute bottom-0 left-0 w-80 h-80 <?= $div['bg'] ?> rounded-full blur-[80px] -z-10 group-hover/divisi:scale-125 transition-transform duration-1000 ease-in-out"></div>
                
                <div class="flex items-center justify-center mb-16 relative z-10">
                    <h3 class="text-2xl md:text-4xl font-black text-center <?= $div['title_color'] ?> uppercase tracking-widest bg-white/10 backdrop-blur-md px-10 py-5 rounded-[2rem] shadow-lg border <?= $div['border'] ?> transform group-hover/divisi:scale-105 transition-transform duration-500"><?= $div['nama'] ?></h3>
                </div>
                
                <!-- Kepala Divisi -->
                <div class="flex justify-center mb-16 relative z-10">
                    <?php foreach($div['kadiv'] as $member): ?>
                        <div class="w-full sm:w-[350px]">
                            <?= renderProfileCard($member) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Seksi & Staff -->
                <?php if(count($div['kasi']) > 0): ?>
                <div class="flex flex-wrap justify-center items-start gap-10 relative z-10">
                    <?php foreach($div['kasi'] as $kasi): 
                        $is_bidang = stripos($kasi['jabatan'], 'Bidang') !== false;
                        $prefix_title = $is_bidang ? 'BIDANG' : 'SEKSI';
                        $seksi_name = str_ireplace(['Kepala Seksi ', 'Kepala Bidang '], '', $kasi['jabatan']);
                        $staff_for_this_kasi = array_filter($div['staff'], function($s) use ($seksi_name) {
                            return stripos(trim(str_ireplace('Staff ', '', $s['jabatan'])), trim($seksi_name)) !== false;
                        });
                    ?>
                        <div class="flex-1 min-w-[300px] max-w-[350px] flex flex-col items-center relative group/seksi">
                            <!-- Card Kasi -->
                            <div class="w-full relative z-10 transform group-hover/seksi:-translate-y-2 transition-transform duration-500">
                                <div class="text-center text-sm font-black <?= $div['title_color'] ?> uppercase mb-4 bg-gradient-to-r from-blue-900/40 to-cyan-900/40 backdrop-blur-sm px-5 py-3 rounded-xl border border-blue-500/30 shadow-[0_0_15px_rgba(37,99,235,0.2)]">
                                    <?= $prefix_title ?><br/><?= $seksi_name ?>
                                </div>
                                <?= renderProfileCard($kasi) ?>
                            </div>
                            
                            <!-- Staff List -->
                            <?php if(count($staff_for_this_kasi) > 0): ?>
                            <!-- Garis vertikal penghubung glow -->
                            <div class="w-1.5 h-10 bg-gradient-to-b from-white/20 to-white/5 rounded-full my-4 shadow-inner group-hover/seksi:from-blue-400 group-hover/seksi:to-cyan-300 transition-colors duration-500"></div>
                            
                            <div class="w-full space-y-6 bg-white/5 backdrop-blur-xl p-6 rounded-[2rem] border border-white/10 shadow-lg group-hover/seksi:shadow-xl transition-all duration-500 group-hover/seksi:-translate-y-1">
                                <h4 class="text-xs font-black text-center text-gray-400 uppercase tracking-widest bg-white/10 py-2 rounded-lg mb-4">Anggota Staff</h4>
                                <?php foreach($staff_for_this_kasi as $staff): ?>
                                    <div class="transform scale-95 origin-top hover:scale-105 transition-transform duration-300">
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
            endforeach; 
            ?>
        </div>

        <!-- Section Divider -->
        <div class="flex items-center justify-center mb-32 opacity-60 reveal">
            <div class="w-32 md:w-64 h-0.5 bg-gradient-to-r from-transparent to-gray-400"></div>
            <i class="fa-solid fa-star mx-6 text-gray-400 text-xl animate-pulse"></i>
            <div class="w-32 md:w-64 h-0.5 bg-gradient-to-l from-transparent to-gray-400"></div>
        </div>

        <!-- Section 2: Bidang Pengawasan dan Evaluasi -->
        <div class="mb-20">
            <div class="text-center mb-24 reveal">
                <h2 class="text-4xl md:text-5xl font-black text-white inline-block relative mb-8 leading-tight uppercase">
                    Bidang Pengawasan <span class="text-transparent bg-clip-text bg-gradient-to-r from-slate-300 to-slate-100">dan Evaluasi</span>
                </h2>
                <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-xl p-8 md:p-10 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.05)] border border-white relative mt-4 group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-slate-300 to-slate-200 rounded-[2.5rem] blur opacity-0 group-hover:opacity-30 transition duration-1000"></div>
                    <i class="fa-solid fa-quote-left absolute top-6 left-6 text-slate-200 text-4xl group-hover:scale-110 transition-transform"></i>
                    <p class="text-gray-300 text-lg leading-relaxed font-medium relative z-10 px-8 text-center italic">
                        "Bidang Pengawasan dan Evaluasi memiliki tugas, wewenang, dan tanggungjawab sebagai evaluator untuk mengarahkan, memberikan masukan, dan melakukan pengawasan terhadap pelaksanaan tugas Dewan Pimpinan Daerah dan kegiatan anggota."
                    </p>
                    <i class="fa-solid fa-quote-right absolute bottom-6 right-6 text-slate-200 text-4xl group-hover:scale-110 transition-transform"></i>
                </div>
            </div>

            <?php
            // Re-strukturisasi array untuk mendukung hierarki
            $pengurus_dewas_array = [
                "Pimpinan Bidang Pengawasan dan Evaluasi" => [
                    "type" => "hierarchy",
                    "kepala" => ["foto" => "assets/img/fotopengurus/Satria Tegar.jpg", "nama" => "Satria Tegar Bimantara", "jabatan" => "Koordinator Bidang Pengawasan dan Evaluasi", "kedinasan" => "Politeknik Siber dan Sandi Negara", "badge_color" => "bg-slate-800 text-white"],
                    "anggota" => []
                ],
                "Pengawasan Sekretariat" => [
                    "type" => "hierarchy",
                    "kepala" => ["foto" => "assets/img/fotopengurus/Balqis Hasna Syauqiyah.png", "nama" => "Balqis Hasna Syauqiyah", "jabatan" => "Koordinator Pengawasan Sekretariat", "kedinasan" => "Politeknik Statistika STIS", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["foto" => "assets/img/fotopengurus/Qurrotun Nabila-1.png", "nama" => "Qurratun Nabila", "jabatan" => "Pengawas Administrasi", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-400 text-white"],
                        ["foto" => "assets/img/fotopengurus/Claudy Englen Hasan.jpg", "nama" => "Claudy Englen Hasan", "jabatan" => "Pengawas Administrasi", "kedinasan" => "Politeknik Statistika STIS", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Pengawasan Bendahara" => [
                    "type" => "hierarchy",
                    "kepala" => ["foto" => "assets/img/fotopengurus/Azzam Syamil.png", "nama" => "Azzam Syamil", "jabatan" => "Koordinator Pengawasan Bendahara", "kedinasan" => "Politeknik Keuangan Negara STAN", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["foto" => "assets/img/fotopengurus/SHIFAULA TATIA MUCHTARONA - Shifaula Tatia-1.png", "nama" => "Shifaula Tatia Muchtarona", "jabatan" => "Pengawas Keuangan", "kedinasan" => "Politeknik Statistika STIS", "badge_color" => "bg-slate-400 text-white"],
                        ["foto" => "assets/img/fotopengurus/IMAM MAARIF-1.png", "nama" => "Imam Maarif", "jabatan" => "Pengawas Keuangan", "kedinasan" => "Politeknik Keuangan Negara STAN", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Pengawasan Perencanaan dan Pengembangan" => [
                    "type" => "hierarchy",
                    "kepala" => ["foto" => "assets/img/fotopengurus/A. CHERYOZA (2). I.jpg", "nama" => "Adam Cheyroza", "jabatan" => "Koordinator Pengawasan Renbang", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["foto" => "assets/img/fotopengurus/Fatmaz Zara-1.png", "nama" => "Fatimah Tuzahroh", "jabatan" => "Pengawas Program dan Kinerja", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-400 text-white"],
                        ["foto" => "assets/img/fotopengurus/Novia Regina-1.png", "nama" => "Novia Regina", "jabatan" => "Pengawas Program dan Kinerja", "kedinasan" => "Politeknik Ketenagakerjaan", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Pengawasan Komunikasi dan Digital" => [
                    "type" => "hierarchy",
                    "kepala" => ["foto" => "assets/img/fotopengurus/Savira Nurcahya.jpg", "nama" => "Savira Nurcahya Setiawan", "jabatan" => "Koordinator Pengawasan Komdigi", "kedinasan" => "Politeknik Ketenagakerjaan", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["foto" => "assets/img/fotopengurus/Nicholas Zen.JPG", "nama" => "Nicholas Zen", "jabatan" => "Pengawas Publikasi dan Tata Kelola Digital", "kedinasan" => "Politeknik Siber dan Sandi Negara", "badge_color" => "bg-slate-400 text-white"],
                        ["foto" => "assets/img/fotopengurus/Muhammad Ilham-1.png", "nama" => "Muhammad Ilham", "jabatan" => "Pengawas Publikasi dan Dokumentasi", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Pengawasan Hubungan Masyarakat" => [
                    "type" => "hierarchy",
                    "kepala" => ["foto" => "assets/img/fotopengurus/Izzy.jpg", "nama" => "Izzy", "jabatan" => "Koordinator Pengawasan Humas", "kedinasan" => "Politeknik Kelautan dan Perikanan Sidoarjo", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["foto" => "assets/img/fotopengurus/FADEL MUHAMMAD GHAISANI.jpg", "nama" => "Fadel Muhammad", "jabatan" => "Pengawas Komunikasi Eksternal dan Internal", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-400 text-white"],
                        ["foto" => "assets/img/fotopengurus/ZAHWA BILBINA BILLQIS .jpg", "nama" => "Zabina", "jabatan" => "Pengawas Kepatuhan Komunikasi Organisasi", "kedinasan" => "Politeknik Pembangunan Pertanian", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Pengawasan Ekonomi Kreatif" => [
                    "type" => "hierarchy",
                    "kepala" => ["foto" => "assets/img/fotopengurus/Gilang Viery Pratama.jpg", "nama" => "Gilang Viery", "jabatan" => "Koordinator Pengawasan Ekraf", "kedinasan" => "Politeknik Keuangan Negara STAN", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["foto" => "assets/img/fotopengurus/Fildzah-1.png", "nama" => "Fildzah", "jabatan" => "Pengawas Branding dan Program Kreatif", "kedinasan" => "Politeknik Ketenagakerjaan", "badge_color" => "bg-slate-400 text-white"],
                        ["foto" => "assets/img/fotopengurus/Mochammad Roihan Asadulloh-1.png", "nama" => "Mohammad Roihan Asadulloh", "jabatan" => "Pengawas Kepatuhan dan Tindak Lanjut Ekraf", "kedinasan" => "Politeknik Ketenagakerjaan", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ]
            ];

            foreach ($pengurus_dewas_array as $kategori => $group) {
                echo "<div class='mb-20 bg-navy/30 backdrop-blur-2xl shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-white/10 rounded-[3.5rem] p-8 md:p-16 relative overflow-hidden group/dewas reveal'>";
                
                // Dekorasi spesifik Dewas
                echo "<div class='absolute top-0 left-0 w-80 h-80 bg-slate-400/20 rounded-full blur-[80px] -z-10 group-hover/dewas:scale-125 transition-transform duration-1000'></div>";
                echo "<div class='absolute bottom-0 right-0 w-80 h-80 bg-teal-400/10 rounded-full blur-[80px] -z-10 group-hover/dewas:scale-125 transition-transform duration-1000'></div>";

                echo "<div class='flex items-center justify-center mb-16 relative z-10'>";
                echo "<h3 class='text-2xl md:text-4xl font-black text-center text-gray-100 uppercase tracking-widest bg-white/10 backdrop-blur-md px-10 py-5 rounded-[2rem] shadow-lg border border-slate-300 transform group-hover/dewas:scale-105 transition-transform duration-500'>{$kategori}</h3>";
                echo "</div>";

                if ($group['type'] === 'hierarchy') {
                    // Hierarki: Kepala di tengah
                    echo "<div class='flex justify-center mb-12 relative z-10'>";
                    echo "<div class='w-full max-w-[350px]'>" . renderProfileCard($group['kepala']) . "</div>";
                    echo "</div>";

                    // Garis penghubung vertikal jika ada bawahan
                    if (!empty($group['anggota'])) {
                        echo "<div class='flex justify-center mb-12 relative z-0'>";
                        echo "<div class='w-1.5 h-16 bg-gradient-to-b from-slate-300 to-slate-200 rounded-full shadow-inner'></div>";
                        echo "</div>";

                        // Anggota di bawahnya
                        echo "<div class='flex flex-wrap justify-center gap-8 max-w-6xl mx-auto mb-4 relative z-10'>";
                        foreach ($group['anggota'] as $member) {
                            echo "<div class='w-full sm:w-[calc(50%-2rem)] md:w-[calc(33.333%-2rem)] lg:w-[calc(25%-2rem)] min-w-[300px] max-w-[350px] flex justify-center transform scale-95 hover:scale-105 transition-transform duration-500'>";
                            echo renderProfileCard($member);
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                } else {
                    // Grid berjejer biasa (misal untuk Ketua Komisi 1, 2, 3)
                    echo "<div class='flex flex-wrap justify-center gap-8 max-w-6xl mx-auto mb-4 relative z-10'>";
                    foreach ($group['anggota'] as $member) {
                        echo "<div class='w-full sm:w-[calc(50%-2rem)] md:w-[calc(33.333%-2rem)] lg:w-[calc(25%-2rem)] min-w-[300px] max-w-[350px] flex justify-center transform hover:-translate-y-2 transition-transform duration-500'>";
                        echo renderProfileCard($member);
                        echo "</div>";
                    }
                    echo "</div>";
                }
                
                echo "</div>"; // Tutup div per kategori
            }
            ?>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>











