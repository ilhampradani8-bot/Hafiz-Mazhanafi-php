<?php
session_start();
// 1. Logika Bahasa
if (isset($_GET['lang'])) { $_SESSION['lang'] = $_GET['lang']; }
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
if (!in_array($lang, ['en', 'ms'])) { $lang = 'en'; }
include "lang/$lang.php";

// 2. Panggil Header Global
include 'components/header.php';
?>

<style>
    /* 1. HEADER GERBANG (ANIMASI PEMBUKA) */
    .gate-vertical {
        position: fixed; left: 0; width: 100%; height: 50%; 
        background: #000; z-index: 60;
        transition: transform 1.5s cubic-bezier(0.7, 0, 0.3, 1);
        display: flex; align-items: flex-end; justify-content: center;
    }
    #gate-top { top: 0; border-bottom: 2px solid #C5A059; }
    #gate-bottom { bottom: 0; border-top: 2px solid #C5A059; align-items: flex-start; }
    
    /* 2. SLIDER VERTIKAL */
    .slider-wrapper {
        height: 60vh; overflow: hidden; position: relative;
        mask-image: linear-gradient(to bottom, transparent, black 20%, black 80%, transparent);
        -webkit-mask-image: linear-gradient(to bottom, transparent, black 20%, black 80%, transparent);
    }
    .slider-track {
        display: flex; flex-direction: column; align-items: center;
        transition: transform 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
    }
    .car-item {
        height: 20vh; width: 100%;
        display: flex; align-items: center; justify-content: center;
        opacity: 0.4; transform: scale(0.8);
        transition: all 0.5s ease; cursor: pointer;
    }
    .car-item.active { 
        opacity: 1; transform: scale(1.2); 
        filter: drop-shadow(0 0 30px rgba(197,160,89,0.3)); 
    }
    .car-item img { max-height: 100%; max-width: 80%; object-fit: contain; }

    /* 3. INFO PANEL */
    .info-panel { opacity: 0; transform: translateX(50px); transition: all 0.6s ease; }
    .info-panel.visible { opacity: 1; transform: translateX(0); }

    /* 4. MODAL FULLSCREEN */
    #fs-modal { transition: opacity 0.4s; }
    #fs-modal.active { opacity: 1; pointer-events: auto; }
    #fs-modal:not(.active) { opacity: 0; pointer-events: none; }
    #fs-img { transition: transform 0.4s; transform: scale(0.9); }
    #fs-modal.active #fs-img { transform: scale(1); }
</style>

<?php include 'components/navbar.php'; ?>

<header id="gate-header" class="relative z-[90]">
    <div id="gate-top" class="gate-vertical">
        <h1 class="font-luxury text-4xl md:text-6xl text-white tracking-[0.3em] uppercase mb-4 gate-logo-part">LEXUS</h1>
    </div>
    <div id="gate-bottom" class="gate-vertical">
        <p class="text-gray-400 tracking-[0.5em] text-xs mt-4 uppercase gate-logo-part">Gallery Collection</p>
    </div>
</header>

<section id="gallery-container" class="container mx-auto px-6 min-h-screen flex items-center pt-20">
    <div class="grid grid-cols-1 md:grid-cols-2 w-full h-full items-center gap-10">
        
        <div class="relative w-full flex flex-col items-center justify-center order-2 md:order-1">
            <div class="slider-wrapper w-full md:w-[80%]">
                <div id="slider-track" class="slider-track">
                    </div>
            </div>
            
            <div class="absolute left-4 top-1/2 -translate-y-1/2 w-[1px] h-32 bg-gray-800 hidden md:block">
                <div class="w-full h-1/3 bg-lexusGold absolute top-0 transition-all duration-500" id="scroll-bar"></div>
            </div>
        </div>

        <div class="info-panel relative z-20 text-center md:text-left pl-0 md:pl-10 order-1 md:order-2" id="info-panel">
            
            <h3 class="text-lexusGold text-xs font-bold tracking-[0.3em] uppercase mb-2" id="info-tag">CATEGORY</h3>
            
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-luxury text-white mb-6 uppercase leading-tight" id="info-name">MODEL NAME</h1>
            
            <p class="text-gray-400 font-light leading-relaxed mb-8 max-w-md mx-auto md:mx-0 text-sm md:text-base" id="info-desc">
                Description loading...
            </p>

            <div class="flex flex-wrap gap-8 mb-10 justify-center md:justify-start">
                <div>
                    <span class="block text-[10px] text-gray-500 uppercase tracking-widest">Engine</span>
                    <span class="text-xl text-white font-luxury" id="info-engine">---</span>
                </div>
                <div>
                    <span class="block text-[10px] text-gray-500 uppercase tracking-widest">Power</span>
                    <span class="text-xl text-white font-luxury" id="info-power">---</span>
                </div>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-6 justify-center md:justify-start">
                <div class="flex gap-4">
                    <button onclick="prevCar()" class="w-12 h-12 border border-gray-700 rounded-full flex items-center justify-center hover:bg-lexusGold hover:border-lexusGold hover:text-black transition duration-300">
                        <svg class="w-5 h-5 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button onclick="nextCar()" class="w-12 h-12 border border-gray-700 rounded-full flex items-center justify-center hover:bg-lexusGold hover:border-lexusGold hover:text-black transition duration-300">
                        <svg class="w-5 h-5 -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                </div>

                <div class="hidden md:block h-px w-10 bg-gray-700"></div>

                <button onclick="openFullscreen()" class="group flex items-center gap-3 text-white hover:text-lexusGold transition">
                    <span class="text-xs font-bold uppercase tracking-widest">View Full Image</span>
                    <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-lexusGold group-hover:text-black transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                    </div>
                </button>
            </div>

        </div>
    </div>
</section>

<div id="fs-modal" class="fixed inset-0 z-[200] bg-black/95 backdrop-blur flex items-center justify-center" onclick="if(event.target === this) closeFullscreen()">
    <button onclick="closeFullscreen()" class="absolute top-6 right-6 text-white hover:text-lexusGold p-4 z-50">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
    <img id="fs-img" src="" alt="Full View" class="object-contain max-h-[85vh] max-w-[95vw]">
    <div class="absolute bottom-10 left-0 w-full text-center pointer-events-none">
        <h2 id="fs-title" class="text-2xl font-luxury text-white uppercase drop-shadow-lg tracking-widest"></h2>
    </div>
</div>

<script>
    // --- DATA MOBIL (Diinjeksi dari PHP) ---
    const carData = [
        { 
            img: "lbx-default.png", 
            name: "<?= $t['car_0_name'] ?>", tag: "<?= $t['car_0_tag'] ?>", desc: "<?= $t['car_0_desc'] ?>", 
            engine: "<?= $t['car_0_engine'] ?>", power: "<?= $t['car_0_power'] ?>"
        },
        { 
            img: "nx350f-default.png", 
            name: "<?= $t['car_1_name'] ?>", tag: "<?= $t['car_1_tag'] ?>", desc: "<?= $t['car_1_desc'] ?>", 
            engine: "<?= $t['car_1_engine'] ?>", power: "<?= $t['car_1_power'] ?>"
        },
        { 
            img: "nx350h-default.png", 
            name: "<?= $t['car_2_name'] ?>", tag: "<?= $t['car_2_tag'] ?>", desc: "<?= $t['car_2_desc'] ?>", 
            engine: "<?= $t['car_2_engine'] ?>", power: "<?= $t['car_2_power'] ?>"
        },
        { 
            img: "rx350-default.png", 
            name: "<?= $t['car_3_name'] ?>", tag: "<?= $t['car_3_tag'] ?>", desc: "<?= $t['car_3_desc'] ?>", 
            engine: "<?= $t['car_3_engine'] ?>", power: "<?= $t['car_3_power'] ?>"
        },
        { 
            img: "rx500h-default.png", 
            name: "<?= $t['car_4_name'] ?>", tag: "<?= $t['car_4_tag'] ?>", desc: "<?= $t['car_4_desc'] ?>", 
            engine: "<?= $t['car_4_engine'] ?>", power: "<?= $t['car_4_power'] ?>"
        },
        { 
            img: "lbx-default.png", 
            name: "<?= $t['car_5_name'] ?>", tag: "<?= $t['car_5_tag'] ?>", desc: "<?= $t['car_5_desc'] ?>", 
            engine: "<?= $t['car_5_engine'] ?>", power: "<?= $t['car_5_power'] ?>"
        }
    ];

    let currentIndex = 0;
    const track = document.getElementById('slider-track');
    const infoPanel = document.getElementById('info-panel');
    const gateTop = document.getElementById('gate-top');
    const gateBottom = document.getElementById('gate-bottom');

    // --- INIT ---
    function initGallery() {
        // Render Gambar
        if(track) {
            track.innerHTML = '';
            carData.forEach((car, index) => {
                const el = document.createElement('div');
                el.className = `car-item ${index === 0 ? 'active' : ''}`;
                el.innerHTML = `<img src="${car.img}" onerror="this.src='https://placehold.co/400x250/333333/C5A059?text=Lexus'" alt="${car.name}">`;
                el.onclick = () => goToCar(index);
                track.appendChild(el);
            });
        }

        // Tampilkan Info Awal
        updateView();

        // Animasi Buka Gerbang
        setTimeout(() => {
            if(gateTop && gateBottom) {
                gateTop.style.transform = 'translateY(-100%)';
                gateBottom.style.transform = 'translateY(100%)';
                document.querySelectorAll('.gate-logo-part').forEach(el => el.style.opacity = '0');
            }
        }, 500);
    }

    // --- UPDATE TAMPILAN ---
    function updateView() {
        if(!track) return;

        // 1. Geser Slider
        const itemHeightVh = 20; 
        const offset = (1 - currentIndex) * itemHeightVh; 
        track.style.transform = `translateY(${offset}vh)`;

        // 2. Highlight Gambar
        document.querySelectorAll('.car-item').forEach((item, i) => {
            if (i === currentIndex) item.classList.add('active');
            else item.classList.remove('active');
        });

        // 3. Update Teks Info
        if(infoPanel) {
            infoPanel.classList.remove('visible');
            setTimeout(() => {
                const data = carData[currentIndex];
                
                document.getElementById('info-name').innerText = data.name;
                document.getElementById('info-tag').innerText = data.tag;
                document.getElementById('info-desc').innerHTML = data.desc;
                document.getElementById('info-engine').innerText = data.engine;
                document.getElementById('info-power').innerText = data.power;
                
                infoPanel.classList.add('visible');
            }, 300);
        }

        // 4. Update Scroll Bar
        const bar = document.getElementById('scroll-bar');
        if(bar) {
            const pct = (currentIndex / (carData.length - 1)) * 100;
            bar.style.top = `${pct}%`;
            if(pct > 85) { bar.style.top = 'auto'; bar.style.bottom = '0'; }
        }
    }

    // --- NAVIGASI ---
    function nextCar() { if (currentIndex < carData.length - 1) { currentIndex++; updateView(); } }
    function prevCar() { if (currentIndex > 0) { currentIndex--; updateView(); } }
    function goToCar(index) { currentIndex = index; updateView(); }

    // Scroll Mouse
    document.querySelector('.slider-wrapper').addEventListener('wheel', (e) => {
        e.preventDefault();
        if (e.deltaY > 0) nextCar(); else prevCar();
    });

    // --- FULLSCREEN ---
    const modal = document.getElementById('fs-modal');
    const fsImg = document.getElementById('fs-img');
    const fsTitle = document.getElementById('fs-title');

    function openFullscreen() {
        const data = carData[currentIndex];
        fsImg.src = data.img;
        fsTitle.innerText = data.name;
        modal.classList.add('active');
    }
    function closeFullscreen() { 
        modal.classList.remove('active'); 
    }

    // Start
    document.addEventListener('DOMContentLoaded', initGallery);
</script>

<?php include 'components/footer.php'; ?>