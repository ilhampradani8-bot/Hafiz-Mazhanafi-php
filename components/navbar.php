<nav id="navbar" class="fixed top-0 left-0 w-full z-[1000]">

    <div class="relative w-full h-20 bg-black/95 backdrop-blur-xl border-b border-white/10 z-[50] flex items-center">
        <div class="container mx-auto px-4 md:px-6 flex justify-between items-center w-full">

            <button id="burger-btn" class="md:hidden text-white p-2 focus:outline-none transition-transform hover:scale-110">
                <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="burger-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <a href="index.php" class="flex items-center justify-center gap-2 group mx-auto md:mx-0">
                <img src="lexus-logo.png" alt="Lexus" class="h-6 sm:h-7 md:h-8 w-auto">
                <div class="font-hafiz text-sm sm:text-base md:text-xl font-bold tracking-widest uppercase text-white group-hover:text-lexusGold transition whitespace-nowrap">
                    Hafiz <span class="text-lexusGold group-hover:text-white transition">Mazhanafi</span>
                </div>
            </a>

            <div class="hidden md:flex gap-8 items-center ml-auto mr-8">
                <a href="index.php#home" class="text-[10px] tracking-[0.2em] uppercase font-bold hover:text-lexusGold transition"><?= $t['nav_home'] ?></a>
                
<a href="index.php#reviews" class="text-[10px] tracking-[0.2em] uppercase font-bold hover:text-lexusGold transition"><?= $t['nav_testi'] ?></a>                
                <a href="gallery.php" class="text-[10px] tracking-[0.2em] uppercase font-bold hover:text-lexusGold transition">GALLERY</a>
                <a href="experience.php" class="text-[10px] tracking-[0.2em] uppercase font-bold text-lexusGold transition"><?= $t['nav_exp'] ?></a>
            </div>

            <div class="hidden md:flex items-center gap-3 md:gap-4 text-[10px] font-bold">
                <a href="?lang=en" class="<?= ($lang == 'en') ? 'text-lexusGold' : 'text-gray-500 hover:text-white' ?> transition">EN</a>
                <span class="text-gray-700">|</span>
                <a href="?lang=ms" class="<?= ($lang == 'ms') ? 'text-lexusGold' : 'text-gray-500 hover:text-white' ?> transition">MY</a>
            </div>

            <div class="md:hidden flex items-center">
                <?php if($lang == 'en'): ?>
                    <a href="?lang=ms" class="text-[10px] font-bold tracking-widest text-white border border-white/20 px-3 py-1.5 rounded-full hover:bg-lexusGold hover:text-black transition">
                        MY
                    </a>
                <?php else: ?>
                    <a href="?lang=en" class="text-[10px] font-bold tracking-widest text-white border border-white/20 px-3 py-1.5 rounded-full hover:bg-lexusGold hover:text-black transition">
                        EN
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <div id="mobile-dropdown" class="absolute top-20 left-0 w-full bg-[#050505]/95 backdrop-blur-xl border-b border-white/10 flex flex-col items-center justify-center gap-6 py-8 transition-all duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] transform -translate-y-[150%] opacity-0 z-[40] shadow-2xl">
        
        <a href="index.php#home" class="mobile-link text-sm tracking-[0.3em] text-white hover:text-lexusGold uppercase font-bold"><?= $t['nav_home'] ?></a>
        
<a href="index.php#reviews" class="mobile-link text-sm tracking-[0.3em] text-white hover:text-lexusGold uppercase font-bold"><?= $t['nav_testi'] ?></a>        
        <a href="gallery.php" class="mobile-link text-sm tracking-[0.3em] text-white hover:text-lexusGold uppercase font-bold">GALLERY</a>
        <a href="experience.php" class="mobile-link text-sm tracking-[0.3em] text-lexusGold uppercase font-bold"><?= $t['nav_exp'] ?></a>

    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('burger-btn');
        const menu = document.getElementById('mobile-dropdown');
        const iconPath = document.getElementById('burger-path');
        const nav = document.getElementById('navbar');
        const links = document.querySelectorAll('.mobile-link');

        function toggleMenu() {
            const isClosed = menu.classList.contains('-translate-y-[150%]');
            
            if (isClosed) {
                // EFEK BUKA
                menu.classList.remove('-translate-y-[150%]', 'opacity-0');
                menu.classList.add('translate-y-0', 'opacity-100');
                iconPath.setAttribute('d', 'M6 18L18 6M6 6l12 12'); // Ikon X
            } else {
                // EFEK TUTUP
                menu.classList.remove('translate-y-0', 'opacity-100');
                menu.classList.add('-translate-y-[150%]', 'opacity-0');
                iconPath.setAttribute('d', 'M4 6h16M4 12h16m-7 6h7'); // Ikon Burger
            }
        }

        // 1. Klik Burger
        if(btn) {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleMenu();
            });
        }

        // 2. Auto-Hide: Klik area luar
        document.addEventListener('click', (e) => {
            if (nav && menu && !nav.contains(e.target) && menu.classList.contains('translate-y-0')) {
                toggleMenu();
            }
        });

        // 3. Auto-Hide: Klik link
        links.forEach(link => {
            link.addEventListener('click', () => {
                if (menu.classList.contains('translate-y-0')) {
                    toggleMenu();
                }
            });
        });
    });
</script>