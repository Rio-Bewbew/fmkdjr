<?php
$pageTitle = 'Visi & Misi';
include 'components/header.php';
include 'components/navbar.php';
?>

<!-- Page Header -->
<section class="relative pt-32 pb-16 bg-transparent overflow-hidden min-h-[400px] flex items-center justify-center">
    <!-- Abstract Background -->
    <div class="absolute inset-0 z-0" style="-webkit-mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%); mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%);">
        <img src="assets/img/visi_misi_bg.jpg" alt="Kunjungan Instansi FMKD" class="w-full h-full object-cover opacity-40 mix-blend-overlay animate-[pulse-slow_20s_ease-in-out_infinite] scale-105">
        <div class="absolute inset-0 bg-gradient-to-b from-navy/95 via-navy/80 to-transparent"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSIvPjwvc3ZnPg==')] opacity-40"></div>
        
        <!-- Glowing Orbs -->
        <div class="absolute top-0 right-1/4 w-80 h-80 bg-cyan-500/20 rounded-full blur-[100px] mix-blend-screen animate-pulse-slow"></div>
        <div class="absolute bottom-0 left-1/4 w-80 h-80 bg-blue-600/30 rounded-full blur-[120px] mix-blend-screen animate-float"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-12 reveal reveal-scale">
        <div class="inline-flex items-center justify-center space-x-3 bg-white/10 backdrop-blur-md px-6 py-2.5 rounded-full mb-6 border border-white/20 shadow-[0_0_15px_rgba(34,211,238,0.3)] animate-float">
            <i class="fa-solid fa-compass text-cyan-400 animate-spin-slow text-sm"></i>
            <span class="text-cyan-300 text-xs font-black tracking-widest uppercase">Arah Perjuangan</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] leading-tight">
            Visi <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-400">&</span> Misi
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto drop-shadow-xl font-light">
            Arah dan tujuan perjuangan Forum Mahasiswa Kedinasan Daerah Jakarta Raya untuk memberikan kontribusi nyata bagi <strong class="text-white">bangsa dan negara</strong>.
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="py-32 bg-transparent relative min-h-screen overflow-hidden">
    <!-- Decorative background element -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-4xl h-96 bg-gradient-to-b from-navy/5 to-transparent z-0"></div>
    <div class="absolute top-1/4 -right-32 w-[500px] h-[500px] bg-cyan-400/10 rounded-full blur-[150px] z-0 pointer-events-none animate-pulse-slow"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 -mt-40">
        
        <!-- Visi Card (Maximalist Glassmorphism) -->
        <div class="bg-white/5 backdrop-blur-2xl rounded-[3rem] shadow-xl border border-white/10 overflow-hidden mb-32 transform hover:-translate-y-4 hover:shadow-[0_30px_60px_rgba(37,99,235,0.25)] transition-all duration-700 relative group reveal">
            <!-- Glowing background inside card -->
            <div class="absolute -top-32 -right-32 w-[400px] h-[400px] bg-cyan-500/10 rounded-full blur-[100px] group-hover:bg-blue-500/30 group-hover:scale-150 transition-all duration-1000 z-0"></div>
            <div class="absolute -bottom-32 -left-32 w-[400px] h-[400px] bg-blue-500/10 rounded-full blur-[100px] group-hover:bg-cyan-400/30 group-hover:scale-150 transition-all duration-1000 z-0"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 relative z-10 min-h-[300px]">
                <div class="bg-gradient-to-br from-blue-700 via-navy to-gray-900 text-white p-12 flex flex-col justify-center items-center text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSIvPjwvc3ZnPg==')] opacity-20"></div>
                    <div class="w-28 h-28 bg-white/10 rounded-[2rem] flex items-center justify-center mb-8 backdrop-blur-md border border-white/20 shadow-[0_0_30px_rgba(34,211,238,0.3)] group-hover:scale-110 group-hover:rotate-6 transition-transform duration-700">
                        <i class="fa-solid fa-eye text-6xl text-cyan-300 drop-shadow-[0_0_15px_rgba(34,211,238,0.8)]"></i>
                    </div>
                    <h2 class="text-5xl font-black uppercase tracking-widest drop-shadow-lg text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-white">Visi</h2>
                </div>
                <div class="md:col-span-2 p-12 lg:p-20 flex items-center bg-transparent relative">
                    <i class="fa-solid fa-quote-left absolute top-10 left-10 text-6xl text-blue-200/50 group-hover:text-cyan-300/40 transition-colors duration-500"></i>
                    <i class="fa-solid fa-quote-right absolute bottom-10 right-10 text-6xl text-blue-200/50 group-hover:text-cyan-300/40 transition-colors duration-500"></i>
                    <p class="text-2xl md:text-4xl text-white leading-tight font-black italic relative z-10 drop-shadow-sm text-center w-full">
                        Terwujudnya FMKD Jakarta Raya yang berintegritas, bersinergi, progresif, dan transparan dengan mengedepankan aspek kekeluargaan dan profesionalisme berlandaskan Pancasila, UUD 1945, dan Tri Dharma Perguruan Tinggi.
                    </p>
                </div>
            </div>
        </div>

        <!-- Misi Section -->
        <div class="text-center mb-20 reveal">
            <div class="inline-flex items-center justify-center space-x-2 bg-blue-500/10 px-6 py-2 rounded-full mb-6 border border-blue-400/20">
                <i class="fa-solid fa-rocket text-blue-600"></i>
                <span class="text-blue-600 text-sm font-black uppercase tracking-widest">Langkah Nyata</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6">
                Misi <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">FMKD Jakarta Raya</span>
            </h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-600 to-cyan-400 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 stagger-children">
            <?php
            $misi = [
                "Membangun komunikasi dan koordinasi yang baik untuk terciptanya sinergitas antar anggota FMKD Jakarta Raya.",
                "Beradaptasi dengan teknologi informasi sesuai dengan perkembangan zaman.",
                "Menjadi wadah silaturahmi dan sarana pengembangan minat, bakat, dan kompetensi.",
                "Mengabdi kepada masyarakat, bangsa dan negara.",
                "Meningkatkan profesionalisme, integritas, dan cinta tanah air.",
                "Membentuk dan menanamkan karakter kepemimpinan bagi anggota FMKD Jakarta Raya untuk menciptakan kader penerus generasi bangsa."
            ];

            foreach ($misi as $index => $text) {
                $num = $index + 1;
                echo "
                                <div class=\"relative bg-white/5 backdrop-blur-md p-8 rounded-3xl shadow-sm hover:shadow-xl border border-white/10 hover:border-blue-500/50 transform hover:-translate-y-2 transition-all duration-300 group flex flex-col h-full\">
                    <div class=\"w-14 h-14 rounded-2xl bg-blue-500/10 text-blue-400 flex items-center justify-center font-black text-2xl mb-6 group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300 shadow-sm border border-blue-500/20\">
                        $num
                    </div>
                    <p class=\"text-gray-300 text-lg leading-relaxed font-medium group-hover:text-white transition-colors duration-300 flex-grow\">
                        $text
                    </p>
                </div>
                ";
            }
            ?>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>




