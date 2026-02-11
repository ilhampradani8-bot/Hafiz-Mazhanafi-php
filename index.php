<?php
session_start();
if (isset($_GET['lang'])) { $_SESSION['lang'] = $_GET['lang']; }
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
if (!in_array($lang, ['en', 'ms'])) { $lang = 'en'; }
include "lang/$lang.php";

// INCLUDE HEADER
include 'components/header.php';
?>

<?php include 'components/navbar.php'; ?>

<header id="home" class="h-screen w-full bg-black relative overflow-hidden flex flex-col md:flex-row items-center">
    <div class="absolute inset-0 z-0 md:hidden">
        <img src="hafiz-pose.png" alt="Background Mobile" class="w-full h-full object-cover object-top opacity-90">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent"></div>
    </div>
    <div class="hidden md:block absolute inset-0 z-0">
        <img src="lexushero.jpg" alt="Background Desktop" class="w-full h-full object-cover opacity-50 blur-[2px]">
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-black/40"></div>
    </div>
    <div class="container mx-auto h-full relative z-20 flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 h-full flex flex-col justify-end md:justify-center px-6 md:pl-0 pb-32 md:pb-0 z-30 text-center md:text-left">
            <h1 class="font-luxury text-4xl md:text-5xl lg:text-7xl font-light tracking-wide mb-3 text-white uppercase leading-tight drop-shadow-lg">
                <?= $t['hero_title'] ?>
            </h1>
            <div class="w-20 h-1 bg-lexusGold mb-4 md:mb-6 mx-auto md:mx-0 shadow-[0_0_10px_#C5A059]"></div>
            <p class="text-lexusGold text-sm md:text-base uppercase tracking-[0.2em] mb-8 font-bold">
                <?= $t['skill_1'] ?>
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                <a href="#collection" class="px-8 py-3 bg-lexusGold text-black font-bold tracking-widest text-xs uppercase hover:bg-white hover:scale-105 transition duration-300 shadow-lg border border-lexusGold">
                    <?= $t['hero_cta'] ?>
                </a>
                <a href="#testimonials" class="px-8 py-3 border border-white text-white font-bold tracking-widest text-xs uppercase hover:bg-white hover:text-black transition duration-300 backdrop-blur-sm">
                    <?= $t['btn_sold'] ?>
                </a>
            </div>
        </div>
        <div class="hidden md:flex w-full md:w-1/2 h-full items-end justify-end relative z-10 pointer-events-none">
            <img src="hafiz-pose.png" alt="Hafiz Pose" class="h-[95%] w-auto object-contain object-bottom drop-shadow-[0_0_15px_rgba(0,0,0,0.8)]">
        </div>
    </div>
</header>

<section id="about" class="relative py-32 bg-[#050505] flex items-center justify-center overflow-hidden">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80%] h-[80%] bg-[radial-gradient(circle,rgba(197,160,89,0.05)_0%,transparent_70%)] pointer-events-none"></div>
    <div class="container mx-auto px-6 relative z-10 max-w-5xl text-center">
        <h2 class="text-3xl md:text-5xl font-sans text-white leading-tight mb-20">
            <?= $t['about_headline'] ?>
        </h2>
        <div class="grid md:grid-cols-2 gap-16 md:gap-24">
            <div class="flex flex-col items-center group">
                <div class="text-lexusGold text-3xl mb-6 opacity-50">
                    <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 13.1216 16 12.017 16H9.01703V12H14.017V0H0.0170288V12C0.0170288 16.9706 4.04647 21 9.01703 21H14.017ZM23.017 21L23.017 18C23.017 16.8954 22.1216 16 21.017 16H18.017V12H23.017V0H9.01703V12C9.01703 16.9706 13.0465 21 18.017 21H23.017Z"/></svg>
                </div>
                <p class="text-gray-300 font-sans text-lg leading-relaxed mb-6">
                    <?= $t['about_testi_1'] ?>
                </p>
                <div class="h-px w-12 bg-gray-700 mb-4"></div>
                <p class="text-xs font-bold text-lexusGold tracking-[0.2em] uppercase">
                    <?= $t['about_client_1'] ?>
                </p>
            </div>
            <div class="flex flex-col items-center group">
                <div class="text-lexusGold text-3xl mb-6 opacity-50">
                    <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 13.1216 16 12.017 16H9.01703V12H14.017V0H0.0170288V12C0.0170288 16.9706 4.04647 21 9.01703 21H14.017ZM23.017 21L23.017 18C23.017 16.8954 22.1216 16 21.017 16H18.017V12H23.017V0H9.01703V12C9.01703 16.9706 13.0465 21 18.017 21H23.017Z"/></svg>
                </div>
                <p class="text-gray-300 font-sans text-lg leading-relaxed mb-6">
                    <?= $t['about_testi_2'] ?>
                </p>
                <div class="h-px w-12 bg-gray-700 mb-4"></div>
                <p class="text-xs font-bold text-lexusGold tracking-[0.2em] uppercase">
                    <?= $t['about_client_2'] ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section id="collection" class="relative py-24 diamond-bg overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle,transparent_20%,#000_100%)] z-0 pointer-events-none"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-luxury text-white mb-4 tracking-[0.2em] uppercase drop-shadow-lg">
                Lexus Collection
            </h2>
            <div class="w-24 h-1 bg-lexusGold mx-auto shadow-[0_0_15px_#C5A059]"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 md:gap-16 justify-center items-end">
            <div class="collection-card group text-center">
                <a href="gallery.php" class="block cursor-pointer">
                    <div class="relative h-40 md:h-48 mb-4 flex items-end justify-center">
                        <img src="lbx-default.png" alt="Lexus LBX" class="w-auto h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl text-white font-luxury tracking-widest uppercase mb-1 group-hover:text-lexusGold transition"><?= $t['car_0_name'] ?></h3>
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em]"><?= $t['car_0_tag'] ?></p>
                </a>
            </div>
            <div class="collection-card group text-center">
                <a href="gallery.php" class="block cursor-pointer">
                    <div class="relative h-40 md:h-48 mb-4 flex items-end justify-center">
                        <img src="nx350f-default.png" alt="Lexus NX F Sport" class="w-auto h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl text-white font-luxury tracking-widest uppercase mb-1 group-hover:text-lexusGold transition"><?= $t['car_1_name'] ?></h3>
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em]"><?= $t['car_1_tag'] ?></p>
                </a>
            </div>
            <div class="collection-card group text-center">
                <a href="gallery.php" class="block cursor-pointer">
                    <div class="relative h-40 md:h-48 mb-4 flex items-end justify-center">
                        <img src="nx350h-default.png" alt="Lexus NX Hybrid" class="w-auto h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl text-white font-luxury tracking-widest uppercase mb-1 group-hover:text-lexusGold transition"><?= $t['car_2_name'] ?></h3>
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em]"><?= $t['car_2_tag'] ?></p>
                </a>
            </div>
            <div class="collection-card group text-center">
                <a href="gallery.php" class="block cursor-pointer">
                    <div class="relative h-40 md:h-48 mb-4 flex items-end justify-center">
                        <img src="rx350-default.png" alt="Lexus RX" class="w-auto h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl text-white font-luxury tracking-widest uppercase mb-1 group-hover:text-lexusGold transition"><?= $t['car_3_name'] ?></h3>
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em]"><?= $t['car_3_tag'] ?></p>
                </a>
            </div>
            <div class="collection-card group text-center">
                <a href="gallery.php" class="block cursor-pointer">
                    <div class="relative h-40 md:h-48 mb-4 flex items-end justify-center">
                        <img src="rx500h-default.png" alt="Lexus RX F Sport" class="w-auto h-full max-w-full object-contain">
                    </div>
                    <h3 class="text-2xl text-white font-luxury tracking-widest uppercase mb-1 group-hover:text-lexusGold transition"><?= $t['car_4_name'] ?></h3>
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em]"><?= $t['car_4_tag'] ?></p>
                </a>
            </div>
            <div class="collection-card group text-center h-full flex flex-col justify-end pb-8">
                <a href="gallery.php" class="block cursor-pointer group">
                    <div class="w-20 h-20 mx-auto rounded-full border border-gray-700 flex items-center justify-center group-hover:border-lexusGold group-hover:bg-lexusGold transition duration-500 mb-6 relative overflow-hidden">
                        <div class="absolute inset-0 bg-white/10 scale-0 group-hover:scale-150 rounded-full transition duration-500"></div>
                        <svg class="w-8 h-8 text-gray-500 group-hover:text-black transition duration-500 transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 5l7 7-7 7M5 12h15"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl text-white font-luxury tracking-[0.2em] uppercase mb-1 group-hover:text-lexusGold transition">View Gallery</h3>
                    <p class="text-gray-600 text-[10px] uppercase tracking-[0.3em] group-hover:text-gray-400 transition">See All Models</p>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="relative py-24 bg-[#080808] overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none overflow-hidden">
        <svg class="w-[150%] h-[150%] md:w-[80%] md:h-[150%] turbine-spin text-lexusGold" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="250" cy="250" r="200" stroke="currentColor" stroke-width="1" stroke-dasharray="10 10" />
            <circle cx="250" cy="250" r="150" stroke="currentColor" stroke-width="0.5" />
            <path d="M250 50 L250 450 M50 250 L450 250" stroke="currentColor" stroke-width="0.5" />
            <path d="M108 108 L392 392 M108 392 L392 108" stroke="currentColor" stroke-width="0.5" />
            <path d="M250 250 L250 50 A200 200 0 0 1 450 250 Z" fill="currentColor" fill-opacity="0.1" />
            <path d="M250 250 L250 450 A200 200 0 0 1 50 250 Z" fill="currentColor" fill-opacity="0.1" />
        </svg>
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-[#0a0a0a] via-transparent to-[#0a0a0a]"></div>
    <div class="container mx-auto px-6 relative z-10">
        <h2 class="text-4xl md:text-5xl font-luxury text-white mb-4 text-center tracking-[0.2em] uppercase drop-shadow-lg">
            <?= $t['service_head'] ?>
        </h2>
        <div class="w-24 h-1 bg-lexusGold mx-auto mb-16 shadow-[0_0_15px_#C5A059]"></div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="service-card bg-white/5 backdrop-blur-md border border-gray-800 p-8 rounded-xl text-center group">
                <div class="icon-pulse w-20 h-20 mx-auto bg-black border border-lexusGold rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-lexusGold fill-current" viewBox="0 0 24 24"><path d="M18.364 15.536L16.95 14.12l1.414-1.414a5.002 5.002 0 00-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 019.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 01-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 007.07 7.071l1.415-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07zm1.414-1.414l1.414 1.414-7.07 7.071-1.415-1.414 7.071-7.071z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4 uppercase tracking-wider group-hover:text-lexusGold transition"><?= $t['svc_1_title'] ?></h3>
                <p class="text-gray-400 text-sm leading-relaxed"><?= $t['svc_1_desc'] ?></p>
            </div>
            <div class="service-card bg-white/5 backdrop-blur-md border border-gray-800 p-8 rounded-xl text-center group">
                <div class="icon-pulse w-20 h-20 mx-auto bg-black border border-lexusGold rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-lexusGold fill-current" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4 uppercase tracking-wider group-hover:text-lexusGold transition"><?= $t['svc_2_title'] ?></h3>
                <p class="text-gray-400 text-sm leading-relaxed"><?= $t['svc_2_desc'] ?></p>
            </div>
            <div class="service-card bg-white/5 backdrop-blur-md border border-gray-800 p-8 rounded-xl text-center group">
                <div class="icon-pulse w-20 h-20 mx-auto bg-black border border-lexusGold rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-lexusGold fill-current" viewBox="0 0 24 24"><path d="M12.65 10C11.83 7.67 9.61 6 7 6c-3.31 0-6 2.69-6 6s2.69 6 6 6c2.61 0 4.83-1.67 5.65-4H17v4h4v-4h2v-4H12.65zM7 14c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4 uppercase tracking-wider group-hover:text-lexusGold transition"><?= $t['svc_3_title'] ?></h3>
                <p class="text-gray-400 text-sm leading-relaxed"><?= $t['svc_3_desc'] ?></p>
            </div>
        </div>
    </div>
</section>

<section id="testimonials" class="relative py-24 bg-[#0a0a0a] overflow-hidden">
    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#C5A059_1px,transparent_1px)] [background-size:30px_30px]"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-5xl font-luxury text-white mb-4 tracking-[0.2em] uppercase drop-shadow-lg">
                <?= $t['testi_title'] ?>
            </h2>
            <div class="w-20 h-1 bg-lexusGold mx-auto mb-6 shadow-[0_0_15px_#C5A059]"></div>
            <p class="text-gray-400 text-sm uppercase tracking-widest">
                <?= $t['testi_sub'] ?>
            </p>
        </div>
        <div id="testi-container" class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12 min-h-[200px]"></div>
        <div class="text-center relative z-20">
            <button id="toggle-view-btn" onclick="toggleTestiView()" class="group relative inline-flex items-center gap-3 px-8 py-3 bg-black border border-lexusGold rounded-full text-white hover:bg-lexusGold hover:text-black transition duration-500 overflow-hidden shadow-[0_0_20px_rgba(197,160,89,0.3)]">
                <span id="btn-text" class="text-xs font-bold tracking-[0.2em] uppercase">
                    <?= $t['btn_view_all'] ?>
                </span>
                <svg id="btn-icon" class="w-4 h-4 transition-transform duration-500 group-hover:translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <div id="image-modal" onclick="closeImageModal()" class="fixed inset-0 z-[9999] bg-black/95 hidden flex items-center justify-center cursor-zoom-out opacity-0 transition-opacity duration-300">
        <button class="absolute top-6 right-6 text-white hover:text-lexusGold transition p-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <img id="modal-img" src="" class="max-w-[90vw] max-h-[90vh] object-contain rounded-lg shadow-[0_0_50px_rgba(197,160,89,0.3)] scale-95 transition-transform duration-300" onclick="event.stopPropagation()"> <p class="absolute bottom-10 text-lexusGold tracking-[0.2em] text-sm uppercase font-bold bg-black/50 px-4 py-2 rounded-full border border-lexusGold/30 backdrop-blur-sm">Lexus Experience</p>
    </div>
</section>

<script>
    // JS Logic untuk Testimoni
    const totalPhotos = 41;      
    const previewCount = 4;      
    const folderPath = 'testimonials/';
    
    let isFullView = false;
    const container = document.getElementById('testi-container');
    const btnText = document.getElementById('btn-text');
    const btnIcon = document.getElementById('btn-icon');
    const modal = document.getElementById('image-modal');
    const modalImg = document.getElementById('modal-img');

    // Text dari PHP ke JS
    const txtViewAll = "<?= $t['btn_view_all'] ?>";
    const txtClose = "<?= $t['btn_close_gal'] ?>";

    function createCard(index) {
        const filePath = `${folderPath}client (${index}).jpg`;
        return `
            <div class="relative aspect-square rounded-xl overflow-hidden border border-gray-800 hover:border-lexusGold transition cursor-zoom-in group bg-[#111]"
                 onclick="openImageModal('${filePath}')">
                <img src="${filePath}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500 transform group-hover:scale-110" loading="lazy" onerror="this.parentElement.style.display='none'"> 
                <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition"></div>
                <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/90 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-between">
                    <span class="text-lexusGold text-[10px] font-bold uppercase tracking-widest border-b border-lexusGold pb-1">View Photo</span>
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
            </div>`;
    }

    function renderPhotos(count) {
        let html = '';
        for(let i=1; i<=count; i++) html += createCard(i);
        container.innerHTML = html;
    }

    function openImageModal(src) {
        modalImg.src = src;
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalImg.classList.remove('scale-95');
            modalImg.classList.add('scale-100');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeImageModal() {
        modal.classList.add('opacity-0');
        modalImg.classList.remove('scale-100');
        modalImg.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            modalImg.src = '';
        }, 300);
        document.body.style.overflow = 'auto';
    }

    function toggleTestiView() {
        isFullView = !isFullView;
        if(isFullView) {
            renderPhotos(totalPhotos);
            container.classList.remove('md:grid-cols-4');
            container.classList.add('md:grid-cols-4', 'lg:grid-cols-5'); 
            btnText.innerText = txtClose;
            btnIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>';
        } else {
            renderPhotos(previewCount);
            container.classList.remove('md:grid-cols-4', 'lg:grid-cols-5');
            container.classList.add('md:grid-cols-4');
            btnText.innerText = txtViewAll;
            btnIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>';
            document.getElementById('testimonials').scrollIntoView({behavior: 'smooth', block: 'start'});
        }
    }

    renderPhotos(previewCount);
</script>

<section class="py-24 bg-[#080808] border-t border-gray-900 overflow-hidden relative">
    <div class="container mx-auto px-6 mb-10 relative z-10 text-center">
        <h2 class="text-3xl md:text-5xl font-luxury text-white mb-4 tracking-[0.2em] uppercase drop-shadow-lg">
            <?= $t['rev_title'] ?>
        </h2>
        <div class="w-24 h-1 bg-lexusGold mx-auto mb-6 shadow-[0_0_15px_#C5A059]"></div>
        <p class="text-gray-400 text-sm uppercase tracking-widest">
            <?= $t['rev_sub'] ?>
        </p>
    </div>
    <div class="review-wrapper w-full overflow-hidden relative">
        <div class="review-track" id="review-track"></div>
        <div class="absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-[#080808] to-transparent z-10 pointer-events-none"></div>
        <div class="absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-[#080808] to-transparent z-10 pointer-events-none"></div>
    </div>
</section>

<script>
    setTimeout(() => {
        const track = document.getElementById('review-track');
        // Masukkan text PHP ke variabel JS
        const reviews = [
            { text: "<?= $t['rev_1'] ?>", name: "Dato' Razak", car: "Lexus RX350", initial: "D" },
            { text: "<?= $t['rev_2'] ?>", name: "Sarah Lim", car: "Lexus UX", initial: "S" },
            { text: "<?= $t['rev_3'] ?>", name: "Jason Tan", car: "Lexus NX350h", initial: "J" },
            { text: "<?= $t['rev_4'] ?>", name: "Ahmad Faizal", car: "Lexus ES", initial: "A" },
            { text: "<?= $t['rev_5'] ?>", name: "Michelle Lee", car: "Lexus RX", initial: "M" },
            { text: "<?= $t['rev_6'] ?>", name: "Kumar S.", car: "Lexus LM", initial: "K" },
            { text: "<?= $t['rev_7'] ?>", name: "Tan Sri Lim", car: "Lexus LS", initial: "T" }
        ];

        function createReviewCard(data) {
            return `
                <div class="glass-card group cursor-pointer">
                    <div class="quote-big">❝</div>
                    <div class="flex text-lexusGold mb-4 text-xs gap-1"><i>★</i><i>★</i><i>★</i><i>★</i><i>★</i></div>
                    <p class="text-gray-300 font-light leading-relaxed mb-6 text-sm italic h-24 overflow-hidden">"${data.text}"</p>
                    <div class="flex items-center gap-3 border-t border-gray-800 pt-4">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-700 to-black border border-gray-600 flex items-center justify-center text-lexusGold font-bold text-sm shadow-inner">${data.initial}</div>
                        <div>
                            <h4 class="text-white text-sm font-bold uppercase tracking-wider group-hover:text-lexusGold transition">${data.name}</h4>
                            <p class="text-gray-500 text-[10px] uppercase font-bold tracking-widest">${data.car}</p>
                        </div>
                    </div>
                </div>`;
        }

        let cardsHTML = '';
        reviews.forEach(rev => cardsHTML += createReviewCard(rev));
        reviews.forEach(rev => cardsHTML += createReviewCard(rev));
        if(track) track.innerHTML = cardsHTML;
    }, 500);
</script>

<section class="relative py-24 diamond-bg overflow-hidden border-t border-gray-900">
    <div class="absolute inset-0 bg-[radial-gradient(circle,transparent_20%,#000_100%)] z-0 pointer-events-none"></div>
    <div class="container mx-auto px-6 relative z-10 text-center">
        <h2 class="text-3xl md:text-5xl font-sans font-bold text-white tracking-widest mb-6 uppercase drop-shadow-lg">
            <?= $t['cta_title'] ?>
        </h2>
        <div class="w-24 h-1 bg-lexusGold mx-auto mb-8 shadow-[0_0_15px_#C5A059]"></div>
        <p class="text-gray-300 mb-12 max-w-2xl mx-auto font-light text-lg leading-relaxed">
            <?= $t['cta_desc'] ?>
        </p>
        <div class="max-w-2xl mx-auto bg-[#050505]/80 backdrop-blur-md border border-gray-800 p-8 rounded-xl shadow-2xl relative">
            <div class="space-y-4 text-left">
                <div>
                    <label class="text-xs text-lexusGold uppercase tracking-widest ml-1 mb-1 block"><?= $t['form_label_name'] ?></label>
                    <input type="text" id="inputName" class="w-full bg-[#111] border border-gray-700 text-white px-4 py-3 text-sm rounded focus:outline-none focus:border-lexusGold transition-colors" placeholder="<?= $t['form_ph_name'] ?>">
                </div>
                <div>
                    <label class="text-xs text-lexusGold uppercase tracking-widest ml-1 mb-1 block"><?= $t['form_label_phone'] ?></label>
                    <input type="tel" id="inputPhone" class="w-full bg-[#111] border border-gray-700 text-white px-4 py-3 text-sm rounded focus:outline-none focus:border-lexusGold transition-colors" placeholder="<?= $t['form_ph_phone'] ?>">
                </div>
                <div>
                    <label class="text-xs text-lexusGold uppercase tracking-widest ml-1 mb-1 block"><?= $t['form_label_msg'] ?></label>
                    <textarea id="inputMessage" rows="3" class="w-full bg-[#111] border border-gray-700 text-white px-4 py-3 text-sm rounded focus:outline-none focus:border-lexusGold transition-colors" placeholder="<?= $t['form_ph_msg'] ?>"></textarea>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-4 mt-8">
                <button onclick="sendToWA()" class="group w-full bg-[#25D366] hover:bg-[#128C7E] text-white py-4 px-6 rounded flex items-center justify-center gap-3 transition-all duration-300">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    <span class="font-bold tracking-widest uppercase text-xs"><?= $t['btn_wa_chat'] ?></span>
                </button>
                <button onclick="sendToEmail()" class="group w-full bg-transparent border border-gray-600 hover:border-white hover:bg-white hover:text-black text-white py-4 px-6 rounded flex items-center justify-center gap-3 transition-all duration-300">
                    <svg class="w-5 h-5 stroke-current fill-none" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <span class="font-bold tracking-widest uppercase text-xs"><?= $t['btn_email_send'] ?></span>
                </button>
            </div>
        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>