<?php
session_start();
if (isset($_GET['lang'])) { $_SESSION['lang'] = $_GET['lang']; }
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
if (!in_array($lang, ['en', 'ms'])) { $lang = 'en'; }
include "lang/$lang.php";
include 'components/header.php';
?>

<style>
    /* Agar tidak scroll body */
    body { overflow-x: hidden; background-color: #050505; }

    /* --- 3D CAROUSEL STYLES --- */
    .carousel-container {
        perspective: 1000px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        height: 150px;
        margin-top: 20px;
    }

    .thumb-card {
        width: 120px;
        height: 80px;
        transition: all 0.5s ease;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #333;
        box-shadow: 0 10px 20px rgba(0,0,0,0.5);
        cursor: pointer;
        opacity: 0.5;
        position: relative;
    }

    .thumb-card img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Thumbnail boleh crop dikit biar rapi */
    }

    /* Kartu Aktif (Tengah) */
    .thumb-card.active {
        transform: scale(1.3) translateZ(50px);
        opacity: 1;
        border-color: #C5A059;
        box-shadow: 0 0 20px rgba(197, 160, 89, 0.4);
        z-index: 10;
    }

    /* Kartu Kiri */
    .thumb-card.left {
        transform: rotateY(25deg) scale(0.9);
        opacity: 0.6;
    }

    /* Kartu Kanan */
    .thumb-card.right {
        transform: rotateY(-25deg) scale(0.9);
        opacity: 0.6;
    }

    /* Main Image Styling (Anti Crop) */
    .main-frame {
        background: #000; /* Background hitam biar foto landscape/portrait aman */
        border: 1px solid #222;
        box-shadow: inset 0 0 50px #000;
    }
</style>

<?php include 'components/navbar.php'; ?>

<section class="min-h-screen pt-24 pb-10 diamond-bg flex flex-col justify-center">
    <div class="container mx-auto px-6 h-full">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 h-full items-center">
            
            <div class="lg:col-span-4 flex flex-col justify-center order-2 lg:order-1 relative z-10 text-center lg:text-left">
                
                <div class="mb-6">
                    <h2 class="text-lexusGold text-xs tracking-[0.3em] uppercase font-bold mb-2"><?= $t['testi_sub'] ?></h2>
                    <h1 class="text-3xl md:text-4xl font-luxury text-white leading-tight">
                        <?= $t['testi_header'] ?>
                    </h1>
                </div>

                <div class="bg-white/5 border border-white/10 p-6 rounded-xl backdrop-blur-md shadow-2xl relative">
                    <div class="absolute -top-4 -left-4 text-6xl text-lexusGold opacity-20 font-serif">“</div>
                    
                    <p id="client-quote" class="text-gray-300 font-light italic leading-relaxed mb-6 text-sm transition-opacity duration-300">
                        Loading...
                    </p>

                    <div class="flex items-center gap-4 justify-center lg:justify-start">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-lexusGold to-yellow-700 flex items-center justify-center text-black font-bold text-lg shadow-lg" id="client-initial">
                            A
                        </div>
                        <div class="text-left">
                            <h4 id="client-name" class="text-white font-bold uppercase tracking-widest text-sm">CLIENT</h4>
                            <div class="flex text-lexusGold text-xs mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 mt-6 justify-center lg:justify-start lg:hidden">
                    <button onclick="moveIndex(-1)" class="p-3 border border-gray-700 rounded-full text-white hover:bg-lexusGold hover:text-black transition">←</button>
                    <button onclick="moveIndex(1)" class="p-3 border border-gray-700 rounded-full text-white hover:bg-lexusGold hover:text-black transition">→</button>
                </div>

            </div>

            <div class="lg:col-span-8 flex flex-col items-center order-1 lg:order-2">
                
                <div class="main-frame relative w-full h-[50vh] md:h-[60vh] rounded-xl overflow-hidden mb-4">
                    <img id="main-image" src="" class="w-full h-full object-contain transition-opacity duration-500 opacity-0" alt="Happy Client">
                </div>

                <div class="relative w-full max-w-lg hidden lg:block">
                    <button onclick="moveIndex(-1)" class="absolute left-0 top-1/2 -translate-y-1/2 z-20 text-white hover:text-lexusGold text-3xl">❮</button>
                    <button onclick="moveIndex(1)" class="absolute right-0 top-1/2 -translate-y-1/2 z-20 text-white hover:text-lexusGold text-3xl">❯</button>

                    <div class="carousel-container">
                        <div class="thumb-card left" onclick="moveIndex(-1)">
                            <img id="thumb-left" src="" alt="Prev">
                        </div>
                        <div class="thumb-card active">
                            <img id="thumb-active" src="" alt="Active">
                        </div>
                        <div class="thumb-card right" onclick="moveIndex(1)">
                            <img id="thumb-right" src="" alt="Next">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<script>
    // --- KONFIGURASI ---
    const totalPhotos = 41;  
    const folderPath = 'testimonials/'; 
    const fileExtension = '.jpg'; // Pastikan sesuai

    // --- DATA DARI PHP (LANG) ---
    // Kita buat array dari data lang PHP
    const quotes = [
        "<?= $t['quote_1'] ?>",
        "<?= $t['quote_2'] ?>",
        "<?= $t['quote_3'] ?>",
        "<?= $t['quote_4'] ?>",
        "<?= $t['quote_5'] ?>"
    ];

    const names = [
        "Datuk Azman", "Puan Sarah", "Dr. Lim", "Mr. Chong", "Encik Rahim", 
        "Cik Nurul", "Mr. Muthu", "Datin Rozita", "Mr. Tan", "Ms. Priya"
    ];

    let currentIndex = 1;

    // --- DOM ELEMENTS ---
    const mainImg = document.getElementById('main-image');
    const thumbLeft = document.getElementById('thumb-left');
    const thumbActive = document.getElementById('thumb-active');
    const thumbRight = document.getElementById('thumb-right');
    
    const txtQuote = document.getElementById('client-quote');
    const txtName = document.getElementById('client-name');
    const txtInitial = document.getElementById('client-initial');

    // --- INIT ---
    document.addEventListener('DOMContentLoaded', () => {
        updateUI();
    });

    // --- LOGIC UTAMA ---
    function moveIndex(dir) {
        currentIndex += dir;
        // Loop logic (1 -> 41 -> 1)
        if (currentIndex > totalPhotos) currentIndex = 1;
        if (currentIndex < 1) currentIndex = totalPhotos;
        
        updateUI();
    }

    function updateUI() {
        // 1. Update Main Image
        const currentSrc = `${folderPath}client (${currentIndex})${fileExtension}`;
        
        // Efek Fade
        mainImg.style.opacity = 0;
        setTimeout(() => {
            mainImg.src = currentSrc;
            mainImg.style.opacity = 1;
        }, 200);

        // 2. Update 3D Thumbnails
        // Hitung index tetangga
        let prevIndex = currentIndex - 1;
        if(prevIndex < 1) prevIndex = totalPhotos;

        let nextIndex = currentIndex + 1;
        if(nextIndex > totalPhotos) nextIndex = 1;

        thumbActive.src = currentSrc;
        thumbLeft.src = `${folderPath}client (${prevIndex})${fileExtension}`;
        thumbRight.src = `${folderPath}client (${nextIndex})${fileExtension}`;

        // 3. Update Text (Random konsisten)
        const nameIdx = (currentIndex - 1) % names.length;
        const quoteIdx = (currentIndex - 1) % quotes.length;

        txtQuote.innerText = `"${quotes[quoteIdx]}"`;
        txtName.innerText = names[nameIdx];
        txtInitial.innerText = names[nameIdx].charAt(0);
    }

    // Keyboard Arrow Control
    document.addEventListener('keydown', (e) => {
        if(e.key === 'ArrowLeft') moveIndex(-1);
        if(e.key === 'ArrowRight') moveIndex(1);
    });

</script>

<?php include 'components/footer.php'; ?>