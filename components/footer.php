<!-- Footer -->
<footer class="bg-navy text-white pt-16 pb-8 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            
            <!-- Column 1: About -->
            <div>
                <div class="flex items-center mb-4">
                    <img src="assets/img/logo-fmkd-new.png" alt="Logo FMKD JR" class="w-12 h-12 object-contain mr-3 rounded-full bg-white/5 drop-shadow-md">
                    <span class="font-bold text-xl tracking-wider uppercase drop-shadow-md">FMKD <span class="font-light">JR</span></span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">
                    Forum Mahasiswa Kedinasan Daerah Jakarta Raya merupakan wadah silaturahmi, komunikasi, dan sinergi bagi mahasiswa perguruan tinggi kedinasan se-Jakarta Raya.
                </p>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-6 border-b border-white/20 pb-2 inline-block">Tautan Cepat</h3>
                <ul class="space-y-3">
                    <li><a href="index.php" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-blue-400"></i> Home</a></li>
                    <li><a href="tentang.php" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-blue-400"></i> Tentang Kami</a></li>
                    <li><a href="visi-misi.php" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-blue-400"></i> Visi & Misi</a></li>
                    <li><a href="database.php" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fa-solid fa-chevron-right text-xs mr-2 text-blue-400"></i> Database Kepengurusan</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact & Social Media -->
            <div>
                <h3 class="text-lg font-semibold mb-6 border-b border-white/20 pb-2 inline-block">Hubungi Kami</h3>
                <ul class="space-y-4">
                    <li class="flex items-start text-gray-400 text-sm">
                        <i class="fa-solid fa-envelope mt-1 mr-3 text-blue-400"></i>
                        <a href="mailto:fmkdjakartaraya@gmail.com" class="hover:text-white transition-colors">fmkdjakartaraya@gmail.com</a>
                    </li>
                    <li class="flex items-start text-gray-400 text-sm">
                        <i class="fa-solid fa-globe mt-1 mr-3 text-blue-400"></i>
                        <a href="https://fmkdjakartaraya.vercel.app" target="_blank" class="hover:text-white transition-colors">fmkdjakartaraya.vercel.app</a>
                    </li>
                </ul>
                
                <h3 class="text-base font-semibold mt-6 mb-4">Media Sosial</h3>
                <div class="flex space-x-4">
                    <a href="https://www.instagram.com/fmkdjakartaraya/" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-gradient-to-tr hover:from-yellow-400 hover:via-pink-500 hover:to-purple-500 hover:text-white transition-all transform hover:-translate-y-1 shadow-lg">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@FMKDJakartaRaya" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-red-600 hover:text-white transition-all transform hover:-translate-y-1 shadow-lg">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/forum-mahasiswa-kedinasan-daerah-jakarta-raya/" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all transform hover:-translate-y-1 shadow-lg">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.tiktok.com/@fmkd.jakartaraya?is_from_webapp=1&sender_device=pc" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-black hover:text-white transition-all transform hover:-translate-y-1 shadow-lg border hover:border-gray-700">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="border-t border-white/10 pt-8 mt-8 text-center md:flex md:justify-between md:items-center">
            <p class="text-sm text-gray-400">
                &copy; <?= date('Y') ?> Forum Mahasiswa Kedinasan Daerah Jakarta Raya. All rights reserved.
            </p>
            <p class="text-sm text-gray-400 mt-2 md:mt-0">
                Designed with <i class="fa-solid fa-heart text-red-500 mx-1"></i> by Divisi Kominfo
            </p>
        </div>
    </div>
</footer>

</body>
</html>
