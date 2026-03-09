<?php
session_start();
if (isset($_GET['lang'])) { $_SESSION['lang'] = $_GET['lang']; }
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
if (!in_array($lang, ['en', 'ms'])) { $lang = 'en'; }
include "lang/$lang.php";

// --- PERBAIKAN KHUSUS LINUX ---
// Fungsi pengganti GLOB_BRACE agar bisa jalan di semua OS (Linux/Windows)
// --- PERBAIKAN KHUSUS LINUX + SORTING ---
function getImages($dir) {
    $results = [];
    $exts = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
    
    // Cek folder ada atau tidak
    if (is_dir($dir)) {
        foreach ($exts as $ext) {
            // Scan satu per satu ekstensi
            $files = glob("$dir/*.$ext");
            if ($files) {
                $results = array_merge($results, $files);
            }
        }
    }
    
    // TAMBAHAN: Urutkan file berdasarkan nama (01, 02, A, B, C...)
    sort($results); 
    
    // OPSI LAIN: Kalau mau yang terbaru (nama Z) tampil duluan, pakai rsort($results);
    
    return array_values($results); // Reset index array
}
// INCLUDE HEADER
include 'components/header.php';
?>

<?php include 'components/navbar.php'; ?>

<header id="home" class="relative w-full h-screen bg-[#050505] overflow-hidden flex flex-col md:flex-row">

    <div class="md:hidden absolute top-0 left-0 w-full h-[80%] z-0">
        <img src="hafiz-pose.png" alt="Hero Mobile" class="w-full h-full object-cover object-top">
        <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-black/80 to-transparent"></div>
    </div>

    <div class="md:hidden absolute bottom-0 left-0 w-full h-[25%] z-20 flex flex-col justify-center px-4 text-center
                bg-black/60 backdrop-blur-md border-t border-white/10 shadow-[0_-10px_30px_rgba(0,0,0,0.9)]">
        
        <h1 class="font-luxury text-2xl text-white leading-none mb-2 drop-shadow-md">
            <?= $t['hero_title'] ?>
        </h1>
        
        <p class="text-lexusGold text-[9px] uppercase tracking-[0.2em] font-bold mb-3">
            <?= $t['skill_1'] ?>
        </p>

        <div class="flex gap-2 justify-center">
            <a href="#collection" class="px-5 py-2 bg-lexusGold text-black font-bold text-[9px] tracking-widest uppercase rounded shadow-lg">
                <?= $t['hero_cta'] ?>
            </a>
            <a href="https://wa.me/601111492290" class="px-5 py-2 border border-white/30 text-white font-bold text-[9px] tracking-widest uppercase rounded bg-white/5">
                Contact
            </a>
        </div>
    </div>

    <div class="hidden md:block absolute inset-0 z-0">
        <img src="lexushero.jpg" alt="Background" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-[#050505] via-[#050505]/80 to-transparent"></div>
    </div>

    <div class="hidden md:flex container mx-auto h-full relative z-10 items-center">
        
        <div class="w-1/2 pl-12 pt-10">
            <h1 class="font-luxury text-5xl lg:text-7xl text-white uppercase leading-tight drop-shadow-2xl mb-6">
                <?= $t['hero_title'] ?>
            </h1>
            <div class="w-24 h-1 bg-lexusGold mb-8 shadow-[0_0_20px_#C5A059]"></div>
            <p class="text-lexusGold text-sm uppercase tracking-[0.3em] font-bold mb-10">
                <?= $t['skill_1'] ?>
            </p>
            <div class="flex gap-6">
                <a href="#collection" class="px-10 py-4 bg-lexusGold text-black font-bold tracking-[0.2em] text-xs uppercase hover:bg-white transition-all shadow-xl hover:scale-105">
                    <?= $t['hero_cta'] ?>
                </a>
                <a href="#testimonials" class="px-10 py-4 border border-white text-white font-bold tracking-[0.2em] text-xs uppercase hover:bg-lexusGold hover:text-black hover:border-lexusGold transition-all">
                    <?= $t['btn_sold'] ?>
                </a>
            </div>
        </div>

        <div class="w-1/2 h-full relative pointer-events-none flex items-end justify-end px-6">
            <img src="hafiz-pose.png" alt="Hafiz" 
                 class="h-[90%] w-auto object-contain object-bottom drop-shadow-[0_0_50px_rgba(0,0,0,0.8)]">
        </div>
    </div>

</header>

<style>
    /* Animasi Masuk Halus */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out forwards;
    }
</style>

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

<style>
    /* --- 3D EFFECTS --- */
    .testimonial-perspective {
        perspective: 1500px;
    }

    /* Floating Image Stack */
    .floating-stack {
        position: relative;
        width: 150px;
        height: 250px;
        transform-style: preserve-3d;
    }

    .thumb-3d-float {
        position: absolute;
        width: 140px;
        height: 100px;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        border: 2px solid rgba(197, 160, 89, 0.3);
        box-shadow: 0 20px 40px rgba(0,0,0,0.6);
        border-radius: 8px;
        overflow: hidden;
    }

    /* Transformasi Posisi Melayang */
    .float-prev { transform: translateY(-60px) translateZ(-100px) rotateX(15deg) rotateY(-10deg); opacity: 0.4; }
    .float-active { transform: translateY(0) translateZ(50px) rotateY(-5deg); opacity: 1; border-color: #C5A059; box-shadow: 0 0 30px rgba(197, 160, 89, 0.3); }
    .float-next { transform: translateY(60px) translateZ(-100px) rotateX(-15deg) rotateY(-10deg); opacity: 0.4; }

    /* 3D Number Effect */
    .text-3d-number {
        font-family: 'luxury', serif;
        font-size: 8rem;
        font-weight: 900;
        color: #111;
        text-shadow: 
            1px 1px 0px #C5A059,
            2px 2px 0px #A68549,
            3px 3px 0px #8C6F3D,
            10px 10px 30px rgba(0,0,0,0.8);
        line-height: 1;
        transition: all 0.5s ease;
    }

    /* Layout Centering */
    .gallery-grid {
        display: grid;
        align-items: center;
        justify-content: center;
    }
</style>


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

            <div class="collection-card group text-center">
                <a href="gallery.php" class="block cursor-pointer">
                    <div class="relative h-40 md:h-48 mb-4 flex items-end justify-center">
                        <img src="lm500h.png" alt="Lexus LM 500h" class="w-auto h-full max-w-full object-contain transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <h3 class="text-2xl text-white font-luxury tracking-widest uppercase mb-1 group-hover:text-lexusGold transition"><?= $t['car_lm_name'] ?></h3>
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em]"><?= $t['car_lm_tag'] ?></p>
                </a>
            </div>

            <div class="collection-card group text-center">
                <a href="gallery.php" class="block cursor-pointer">
                    <div class="relative h-40 md:h-48 mb-4 flex items-end justify-center">
                        <img src="gx550.png" alt="Lexus GX 550" class="w-auto h-full max-w-full object-contain transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <h3 class="text-2xl text-white font-luxury tracking-widest uppercase mb-1 group-hover:text-lexusGold transition"><?= $t['car_gx_name'] ?></h3>
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em]"><?= $t['car_gx_tag'] ?></p>
                </a>
            </div>

            <div class="collection-card group text-center">
                <a href="gallery.php" class="block cursor-pointer">
                    <div class="relative h-40 md:h-48 mb-4 flex items-end justify-center">
                        <img src="lexus-es300h.png" alt="Lexus ES 300h" class="w-auto h-full max-w-full object-contain transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <h3 class="text-2xl text-white font-luxury tracking-widest uppercase mb-1 group-hover:text-lexusGold transition"><?= $t['car_es_name'] ?></h3>
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em]"><?= $t['car_es_tag'] ?></p>
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


<style>
    /* --- MODERN 3D STYLING --- */
    .testimonial-stage {
        perspective: 2000px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0; /* Menghilangkan jarak antar kolom */
    }

    /* 3D Glass Card Container */
    .glass-panggung {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 24px;
        padding: 40px;
        display: flex;
        align-items: center;
        gap: 40px;
        box-shadow: 0 50px 100px rgba(0,0,0,0.5);
    }

    /* Floating Stack 3D - Dibuat lebih rapat & overlap */
    .stack-container {
        position: relative;
        width: 180px;
        height: 300px;
        transform-style: preserve-3d;
    }

    .thumb-modern-3d {
        position: absolute;
        width: 160px;
        height: 100px;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        cursor: pointer;
        border: 2px solid rgba(197, 160, 89, 0.2);
    }

    /* Posisi Thumbnail 3D */
    .pos-prev { transform: translateY(-70px) translateZ(-150px) rotateX(20deg); opacity: 0.3; filter: blur(2px); }
    .pos-active { transform: translateY(0) translateZ(100px) rotateY(-10deg); opacity: 1; border-color: #C5A059; box-shadow: 0 0 40px rgba(197, 160, 89, 0.4); z-index: 10; }
    .pos-next { transform: translateY(70px) translateZ(-150px) rotateX(-20deg); opacity: 0.3; filter: blur(2px); }

    /* Modern 3D Number - Melayang di belakang stack */
    .modern-number {
        position: absolute;
        left: -40px;
        top: 50%;
        transform: translateY(-50%) translateZ(-50px);
        font-family: 'luxury', serif;
        font-size: 10rem;
        font-weight: 900;
        color: rgba(197, 160, 89, 0.05);
        -webkit-text-stroke: 1px rgba(197, 160, 89, 0.2);
        line-height: 1;
        pointer-events: none;
        z-index: -1;
    }

    /* Main Image Display - Borderless & Tilt Effect */
    .main-display-box {
        position: relative;
        width: 600px;
        aspect-ratio: 16 / 10;
        background: #000;
        border-radius: 16px;
        overflow: hidden;
        transform-style: preserve-3d;
        transition: transform 0.5s ease;
    }

    /* Hover effect agar interaktif */
    .main-display-box:hover {
        transform: rotateY(5deg) rotateX(2deg);
    }

    @media (max-width: 1024px) {
        .glass-panggung { flex-direction: column; padding: 20px; gap: 20px; }
        .main-display-box { width: 100%; }
        .stack-container { height: 220px; }
    }
</style>

<style>
    /* --- MODERN 3D PERSPECTIVE --- */
    .testi-stage {
        perspective: 1000px;
    }

    /* Container Gambar Utama - UKURAN TETAP */
    .main-box-fixed {
        width: 100%;
        max-width: 900px;
        aspect-ratio: 16 / 9; /* Mengunci ukuran tetap */
        background: #000;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        /* Tanpa Border */
    }

    /* Track 3D di Bawah Foto */
    .thumbs-3d-track {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 30px;
        padding-top: 40px;
        transform-style: preserve-3d;
    }

    /* Kartu 3D */
    .card-modern-3d {
        width: 160px;
        height: 100px;
        cursor: pointer;
        transition: all 0.6s cubic-bezier(0.25, 1, 0.5, 1);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        overflow: hidden;
        background: #111;
    }

    /* Efek 3D Berdasarkan Posisi */
    .card-left { transform: rotateY(35deg) translateZ(-100px) scale(0.9); opacity: 0.4; }
    .card-center { transform: translateZ(100px) scale(1.1); opacity: 1; border-color: #C5A059; box-shadow: 0 15px 40px rgba(0,0,0,0.8); }
    .card-right { transform: rotateY(-35deg) translateZ(-100px) scale(0.9); opacity: 0.4; }

    .card-modern-3d img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Navigasi Overlay di Foto Utama */
    .nav-btn-overlay {
        position: absolute;
        top: 0;
        height: 100%;
        width: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to right, rgba(0,0,0,0.5), transparent);
        opacity: 0;
        transition: 0.3s;
        color: white;
        z-index: 10;
    }
    .main-box-fixed:hover .nav-btn-overlay { opacity: 1; }
    .nav-btn-right { right: 0; background: linear-gradient(to left, rgba(0,0,0,0.5), transparent); }

</style>

<section id="testimonials" class="py-24 bg-[#0a0a0a] overflow-hidden select-none">
    <div class="container mx-auto px-6">
        
        <div class="text-center mb-8 md:mb-12">
            <h1 class="text-3xl md:text-5xl font-luxury text-white mb-6 uppercase tracking-widest">
                <?= $t['testi_head_main'] ?>
            </h1>
            <div class="inline-flex bg-white/5 p-1 rounded-full border border-white/10 backdrop-blur-md relative z-20">
                <button onclick="switchTab('lexus')" id="tab-lexus" class="tab-modern active">Lexus</button>
                <button onclick="switchTab('bmw')" id="tab-bmw" class="tab-modern">BMW</button>
                <button onclick="switchTab('honda')" id="tab-honda" class="tab-modern">Honda</button>
            </div>
        </div>

        <div class="relative w-full max-w-4xl mx-auto group touch-pan-y" id="swipe-area">
            
            <div class="main-box-fixed bg-black rounded-xl border border-white/10 shadow-2xl overflow-hidden relative">
                <div id="loading-spinner" class="absolute inset-0 flex items-center justify-center z-0">
                    <div class="w-8 h-8 border-2 border-lexusGold border-t-transparent rounded-full animate-spin"></div>
                </div>

                <img id="gallery-main-img" src="" 
                     class="w-full h-full object-contain relative z-10 opacity-0 transition-opacity duration-500 ease-out" 
                     draggable="false" alt="Testimonial">
                
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-20 px-4 py-1 bg-black/60 backdrop-blur-md rounded-full border border-white/10">
                    <span class="text-lexusGold text-[10px] font-bold tracking-widest uppercase" id="gallery-counter">Loading...</span>
                </div>
            </div>

            <button onclick="nextImage(-1)" 
                    class="absolute top-1/2 -left-4 md:-left-12 -translate-y-1/2 z-30 
                           w-10 h-10 md:w-12 md:h-12 flex items-center justify-center 
                           bg-black/50 md:bg-transparent hover:bg-lexusGold text-white hover:text-black 
                           rounded-full border border-white/20 md:border-none backdrop-blur-sm transition-all duration-300
                           opacity-100 md:opacity-0 md:group-hover:opacity-100 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>

            <button onclick="nextImage(1)" 
                    class="absolute top-1/2 -right-4 md:-right-12 -translate-y-1/2 z-30 
                           w-10 h-10 md:w-12 md:h-12 flex items-center justify-center 
                           bg-black/50 md:bg-transparent hover:bg-lexusGold text-white hover:text-black 
                           rounded-full border border-white/20 md:border-none backdrop-blur-sm transition-all duration-300
                           opacity-100 md:opacity-0 md:group-hover:opacity-100 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>

        </div>

        <div class="mt-8 md:mt-12 h-24 md:h-32 flex justify-center items-center perspective-container">
            <div class="thumbs-track relative w-full max-w-lg flex justify-center items-center h-full" id="thumb-track">
                </div>
        </div>

    </div>
</section>

<style>
    /* Main Box Fixed Aspect Ratio */
    .main-box-fixed {
        width: 100%;
        aspect-ratio: 4/3; /* Mobile: Agak tinggi supaya foto full terlihat */
    }
    @media (min-width: 768px) {
        .main-box-fixed {
            aspect-ratio: 16/9; /* Desktop: Wide */
        }
    }

    /* Thumbnail Styles */
    .card-modern-3d {
        position: absolute;
        width: 120px;
        height: 80px;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border: 1px solid rgba(255,255,255,0.1);
        background: #111;
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    @media (max-width: 768px) {
        .card-modern-3d { width: 90px; height: 60px; } /* Mobile Thumbs Kecil */
    }

    .card-left { transform: translateX(-120%) scale(0.8); opacity: 0.4; z-index: 10; }
    .card-center { transform: translateX(0) scale(1.1); opacity: 1; z-index: 20; border-color: #C5A059; box-shadow: 0 0 20px rgba(197, 160, 89, 0.3); }
    .card-right { transform: translateX(120%) scale(0.8); opacity: 0.4; z-index: 10; }
    
    .tab-modern { padding: 8px 24px; border-radius: 99px; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #666; transition: 0.3s; }
    .tab-modern.active { background: #C5A059; color: #000; box-shadow: 0 0 15px rgba(197, 160, 89, 0.4); }
</style>

<script>
    // --- 1. DATA GATHERING ---
    // Menggunakan fungsi getImages() yang sudah kita buat sebelumnya
    const galleryData = {
        'lexus': <?php echo json_encode(getImages("testimonials-lexus")); ?>,
        'bmw': <?php echo json_encode(getImages("testimonials-bmw")); ?>,
        'honda': <?php echo json_encode(getImages("testimonials")); ?>
    };

    let currentCategory = 'lexus';
    let currentIndex = 0;
    
    // Elements
    const mainImg = document.getElementById('gallery-main-img');
    const thumbTrack = document.getElementById('thumb-track');
    const counterDisplay = document.getElementById('gallery-counter');
    const swipeArea = document.getElementById('swipe-area');

    // --- 2. LOGIC DISPLAY ---
    function switchTab(cat) {
        currentCategory = cat;
        currentIndex = 0;
        
        // Update tombol tab
        document.querySelectorAll('.tab-modern').forEach(btn => btn.classList.remove('active'));
        document.getElementById(`tab-${cat}`).classList.add('active');
        
        updateDisplay();
    }

    function updateDisplay() {
        const photos = galleryData[currentCategory];
        
        // Cek data kosong
        if(!photos || photos.length === 0) {
            mainImg.src = ''; 
            counterDisplay.innerText = 'No Photos';
            thumbTrack.innerHTML = '';
            return;
        }

        // Fade Out effect
        mainImg.style.opacity = '0.5'; 
        
        // Preload Image
        const temp = new Image();
        temp.src = photos[currentIndex];
        temp.onload = () => {
            mainImg.src = photos[currentIndex];
            mainImg.style.opacity = '1';
        };

        counterDisplay.innerText = `${currentIndex + 1} / ${photos.length}`;
        renderThumbs(photos);
    }

   
    function renderThumbs(photos) {
        let html = '';
        const positions = ['card-left', 'card-center', 'card-right'];
        
        for(let i = -1; i <= 1; i++) {
            let idx = (currentIndex + i + photos.length) % photos.length;
            const posClass = positions[i+1];
            
            // --- SEO UPDATE: Mengambil nama file untuk dijadikan teks ALT otomatis ---
            let rawName = photos[idx].split('/').pop().split('.')[0];
            let cleanAlt = "Lexus Client " + rawName.replace(/[^a-zA-Z0-9]/g, ' ');
            
            html += `
                <div onclick="jumpTo(${idx})" class="card-modern-3d ${posClass}">
                    <img src="${photos[idx]}" alt="${cleanAlt}" class="w-full h-full object-cover pointer-events-none" loading="lazy">
                </div>
            `;
        }
        thumbTrack.innerHTML = html;
    }
    

    function nextImage(dir) {
        const photos = galleryData[currentCategory];
        if(!photos.length) return;
        currentIndex = (currentIndex + dir + photos.length) % photos.length;
        updateDisplay();
    }

    function jumpTo(idx) {
        currentIndex = idx;
        updateDisplay();
    }

    // --- 3. SWIPE FEATURE (TOUCH & MOUSE) ---
    let startX = 0;
    let isDown = false;

    // A. Touch Events (HP)
    swipeArea.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });

    swipeArea.addEventListener('touchend', (e) => {
        let endX = e.changedTouches[0].clientX;
        handleSwipe(startX, endX);
    });

    // B. Mouse Events (Desktop Drag)
    swipeArea.addEventListener('mousedown', (e) => {
        isDown = true;
        startX = e.clientX;
        swipeArea.style.cursor = 'grabbing';
    });

    swipeArea.addEventListener('mouseup', (e) => {
        if(!isDown) return;
        isDown = false;
        swipeArea.style.cursor = 'default';
        handleSwipe(startX, e.clientX);
    });
    
    swipeArea.addEventListener('mouseleave', () => { isDown = false; });

    // C. Swipe Calculation
    function handleSwipe(start, end) {
        const threshold = 50; // Jarak minimal geser (px)
        if (start - end > threshold) {
            nextImage(1); // Geser Kiri -> Next
        } else if (end - start > threshold) {
            nextImage(-1); // Geser Kanan -> Prev
        }
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', () => switchTab('lexus'));
</script>




<section id="reviews" class="py-20 md:py-24 bg-[#080808] border-t border-gray-900 relative select-none overflow-hidden w-full">
    
    <div class="container mx-auto px-4 md:px-6 mb-10 relative z-10 text-center">
        <h2 class="text-3xl md:text-5xl font-luxury text-white mb-4 tracking-[0.2em] uppercase drop-shadow-lg">
            <?= $t['rev_title'] ?>
        </h2>
        <div class="w-24 h-1 bg-[#C5A059] mx-auto mb-6 shadow-[0_0_15px_#C5A059]"></div>
        <p class="text-gray-400 text-sm uppercase tracking-widest">
            <?= $t['rev_sub'] ?>
        </p>
    </div>

    <div class="container mx-auto px-4 max-w-6xl relative">
        
        <button onclick="scrollReview(-1)" class="hidden md:flex absolute -left-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-black/80 text-white rounded-full items-center justify-center border border-[#C5A059]/50 hover:bg-[#C5A059] hover:text-black transition-all shadow-[0_0_15px_rgba(197,160,89,0.2)]">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>

        <div id="review-track" class="flex overflow-x-auto snap-x snap-mandatory hide-scrollbar gap-4 md:gap-6 pb-6 pt-2 cursor-grab active:cursor-grabbing">
            </div>

        <button onclick="scrollReview(1)" class="hidden md:flex absolute -right-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-black/80 text-white rounded-full items-center justify-center border border-[#C5A059]/50 hover:bg-[#C5A059] hover:text-black transition-all shadow-[0_0_15px_rgba(197,160,89,0.2)]">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>

        <div id="review-dots" class="flex justify-center items-center gap-2 mt-4 md:mt-8">
            </div>

    </div>
</section>

<style>
    /* Hilangkan Scrollbar & Atur Pergerakan Mulus */
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { 
        -ms-overflow-style: none; 
        scrollbar-width: none; 
        scroll-behavior: smooth; 
    }

    /* Class saat sedang ditarik paksa (Matikan magnet & scroll halus sementara) */
    .active-drag {
        scroll-snap-type: none !important;
        scroll-behavior: auto !important;
        cursor: grabbing !important;
    }

    /* KARTU REVIEW (100% Layar HP) */
    .review-card-fixed {
        flex: 0 0 100%; 
        scroll-snap-align: center; 
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 10px 30px rgba(0,0,0,0.4);
        transition: transform 0.3s ease, border-color 0.3s ease;
        pointer-events: none; /* Mencegah bentrok drag dengan seleksi teks */
    }

    @media (min-width: 768px) { .review-card-fixed { flex: 0 0 calc(50% - 12px); padding: 32px; } }
    @media (min-width: 1024px) { .review-card-fixed { flex: 0 0 calc(33.333% - 16px); } }

    .review-card-fixed:hover {
        border-color: rgba(197, 160, 89, 0.5);
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.05);
    }

    .quote-big {
        font-family: serif; font-size: 3.5rem; color: rgba(197, 160, 89, 0.2);
        line-height: 0; margin-bottom: 28px; margin-top: 10px;
    }

    /* Indikator Titik */
    .dot-indicator {
        width: 8px; height: 8px; border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }
    .dot-indicator.active {
        width: 24px; border-radius: 4px;
        background-color: #C5A059;
        box-shadow: 0 0 8px rgba(197, 160, 89, 0.5);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const track = document.getElementById('review-track');
        const dotsContainer = document.getElementById('review-dots');
        
        // Data Ulasan
        const reviews = [
            { text: "<?= $t['rev_1'] ?>", name: "<?= $t['name_1'] ?>", car: "Lexus RX350", initial: "S" },
            { text: "<?= $t['rev_2'] ?>", name: "<?= $t['name_2'] ?>", car: "Lexus UX", initial: "S" },
            { text: "<?= $t['rev_3'] ?>", name: "<?= $t['name_3'] ?>", car: "Lexus NX350h", initial: "S" },
            { text: "<?= $t['rev_4'] ?>", name: "<?= $t['name_4'] ?>", car: "Lexus ES", initial: "F" },
            { text: "<?= $t['rev_5'] ?>", name: "<?= $t['name_5'] ?>", car: "Lexus RX", initial: "Y" },
            { text: "<?= $t['rev_6'] ?>", name: "<?= $t['name_6'] ?>", car: "Lexus LM", initial: "B" },
            { text: "<?= $t['rev_7'] ?>", name: "<?= $t['name_7'] ?>", car: "Lexus LS", initial: "J" }
        ];

        // 1. Generate Kartu HTML
        function createReviewCard(data) {
            return `
                <div class="review-card-fixed">
                    <div class="quote-big">❝</div>
                    <div class="flex text-[#C5A059] mb-4 text-xs gap-1">★ ★ ★ ★ ★</div>
                    <p class="text-gray-300 font-light leading-relaxed mb-6 text-sm md:text-base italic flex-grow">
                        "${data.text}"
                    </p>
                    <div class="flex items-center gap-4 border-t border-gray-700/50 pt-5 mt-auto">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gradient-to-br from-[#C5A059] to-yellow-900 flex items-center justify-center text-white font-bold text-sm shadow-md border border-white/10 shrink-0">
                            ${data.initial}
                        </div>
                        <div class="overflow-hidden">
                            <h4 class="text-white text-xs md:text-sm font-bold uppercase tracking-widest truncate">${data.name}</h4>
                            <p class="text-[#C5A059] text-[10px] uppercase font-bold tracking-wider truncate">${data.car}</p>
                        </div>
                    </div>
                </div>`;
        }

        let cardsHTML = '';
        reviews.forEach(rev => cardsHTML += createReviewCard(rev));
        if(track) track.innerHTML = cardsHTML;

        // 2. Generate Indikator Dots
        let dotsHTML = '';
        reviews.forEach((_, index) => {
            dotsHTML += `<button onclick="jumpToReview(${index})" class="dot-indicator" id="dot-${index}"></button>`;
        });
        if(dotsContainer) dotsContainer.innerHTML = dotsHTML;

        // 3. Update Dots Saat Di-Scroll
        if(track) {
            track.addEventListener('scroll', () => {
                let index = Math.round(track.scrollLeft / track.clientWidth);
                document.querySelectorAll('.dot-indicator').forEach(dot => dot.classList.remove('active'));
                let activeDot = document.getElementById(`dot-${index}`);
                if(activeDot) activeDot.classList.add('active');
            });
            document.getElementById('dot-0').classList.add('active');
        }

        // 4. LOGIKA DRAG / SWIPE PAKAI MOUSE (Desktop/Localhost Test)
        let isDown = false;
        let startX;
        let scrollLeft;

        // Saat diklik / ditekan
        track.addEventListener('mousedown', (e) => {
            isDown = true;
            track.classList.add('active-drag'); // Matikan magnet sementara
            startX = e.pageX - track.offsetLeft;
            scrollLeft = track.scrollLeft;
        });

        // Saat kursor keluar area
        track.addEventListener('mouseleave', () => {
            isDown = false;
            track.classList.remove('active-drag'); // Hidupkan magnet lagi
        });

        // Saat klik dilepas
        track.addEventListener('mouseup', () => {
            isDown = false;
            track.classList.remove('active-drag'); // Hidupkan magnet lagi
        });

        // Saat digeser
        track.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault(); // Mencegah blokir teks
            const x = e.pageX - track.offsetLeft;
            const walk = (x - startX) * 1.5; // Kecepatan geser (1.5x)
            track.scrollLeft = scrollLeft - walk;
        });

        // 5. Fungsi Navigasi Tombol & Lompat
        window.scrollReview = function(direction) {
            if(!track) return;
            const scrollAmount = track.clientWidth * direction;
            track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        };
        window.jumpToReview = function(index) {
            if(!track) return;
            const scrollAmount = track.clientWidth * index;
            track.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        };
    });
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