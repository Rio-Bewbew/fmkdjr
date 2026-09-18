<?php
$pageTitle = 'Kontak Kami';
include 'components/header.php';
include 'components/navbar.php';
?>

<!-- Page Header -->
<section class="relative pt-32 pb-16 bg-transparent overflow-hidden min-h-[400px] flex items-center justify-center">
    <div class="absolute inset-0 z-0" style="-webkit-mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%); mask-image: linear-gradient(to bottom, black 0%, black 50%, transparent 100%);">
        <!-- Abstract Background -->
        <img src="assets/img/kontak_bg.jpg" alt="Kunjungan Instansi BPBD" class="w-full h-full object-cover opacity-40 mix-blend-overlay animate-[pulse-slow_20s_ease-in-out_infinite] scale-105">
        <div class="absolute inset-0 bg-gradient-to-b from-navy/95 via-navy/80 to-transparent"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSIvPjwvc3ZnPg==')] opacity-40"></div>
        
        <!-- Glowing Orbs -->
        <div class="absolute top-1/4 left-1/4 w-[400px] h-[400px] bg-cyan-500/20 rounded-full blur-[100px] mix-blend-screen animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-blue-600/30 rounded-full blur-[120px] mix-blend-screen animate-float"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-12 reveal reveal-scale">
        <div class="inline-flex items-center justify-center space-x-3 bg-white/10 backdrop-blur-md px-6 py-2.5 rounded-full mb-6 border border-white/20 shadow-[0_0_15px_rgba(34,211,238,0.3)] animate-float">
            <i class="fa-regular fa-paper-plane text-cyan-400 animate-bounce text-sm"></i>
            <span class="text-cyan-300 text-xs font-black tracking-widest uppercase">Pusat Bantuan & Kerja Sama</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] leading-tight">
            Hubungi <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-400">Kami</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto drop-shadow-xl font-light">
            Tetap terhubung dengan FMKD Jakarta Raya melalui kanal media sosial resmi kami.
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="py-32 bg-transparent relative min-h-screen overflow-hidden">
    <!-- Decorative Glowing Elements -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-500/10 rounded-full blur-[150px] z-0 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-cyan-400/10 rounded-full blur-[150px] z-0 pointer-events-none animate-pulse-slow"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="max-w-4xl mx-auto">
            
            <!-- Social Media Cards -->
            <div class="reveal text-center">
                <div class="inline-flex items-center gap-2 py-1.5 px-5 rounded-full bg-blue-500/10 border border-blue-400/20 text-blue-600 text-xs font-black tracking-widest mb-6 uppercase">
                    Koneksi
                </div>
                <h3 class="text-4xl md:text-5xl font-black text-white mb-10 leading-tight">
                    Kanal <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Resmi</span>
                </h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 stagger-children">
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/fmkdjakartaraya/" target="_blank" class="relative bg-white/10 backdrop-blur-xl p-1 rounded-3xl hover:-translate-y-2 transition-all duration-500 group shadow-lg hover:shadow-[0_20px_40px_rgba(236,72,153,0.3)] overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative bg-white/10 backdrop-blur-md p-6 rounded-[1.3rem] h-full flex items-center group-hover:bg-transparent transition-colors duration-500 z-10">
                            <div class="w-14 h-14 rounded-[1rem] bg-white flex items-center justify-center text-pink-500 mr-4 shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shrink-0">
                                <i class="fa-brands fa-instagram text-3xl drop-shadow-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-white group-hover:text-white transition-colors text-lg">Instagram</h4>
                                <p class="text-xs font-bold text-gray-400 group-hover:text-white/80 transition-colors uppercase tracking-wider mt-1">@fmkdjakartaraya</p>
                            </div>
                        </div>
                    </a>
                    
                    <!-- YouTube -->
                    <a href="https://www.youtube.com/@FMKDJakartaRaya" target="_blank" class="relative bg-white/10 backdrop-blur-xl p-1 rounded-3xl hover:-translate-y-2 transition-all duration-500 group shadow-lg hover:shadow-[0_20px_40px_rgba(239,68,68,0.3)] overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-red-500 to-red-600 opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative bg-white/10 backdrop-blur-md p-6 rounded-[1.3rem] h-full flex items-center group-hover:bg-transparent transition-colors duration-500 z-10">
                            <div class="w-14 h-14 rounded-[1rem] bg-white flex items-center justify-center text-red-600 mr-4 shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shrink-0">
                                <i class="fa-brands fa-youtube text-3xl drop-shadow-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-white group-hover:text-white transition-colors text-lg">YouTube</h4>
                                <p class="text-xs font-bold text-gray-400 group-hover:text-white/80 transition-colors uppercase tracking-wider mt-1">FMKDJakartaRaya</p>
                            </div>
                        </div>
                    </a>

                    <!-- TikTok -->
                    <a href="https://www.tiktok.com/@fmkd.jakartaraya?is_from_webapp=1&sender_device=pc" target="_blank" class="relative bg-white/10 backdrop-blur-xl p-1 rounded-3xl hover:-translate-y-2 transition-all duration-500 group shadow-lg hover:shadow-[0_20px_40px_rgba(0,0,0,0.3)] overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-800 to-black opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative bg-white/10 backdrop-blur-md p-6 rounded-[1.3rem] h-full flex items-center group-hover:bg-transparent transition-colors duration-500 z-10">
                            <div class="w-14 h-14 rounded-[1rem] bg-white flex items-center justify-center text-gray-900 mr-4 shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shrink-0">
                                <i class="fa-brands fa-tiktok text-3xl drop-shadow-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-white group-hover:text-white transition-colors text-lg">TikTok</h4>
                                <p class="text-xs font-bold text-gray-400 group-hover:text-white/80 transition-colors uppercase tracking-wider mt-1">@fmkd.jakartaraya</p>
                            </div>
                        </div>
                    </a>

                    <!-- Email -->
                    <a href="mailto:fmkdjakartaraya@gmail.com" class="relative bg-white/10 backdrop-blur-xl p-1 rounded-3xl hover:-translate-y-2 transition-all duration-500 group shadow-lg hover:shadow-[0_20px_40px_rgba(59,130,246,0.3)] overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-500 opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative bg-white/10 backdrop-blur-md p-6 rounded-[1.3rem] h-full flex items-center group-hover:bg-transparent transition-colors duration-500 z-10">
                            <div class="w-14 h-14 rounded-[1rem] bg-white flex items-center justify-center text-blue-500 mr-4 shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shrink-0">
                                <i class="fa-solid fa-envelope text-3xl drop-shadow-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-black text-white group-hover:text-white transition-colors text-lg">Email</h4>
                                <p class="text-[10px] font-bold text-gray-400 group-hover:text-white/80 transition-colors uppercase tracking-wider mt-1 break-all">fmkdjakartaraya</p>
                            </div>
                        </div>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/company/forum-mahasiswa-kedinasan-daerah-jakarta-raya/" target="_blank" class="sm:col-span-2 relative bg-white/10 backdrop-blur-xl p-1 rounded-3xl hover:-translate-y-2 transition-all duration-500 group shadow-lg hover:shadow-[0_20px_40px_rgba(29,78,216,0.3)] overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative bg-white/10 backdrop-blur-md p-6 rounded-[1.3rem] h-full flex items-center justify-center sm:justify-start group-hover:bg-transparent transition-colors duration-500 z-10">
                            <div class="w-16 h-16 rounded-[1rem] bg-white flex items-center justify-center text-blue-700 mr-5 shadow-md group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shrink-0">
                                <i class="fa-brands fa-linkedin-in text-4xl drop-shadow-sm"></i>
                            </div>
                            <div class="text-center sm:text-left">
                                <h4 class="font-black text-white group-hover:text-white transition-colors text-xl">LinkedIn</h4>
                                <p class="text-xs font-bold text-gray-400 group-hover:text-white/80 transition-colors uppercase tracking-wider mt-1">Forum Mahasiswa Kedinasan Daerah (FMKD) Jakarta Raya</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            

        </div>
    </div>
</section>



<?php include 'components/footer.php'; ?>


