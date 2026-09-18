<?php
$pageTitle = 'DEWAS - Database Kepengurusan';
include 'components/header.php';
include 'components/navbar.php';

require_once 'config/db.php';

// Fungsi helper untuk mengambil data pengurus
function getPengurus($pdo, $kategori, $level) {
    $stmt = $pdo->prepare("SELECT * FROM pengurus WHERE kategori = :kategori AND level = :level ORDER BY id ASC");
    $stmt->execute([':kategori' => $kategori, ':level' => $level]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

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
            $fotoSrc = $member['foto'] . '?v=' . filemtime($member['foto']);
            $avatarContent = "<img src=\"{$fotoSrc}\" alt=\"{$member['nama']}\" class=\"w-full h-full rounded-full object-cover\">";
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
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-yellow-300 to-cyan-400 filter drop-shadow-lg">DEWAS</span>
        </h1>
        <p class="text-gray-200 text-lg md:text-xl max-w-3xl mx-auto animate-slide-up font-medium" style="animation-delay: 0.1s;">
            Struktur Dewan Pengawas Daerah Forum Mahasiswa Kedinasan Daerah Jakarta Raya Periode 2026/2027.
        </p>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-slate-50 min-h-screen relative overflow-hidden">
    <!-- Ambient glowing orbs -->
    <div class="absolute top-1/4 left-0 w-96 h-96 bg-blue-100/50 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-0 w-96 h-96 bg-cyan-100/50 rounded-full blur-[100px] pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section: DEWAS -->
        <div class="mb-20">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-black text-white inline-block relative mb-6 tracking-wide drop-shadow-sm">
                    Dewan Pengawas (DEWAS)
                    <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 w-3/4 h-1 bg-gradient-to-r from-blue-500 via-cyan-400 to-blue-500 rounded-full opacity-80"></div>
                </h2>
                <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-md p-6 md:p-8 rounded-2xl shadow-sm border border-white/10 relative mt-6">
                    <i class="fa-solid fa-quote-left absolute top-4 left-4 text-blue-100 text-3xl"></i>
                    <p class="text-gray-300 leading-relaxed italic relative z-10 px-6 font-medium text-lg">
                        "Dewan Pengawas adalah unsur pengawas yang memiliki tugas, wewenang, dan tanggung jawab untuk mengawasi pelaksanaan amanat Musyawarah Daerah selama satu periode masa bakti."
                    </p>
                    <i class="fa-solid fa-quote-right absolute bottom-4 right-4 text-blue-100 text-3xl"></i>
                </div>
            </div>

            <?php
            $dewas_struktur = [
                "Pimpinan" => [
                    "type" => "hierarchy",
                    "kepala" => ["nama" => "Siera Samudra J. P. Surbakti", "jabatan" => "Ketua Dewan Pengawas Daerah", "kedinasan" => "FMKD Jakarta Raya", "badge_color" => "bg-slate-800 text-white"],
                    "anggota" => [
                        ["nama" => "Rifky Ridho Baihaqi", "jabatan" => "Sekretaris Dewan Pengawas Daerah", "kedinasan" => "Politeknik Statistika STIS", "badge_color" => "bg-slate-600 text-white"]
                    ]
                ],
                "Ketua Komisi" => [
                    "type" => "grid",
                    "anggota" => [
                        ["nama" => "Lutfi Budiana", "jabatan" => "Ketua Komisi 1", "kedinasan" => "Politeknik Imigrasi dan Pemasyarakatan", "badge_color" => "bg-teal-600 text-white"],
                        ["nama" => "Zildjian Ahmed Abu Bakar", "jabatan" => "Ketua Komisi 2", "kedinasan" => "Politeknik Kelautan Dan Perikanan Sidoarjo", "badge_color" => "bg-teal-600 text-white"],
                        ["nama" => "Satria Tegar", "jabatan" => "Ketua Komisi 3", "kedinasan" => "Politeknik Siber dan Sandi Negara", "badge_color" => "bg-teal-600 text-white"]
                    ]
                ],
                "Sub-Komisi Pengawasan Sekretaris" => [
                    "type" => "hierarchy",
                    "kepala" => ["nama" => "Balqis Hasna Syauqiyah", "jabatan" => "Kepala Sub-Komisi", "kedinasan" => "Politeknik Statistika STIS", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["nama" => "Qurratun Nabila", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-400 text-white"],
                        ["nama" => "Claudy Englen Hasan", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Statistika STIS", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Sub-Komisi Pengawasan Bendahara" => [
                    "type" => "hierarchy",
                    "kepala" => ["nama" => "Azzam Syamil", "jabatan" => "Kepala Sub-Komisi", "kedinasan" => "Politeknik Keuangan Negara STAN", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["nama" => "Alexandra Lidya", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Imigrasi dan Pemasyarakatan", "badge_color" => "bg-slate-400 text-white"],
                        ["nama" => "Shifaula Tatia Muchtarona", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Statistika STIS", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Sub-Komisi Pengawasan Humas" => [
                    "type" => "hierarchy",
                    "kepala" => ["nama" => "Annan Tri Baihaqi", "jabatan" => "Kepala Sub-Komisi", "kedinasan" => "Politeknik Imigrasi dan Pemasyarakatan", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["nama" => "Joshua Christiyadi Sinambela", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Imigrasi dan Pemasyarakatan", "badge_color" => "bg-slate-400 text-white"],
                        ["nama" => "Fadel Muhammad", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Sub-Komisi Pengawasan Komdigi" => [
                    "type" => "hierarchy",
                    "kepala" => ["nama" => "Savira Nurcahya Setiawan", "jabatan" => "Kepala Sub-Komisi", "kedinasan" => "Politeknik Ketenagakerjaan", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["nama" => "Nicholas Zen", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Siber dan Sandi Negara", "badge_color" => "bg-slate-400 text-white"],
                        ["nama" => "Muhammad Ilham", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Sub-Komisi Pengawasan Ekraf" => [
                    "type" => "hierarchy",
                    "kepala" => ["nama" => "Gilang Viery", "jabatan" => "Kepala Sub-Komisi", "kedinasan" => "Politeknik Keuangan Negara STAN", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["nama" => "Fildzah", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Ketenagakerjaan", "badge_color" => "bg-slate-400 text-white"],
                        ["nama" => "Edward Richard Dos", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Imigrasi dan Pemasyarakatan", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Sub-Komisi Pengawasan Renbang" => [
                    "type" => "hierarchy",
                    "kepala" => ["nama" => "Adam Cheyroza", "jabatan" => "Kepala Sub-Komisi", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["nama" => "Fatimah Tuzahroh", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Sekolah Tinggi Ilmu Pelayaran", "badge_color" => "bg-slate-400 text-white"],
                        ["nama" => "Novia Regina", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Ketenagakerjaan", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Sub-Komisi Perundangan" => [
                    "type" => "hierarchy",
                    "kepala" => ["nama" => "Mohammad Roihan Asadulloh", "jabatan" => "Kepala Sub-Komisi", "kedinasan" => "Politeknik Ketenagakerjaan", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["nama" => "Zahwa Bilbina Bilqis", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Pembangunan Pertanian", "badge_color" => "bg-slate-400 text-white"],
                        ["nama" => "Imam Maarif", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Keuangan Negara STAN", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ],
                "Sub-Komisi Penegakan Hukum" => [
                    "type" => "hierarchy",
                    "kepala" => ["nama" => "Joan Vischa Manuel", "jabatan" => "Kepala Sub-Komisi", "kedinasan" => "Politeknik Imigrasi dan Pemasyarakatan", "badge_color" => "bg-slate-500 text-white"],
                    "anggota" => [
                        ["nama" => "Nicho Erlandho", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Ahli Usaha Perikanan Jakarta", "badge_color" => "bg-slate-400 text-white"],
                        ["nama" => "Muhammad Wildan Fasha", "jabatan" => "Anggota Sub-Komisi", "kedinasan" => "Politeknik Ahli Usaha Perikanan Jakarta", "badge_color" => "bg-slate-400 text-white"]
                    ]
                ]
            ];

            $delay = 0.2;
            foreach ($dewas_struktur as $nama_kategori => $group):
            ?>
            <div class="mb-16 border border-white bg-white/70 backdrop-blur-xl shadow-lg rounded-[2.5rem] p-6 md:p-12 animate-slide-up relative overflow-hidden group/dewas" style="animation-delay: <?= $delay ?>s;">
                <!-- Decorative Blur background per section -->
                <?php
                if (strpos($nama_kategori, 'Komisi') !== false) {
                    echo "<div class='absolute top-0 left-0 w-64 h-64 bg-cyan-100/50 rounded-full blur-[80px] -z-10 group-hover/dewas:scale-125 transition-transform duration-1000'></div>";
                    echo "<div class='absolute bottom-0 right-0 w-64 h-64 bg-blue-100/50 rounded-full blur-[80px] -z-10 group-hover/dewas:scale-125 transition-transform duration-1000'></div>";
                } else {
                    echo "<div class='absolute top-0 left-0 w-64 h-64 bg-slate-100/50 rounded-full blur-[80px] -z-10 group-hover/dewas:scale-125 transition-transform duration-1000'></div>";
                }
                ?>

                <div class="flex items-center justify-center mb-14 relative z-10">
                    <h3 class="text-2xl md:text-3xl font-black text-center text-white uppercase tracking-widest bg-white/10 backdrop-blur-md px-10 py-5 rounded-2xl shadow-sm border border-white/10 transform hover:scale-105 transition-transform duration-300"><?= $nama_kategori ?></h3>
                </div>

                <?php
                if ($group['type'] === 'hierarchy') {
                    // Hierarki: Kepala di tengah
                    echo "<div class='flex justify-center mb-8 relative z-10'>";
                    echo "<div class='w-full max-w-[320px]'>" . renderProfileCard($group['kepala']) . "</div>";
                    echo "</div>";

                    // Garis penghubung vertikal jika ada bawahan
                    if (!empty($group['anggota'])) {
                        echo "<div class='flex justify-center -mt-4 mb-8 relative z-10'>";
                        echo "<div class='w-1.5 h-12 bg-gradient-to-b from-gray-200 to-transparent rounded-full'></div>";
                        echo "</div>";
                        
                        // Anggota di bawahnya
                        echo "<div class='flex flex-wrap justify-center gap-6 max-w-6xl mx-auto mb-4 relative z-10'>";
                        foreach ($group['anggota'] as $member) {
                            echo "<div class='w-full sm:w-[calc(50%-1.5rem)] md:w-[calc(33.333%-1.5rem)] lg:w-[calc(25%-1.5rem)] min-w-[280px] max-w-[320px] flex justify-center transform scale-95 hover:scale-100 transition-transform'>";
                            echo renderProfileCard($member);
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                } else {
                    // Grid berjejer biasa (misal untuk Ketua Komisi 1, 2, 3)
                    echo "<div class='flex flex-wrap justify-center gap-6 max-w-6xl mx-auto mb-4 relative z-10'>";
                    foreach ($group['anggota'] as $member) {
                        echo "<div class='w-full sm:w-[calc(50%-1.5rem)] md:w-[calc(33.333%-1.5rem)] lg:w-[calc(25%-1.5rem)] min-w-[280px] max-w-[320px] flex justify-center'>";
                        echo renderProfileCard($member);
                        echo "</div>";
                    }
                    echo "</div>";
                }
                
                echo "</div>"; // Tutup div per kategori
                $delay += 0.1;
            endforeach;
            ?>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>

