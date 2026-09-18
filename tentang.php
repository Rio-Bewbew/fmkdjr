<?php
$pageTitle = 'Tentang Kami';
include 'components/header.php';
include 'components/navbar.php';
?>

<!-- Page Header -->
<section class="relative pt-32 pb-16 bg-transparent overflow-hidden min-h-[400px] flex items-center justify-center">
    <div class="absolute inset-0 z-0" style="-webkit-mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%); mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%);">
        <img src="assets/img/about_bg.jpg" alt="Gathering FMKD" class="w-full h-full object-cover opacity-40 mix-blend-overlay animate-[pulse-slow_20s_ease-in-out_infinite] scale-105">
        <div class="absolute inset-0 bg-gradient-to-b from-navy/95 via-navy/80 to-transparent"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSIvPjwvc3ZnPg==')] opacity-40"></div>
        
        <div class="absolute top-1/4 right-1/4 w-80 h-80 bg-cyan-500/20 rounded-full blur-[100px] animate-pulse-slow mix-blend-screen"></div>
        <div class="absolute bottom-1/4 left-1/4 w-80 h-80 bg-blue-600/30 rounded-full blur-[120px] mix-blend-screen animate-float"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-12 reveal">
        <div class="inline-flex items-center justify-center space-x-2 bg-white/10 backdrop-blur-md px-5 py-2 rounded-full mb-6 border border-white/20 shadow-[0_0_15px_rgba(34,211,238,0.3)] animate-float">
            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse shadow-[0_0_10px_rgba(34,211,238,1)]"></span>
            <span class="text-cyan-300 text-xs font-black tracking-widest uppercase">Profil Organisasi</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] leading-tight">
            Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-blue-400 to-indigo-300">FMKD Jakarta Raya</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto drop-shadow-xl font-light">
            Mengenal lebih dekat organisasi kolaboratif <strong class="text-white">Perguruan Tinggi Kedinasan</strong> se-Jakarta Raya.
        </p>
    </div>
</section>

<!-- About Content -->
<section class="py-32 bg-transparent relative min-h-screen overflow-hidden">
    <!-- Decorative Glowing Elements -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-500/10 rounded-full blur-[150px] z-0 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-cyan-400/10 rounded-full blur-[150px] z-0 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="bg-white/10 backdrop-blur-2xl rounded-[3rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white/60 flex flex-col lg:flex-row group reveal">
            <!-- Text Content -->
            <div class="lg:w-1/2 p-12 lg:p-20 flex flex-col justify-center relative">
                <div class="absolute -top-20 -left-20 w-64 h-64 bg-cyan-300/20 blur-[80px] rounded-full z-0 group-hover:bg-cyan-400/30 transition-colors duration-700"></div>
                
                <div class="relative z-10">
                    <h4 class="inline-block py-1.5 px-4 rounded-full bg-blue-50 text-blue-600 text-xs font-black tracking-widest uppercase mb-6 border border-blue-100 shadow-sm">
                        Sejarah & Profil
                    </h4>
                    <h2 class="text-4xl md:text-5xl font-black text-white mb-8 leading-tight">Forum Mahasiswa Kedinasan Daerah Jakarta Raya</h2>
                    
                    <div class="prose prose-lg text-gray-300 mb-12">
                        <p class="mb-6 leading-relaxed font-medium">
                            FMKD Jakarta Raya merupakan organisasi mahasiswa, taruna, praja anggota Forum Mahasiswa Kedinasan Indonesia yang berdomisili di wilayah <strong class="text-cyan-400 font-black drop-shadow-md">Jakarta, Bogor, Depok, Bekasi, dan Tangerang</strong>.
                        </p>
                        <p class="leading-relaxed">
                            Organisasi ini menjadi wadah bersama untuk menjalin komunikasi dan memfasilitasi koordinasi untuk bersama bersinergi mewujudkan Tri Dharma Perguruan Tinggi secara berkelanjutan dan inovatif.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Image Content -->
            <div class="lg:w-1/2 relative min-h-[500px] overflow-hidden p-4 lg:p-8">
                <div class="w-full h-full rounded-[2rem] overflow-hidden relative shadow-2xl">
                    <img src="assets/img/tentang_about.jpg" alt="Teamwork FMKD" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy/90 via-navy/40 to-transparent"></div>
                    <div class="absolute bottom-12 left-10 right-10 text-white z-10">
                        <div class="w-12 h-12 rounded-full bg-blue-500/30 backdrop-blur-md flex items-center justify-center mb-6 border border-blue-400/30 shadow-[0_0_15px_rgba(59,130,246,0.5)]">
                            <i class="fa-solid fa-quote-left text-cyan-300 text-xl"></i>
                        </div>
                        <p class="text-3xl font-black italic leading-tight drop-shadow-lg">"Bersatu dalam Kedinasan, Berkarya untuk Indonesia"</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sifat Organisasi - Detail Cards -->
        <div class="mt-32">
            <div class="text-center mb-16 reveal">
                <div class="inline-flex items-center gap-2 py-1.5 px-5 rounded-full bg-blue-500/10 border border-blue-400/20 text-blue-600 text-xs font-black tracking-widest mb-6 uppercase">
                    Nilai Dasar
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6">Makna <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Sifat Organisasi</span></h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-blue-600 to-cyan-400 mx-auto rounded-full mb-8"></div>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto font-light leading-relaxed">Delapan sifat ini menjadi landasan nilai dan budaya organisasi FMKD Jakarta Raya dalam setiap langkah pergerakan dan pengambilan keputusan.</p>
            </div>

            <?php
                                    $sifat = [
                ['title' => 'Kekeluargaan', 'icon' => 'fa-heart', 'color' => 'blue', 'desc' => 'Menekankan hubungan interpersonal yang erat dan rasa saling memiliki antar anggota.'],
                ['title' => 'Mandiri', 'icon' => 'fa-seedling', 'color' => 'emerald', 'desc' => 'Memiliki otonomi dalam pengambilan keputusan dan tidak bergantung pada pihak eksternal.'],
                ['title' => 'Gotong Royong', 'icon' => 'fa-handshake', 'color' => 'purple', 'desc' => 'Kolaborasi dan kerja sama tim yang sinergis melalui pembagian tugas yang adil.'],
                ['title' => 'Netral', 'icon' => 'fa-scale-balanced', 'color' => 'slate', 'desc' => 'Menjaga objektivitas dan tidak terpengaruh oleh tekanan politik kelompok tertentu.'],
                ['title' => 'Akuntabel', 'icon' => 'fa-clipboard-check', 'color' => 'orange', 'desc' => 'Mempertanggungjawabkan tindakan secara transparan dan bersedia dievaluasi.'],
                ['title' => 'Harmonis', 'icon' => 'fa-people-group', 'color' => 'pink', 'desc' => 'Membangun lingkungan kondusif dengan menghargai perbedaan latar belakang.'],
                ['title' => 'Adaptif', 'icon' => 'fa-rotate', 'color' => 'indigo', 'desc' => 'Organisasi yang lincah dan cepat menyesuaikan diri dengan dinamika yang terjadi.'],
                ['title' => 'Edukatif', 'icon' => 'fa-graduation-cap', 'color' => 'teal', 'desc' => 'Wadah pembelajaran aktif yang mendorong peningkatan kompetensi anggota.']
            ];
            ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 stagger-children">
                <?php foreach ($sifat as $item): ?>
                                                <!-- Sifat Card -->
                <div class="relative bg-white/5 backdrop-blur-md rounded-2xl p-8 shadow-sm hover:shadow-xl border border-white/10 hover:border-<?= $item['color'] ?>-500/50 transform hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-<?= $item['color'] ?>-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-<?= $item['color'] ?>-500/20 transition-colors duration-300">
                        <i class="fa-solid <?= $item['icon'] ?> text-2xl text-<?= $item['color'] ?>-400 group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-<?= $item['color'] ?>-300 transition-colors duration-300"><?= $item['title'] ?></h3>
                    <p class="text-gray-400 leading-relaxed text-sm"><?= $item['desc'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
</section>

<?php include 'components/footer.php'; ?>



