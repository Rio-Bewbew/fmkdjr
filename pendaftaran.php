<?php
$pageTitle = 'Pusat Pendaftaran';
include 'components/header.php';
include 'components/navbar.php';
?>

<main class="relative min-h-screen pb-32 overflow-hidden">
    <!-- Transparent overlay (Global background will show through) -->
    <div class="absolute inset-0 z-0">
        <!-- Optional extra darkening for this specific page -->
        <div class="absolute inset-0 bg-navy/20 backdrop-blur-sm"></div>
    </div>
    
    <!-- Dynamic Glowing decors -->
    <div class="absolute top-[-10%] right-[-5%] w-[800px] h-[800px] bg-blue-600/30 rounded-full blur-[150px] mix-blend-screen pointer-events-none animate-pulse-slow z-0"></div>
    <div class="fixed bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-cyan-500/20 rounded-full blur-[120px] mix-blend-screen pointer-events-none animate-float z-0"></div>
    <div class="absolute top-[40%] left-[50%] w-[400px] h-[400px] bg-purple-500/20 rounded-full blur-[100px] mix-blend-screen pointer-events-none animate-float z-0" style="animation-delay: -2s;"></div>

    <!-- Hero Section -->
    <section class="relative z-10 flex flex-col items-center justify-center pt-48 pb-20 reveal reveal-scale">
        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            
            <div class="inline-flex items-center gap-2 py-2 px-6 rounded-full bg-white/5 border border-white/10 text-cyan-300 text-sm font-bold tracking-widest mb-8 uppercase shadow-[0_0_30px_rgba(6,182,212,0.3)] backdrop-blur-xl animate-float">
                <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                PORTAL RESMI PENDAFTARAN
            </div>
            
            <h1 class="text-6xl md:text-8xl font-black text-white mb-8 leading-tight tracking-tight drop-shadow-2xl">
                Mari Bergabung <br class="hidden md:block" />Bersama <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-cyan-300 to-emerald-300 filter drop-shadow-[0_0_15px_rgba(56,189,248,0.5)]">FMKD JR</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-10 font-light">
                Siapkan dirimu untuk menjadi bagian dari pergerakan! Pilih jalur pendaftaran di bawah ini dan mulailah berkontribusi bersama <strong class="text-white font-semibold">Forum Mahasiswa Kedinasan Daerah Jakarta Raya.</strong>
            </p>
            
            <div class="flex justify-center gap-4">
                <a href="#pilihan" class="btn-ripple py-4 px-10 rounded-2xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-bold text-lg hover:from-blue-500 hover:to-cyan-400 transition-all duration-300 shadow-[0_10px_30px_rgba(6,182,212,0.4)] hover:shadow-[0_15px_40px_rgba(6,182,212,0.6)] hover:-translate-y-1">
                    Lihat Pilihan <i class="fa-solid fa-chevron-down ml-2 animate-bounce"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Cards Section -->
    <section id="pilihan" class="relative z-10 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 xl:gap-10 stagger-children">
                
                <!-- Card 1: Anggota Kepengurusan -->
                <div class="group glass-dark rounded-[2.5rem] p-10 shadow-2xl border border-white/10 hover:border-blue-400/50 hover:shadow-[0_0_50px_rgba(59,130,246,0.3)] transition-all duration-500 transform hover:-translate-y-4 flex flex-col h-full relative overflow-hidden reveal">
                    <!-- Glow effect inside card -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-blue-500/20 rounded-full blur-[40px] group-hover:bg-blue-400/30 transition-colors duration-500 z-0"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 text-white rounded-3xl flex items-center justify-center text-4xl mb-8 shadow-lg shadow-blue-500/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shrink-0">
                            <i class="fa-solid fa-users-gear"></i>
                        </div>
                        <h3 class="text-3xl font-black text-white mb-4 tracking-tight">Kepengurusan</h3>
                        <p class="text-gray-400 mb-10 flex-grow leading-relaxed text-lg group-hover:text-gray-300 transition-colors">
                            Jadilah bagian dari motor penggerak FMKD JR. Kembangkan diri Anda melalui berbagai divisi strategis dan perkuat relasi antar mahasiswa kedinasan se-Jakarta Raya.
                        </p>
                        <a href="https://forms.gle/DJznS1qbNDzgs9fq8" target="_blank" rel="noopener noreferrer" class="btn-ripple w-full py-4 px-6 rounded-2xl bg-white/5 border border-white/10 text-white font-bold text-center hover:bg-blue-600 hover:border-blue-500 transition-all duration-300 shadow-md flex items-center justify-center gap-3 group-hover:gap-4 text-lg backdrop-blur-md relative overflow-hidden z-10">
                            <span class="relative z-10">Daftar Sekarang</span>
                            <i class="fa-solid fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2: PTK EXPO -->
                <div class="group glass-dark rounded-[2.5rem] p-10 shadow-2xl border border-white/10 hover:border-cyan-400/50 hover:shadow-[0_0_50px_rgba(6,182,212,0.3)] transition-all duration-500 transform hover:-translate-y-4 flex flex-col h-full relative overflow-hidden reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-cyan-500/20 rounded-full blur-[40px] group-hover:bg-cyan-400/30 transition-colors duration-500 z-0"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 to-cyan-700 text-white rounded-3xl flex items-center justify-center text-4xl mb-8 shadow-lg shadow-cyan-500/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shrink-0">
                            <i class="fa-solid fa-tent"></i>
                        </div>
                        <h3 class="text-3xl font-black text-white mb-4 tracking-tight">PTK EXPO</h3>
                        <p class="text-gray-400 mb-10 flex-grow leading-relaxed text-lg group-hover:text-gray-300 transition-colors">
                            Pendaftaran pameran Perguruan Tinggi Kedinasan terbesar. Segera amankan kuota Anda untuk mendapatkan informasi dan simulasi langsung dari kampus impian.
                        </p>
                        <a href="#" class="btn-ripple w-full py-4 px-6 rounded-2xl bg-white/5 border border-white/10 text-white font-bold text-center hover:bg-cyan-600 hover:border-cyan-500 transition-all duration-300 shadow-md flex items-center justify-center gap-3 group-hover:gap-4 text-lg backdrop-blur-md relative overflow-hidden z-10">
                            <span class="relative z-10">Daftar Sekarang</span>
                            <i class="fa-solid fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3: Event Lainnya -->
                <div class="group glass-dark rounded-[2.5rem] p-10 shadow-2xl border border-white/10 hover:border-emerald-400/50 hover:shadow-[0_0_50px_rgba(16,185,129,0.3)] transition-all duration-500 transform hover:-translate-y-4 flex flex-col h-full relative overflow-hidden reveal">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-500/20 rounded-full blur-[40px] group-hover:bg-emerald-400/30 transition-colors duration-500 z-0"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-emerald-700 text-white rounded-3xl flex items-center justify-center text-4xl mb-8 shadow-lg shadow-emerald-500/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shrink-0">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <h3 class="text-3xl font-black text-white mb-4 tracking-tight">Event Lainnya</h3>
                        <p class="text-gray-400 mb-10 flex-grow leading-relaxed text-lg group-hover:text-gray-300 transition-colors">
                            Pendaftaran untuk berbagai webinar, workshop, seminar, dan kegiatan insidental lainnya yang diselenggarakan oleh FMKD Jakarta Raya.
                        </p>
                        <a href="#" class="btn-ripple w-full py-4 px-6 rounded-2xl bg-white/5 border border-white/10 text-white font-bold text-center hover:bg-emerald-600 hover:border-emerald-500 transition-all duration-300 shadow-md flex items-center justify-center gap-3 group-hover:gap-4 text-lg backdrop-blur-md relative overflow-hidden z-10">
                            <span class="relative z-10">Daftar Sekarang</span>
                            <i class="fa-solid fa-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include 'components/footer.php'; ?>

