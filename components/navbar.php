<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent text-white">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
                <div class="flex-shrink-0 flex items-center cursor-pointer group" onclick="window.location.href='index.php'">
                <img src="assets/img/logo-fmkd-new.png" alt="Logo FMKD JR" class="w-12 h-12 object-contain mr-3 group-hover:scale-105 transition-transform drop-shadow-md">
                <div class="flex flex-col leading-none">
                    <span class="font-bold text-base tracking-wider uppercase drop-shadow-md">FMKD <span class="font-light">JR</span></span>
                    <span class="text-[10px] font-medium text-blue-200 tracking-wide">Forum Mahasiswa Kedinasan Daerah Jakarta Raya</span>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-0 xl:space-x-2">
                <?php
                $navItems = [
                    '<span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-orange-400 to-yellow-300 font-black drop-shadow-[0_0_12px_rgba(234,179,8,0.9)] animate-pulse tracking-widest inline-flex items-center gap-1 text-[15px]"><i class="fa-solid fa-star text-orange-400"></i> PTK EXPO 2026</span>' => 'javascript:alert("Coming Soon! Website PTK EXPO 2026 sedang dipersiapkan.");',
                    'Home' => 'index.php',
                    'About' => 'tentang.php',
                    'Visi-Misi' => 'visi-misi.php',
                    'Kegiatan & Berita' => 'artikel.php',
                    'Database DPD' => 'database.php',
                    'Pendaftaran' => 'pendaftaran.php',
                    'Kontak' => 'kontak.php'
                ];
                
                $currentPage = basename($_SERVER['PHP_SELF']);
                
                foreach ($navItems as $name => $link) {
                    if (is_array($link)) {
                        $isActive = in_array($currentPage, $link) ? 'bg-white/20 font-semibold text-white' : 'hover:bg-white/10 hover:text-white font-medium text-gray-200';
                        echo "<div class=\"relative group\">";
                        echo "<button class=\"px-3 py-2 rounded-md text-sm whitespace-nowrap transition-all duration-200 flex items-center $isActive\">$name <i class=\"fas fa-caret-down ml-1\"></i></button>";
                        echo "<div class=\"absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white/5 backdrop-blur-md border border-white/10 text-white ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50\">";
                        echo "<div class=\"py-1\">";
                        foreach ($link as $subName => $subLink) {
                            $isSubActive = ($currentPage == $subLink) ? 'bg-white/20 text-blue-300 font-bold' : 'text-gray-300 hover:bg-white/10 hover:text-white';
                            echo "<a href=\"$subLink\" class=\"block px-4 py-2 text-sm $isSubActive\">$subName</a>";
                        }
                        echo "</div></div></div>";
                    } else {
                        $isActive = ($currentPage == $link) ? 'bg-white/20 font-semibold text-white' : 'hover:bg-white/10 hover:text-white font-medium text-gray-200';
                        echo "<a href=\"$link\" class=\"px-3 py-2 rounded-md text-sm whitespace-nowrap transition-all duration-200 $isActive\">$name</a>";
                    }
                }
                ?>
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-white hover:text-gray-300 focus:outline-none p-2">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden glass-dark absolute w-full left-0 shadow-lg border-t border-white/10">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <?php
            foreach ($navItems as $name => $link) {
                if (is_array($link)) {
                    $isActiveGroup = in_array($currentPage, $link) ? 'text-white' : 'text-gray-300';
                    echo "<div class=\"px-3 py-2 text-base font-medium $isActiveGroup\">$name</div>";
                    echo "<div class=\"pl-6 space-y-1 pb-2\">";
                    foreach ($link as $subName => $subLink) {
                        $isActiveMobile = ($currentPage == $subLink) ? 'bg-white/20 text-white font-bold' : 'text-gray-300 hover:bg-white/10 hover:text-white';
                        echo "<a href=\"$subLink\" class=\"block px-3 py-2 rounded-md text-base font-medium $isActiveMobile\">$subName</a>";
                    }
                    echo "</div>";
                } else {
                    $isActiveMobile = ($currentPage == $link) ? 'bg-white/20 text-white font-bold' : 'text-gray-300 hover:bg-white/10 hover:text-white';
                    echo "<a href=\"$link\" class=\"block px-3 py-3 rounded-md text-base font-medium $isActiveMobile\">$name</a>";
                }
            }
            ?>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                const icon = this.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-xmark');
                }
            });
        }
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 10) {
                navbar.classList.add('glass-dark', 'shadow-md');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('glass-dark', 'shadow-md');
                navbar.classList.add('bg-transparent');
            }
        });
    });
</script>





