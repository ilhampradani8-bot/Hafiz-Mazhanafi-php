<nav class="fixed top-0 left-0 w-full z-[100] bg-black/20 backdrop-blur-xl border-b border-white/10 h-20 transition-all duration-300" id="navbar">
    <div class="container mx-auto h-full px-4 md:px-6 flex justify-between items-center relative z-[110]">
        
        <button id="mobile-menu-btn" onclick="toggleMenu()" class="md:hidden text-white focus:outline-none p-2">
            <div class="w-6 h-6 flex flex-col justify-between items-center pointer-events-none">
                <span id="line1" class="w-full h-[2px] bg-white transition-all duration-300 transform origin-center"></span>
                <span id="line2" class="w-full h-[2px] bg-white transition-all duration-300 opacity-100"></span>
                <span id="line3" class="w-full h-[2px] bg-white transition-all duration-300 transform origin-center"></span>
            </div>
        </button>

        <a href="index.php" class="flex items-center gap-3 cursor-pointer group">
            <img src="lexus-logo.png" alt="Lexus" class="h-8 md:h-10 w-auto object-contain group-hover:opacity-80 transition"> 
            
            <div class="text-sm md:text-xl font-bold tracking-widest uppercase text-white group-hover:text-lexusGold transition whitespace-nowrap" 
                 style="font-family: 'hafizfont', sans-serif;">
                Hafiz <span class="text-lexusGold group-hover:text-white transition">Mazhanafi</span>
            </div>
        </a>
        
        <div class="hidden md:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 gap-8">
            <a href="index.php#home" class="nav-link text-xs font-medium tracking-[0.15em] text-gray-300 hover:text-white transition"><?= $t['nav_home'] ?></a>
            <a href="index.php#about" class="nav-link text-xs font-medium tracking-[0.15em] text-gray-300 hover:text-white transition"><?= $t['nav_about'] ?></a>
            <a href="gallery.php" class="nav-link text-xs font-medium tracking-[0.15em] text-gray-300 hover:text-white transition">GALLERY</a>
            <a href="experience.php" class="nav-link text-xs font-medium tracking-[0.15em] text-lexusGold font-bold transition"><?= $t['nav_exp'] ?></a>
            <a href="index.php#contact" class="nav-link text-xs font-medium tracking-[0.15em] text-gray-300 hover:text-white transition"><?= $t['nav_contact_link'] ?></a>
        </div>

        <div class="flex items-center gap-6">
            <div class="hidden md:flex items-center gap-4">
                <a href="?lang=en" class="text-xs font-medium tracking-[0.15em] transition <?= ($lang == 'en') ? 'text-white' : 'text-gray-400 hover:text-white' ?>">EN</a>
                <span class="text-gray-600 text-xs">|</span>
                <a href="?lang=ms" class="text-xs font-medium tracking-[0.15em] transition <?= ($lang == 'ms') ? 'text-white' : 'text-gray-400 hover:text-white' ?>">MY</a>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="fixed top-20 left-0 w-full bg-black/95 backdrop-blur-xl border-b border-white/10 transform -translate-y-[150%] transition-transform duration-500 ease-in-out md:hidden flex flex-col items-center py-8 z-[90] shadow-2xl">
        <a href="index.php#home" class="mobile-link text-white hover:text-lexusGold text-sm tracking-widest mb-6 uppercase"><?= $t['nav_home'] ?></a>
        <a href="index.php#about" class="mobile-link text-white hover:text-lexusGold text-sm tracking-widest mb-6 uppercase"><?= $t['nav_about'] ?></a>
        <a href="gallery.php" class="mobile-link text-white hover:text-lexusGold text-sm tracking-widest mb-6 uppercase">GALLERY</a>
        <a href="experience.php" class="mobile-link text-lexusGold font-bold text-sm tracking-widest mb-6 uppercase"><?= $t['nav_exp'] ?></a>
        <a href="index.php#contact" class="mobile-link text-white hover:text-lexusGold text-sm tracking-widest mb-8 uppercase"><?= $t['nav_contact_link'] ?></a>
        <div class="flex gap-8 text-xs text-gray-400 font-bold tracking-widest border-t border-gray-800 pt-6 w-1/2 justify-center">
            <a href="?lang=en" class="<?= ($lang == 'en') ? 'text-white' : 'hover:text-white' ?>">EN</a>
            <a href="?lang=ms" class="<?= ($lang == 'ms') ? 'text-white' : 'hover:text-white' ?>">MY</a>
        </div>
    </div>
    <div id="mobile-overlay" onclick="closeMenu()" class="fixed inset-0 bg-black/80 hidden z-[80] backdrop-blur-sm cursor-pointer h-screen w-screen"></div>
</nav>