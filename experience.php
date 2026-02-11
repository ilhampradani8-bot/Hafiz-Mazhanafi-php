<?php
session_start();
// Logika Bahasa
if (isset($_GET['lang'])) { $_SESSION['lang'] = $_GET['lang']; }
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
if (!in_array($lang, ['en', 'ms'])) { $lang = 'en'; }
include "lang/$lang.php";

// Panggil Header Global (CSS, Font, dll)
include 'components/header.php';
?>

<style>
    /* Agar halaman tidak scroll (fokus ke wheel) */
    body { overflow: hidden; } 

    /* --- 3D WHEEL STYLES --- */
    .scene-3d {
        perspective: 1000px;
        position: relative;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .wheel-track {
        position: relative;
        width: 300px;
        height: 400px;
        transform-style: preserve-3d;
        transition: transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    .wheel-item {
        position: absolute;
        top: 50%; left: 50%;
        width: 220px; height: 140px;
        margin-top: -70px; margin-left: -110px; /* Center anchor */
        display: flex; align-items: center; justify-content: center;
        
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(197, 160, 89, 0.2);
        border-radius: 16px;
        backdrop-filter: blur(5px);
        
        transform-style: preserve-3d;
        transition: all 0.8s;
        cursor: pointer;
    }

    .wheel-item.active {
        background: rgba(255, 255, 255, 0.1);
        border-color: #C5A059;
        box-shadow: 0 0 30px rgba(197, 160, 89, 0.3);
    }

    .wheel-item img {
        max-width: 70%;
        max-height: 70%;
        object-fit: contain;
        filter: drop-shadow(0 5px 10px rgba(0,0,0,0.5));
    }

    /* --- INFO PANEL ANIMATION --- */
    .info-card {
        opacity: 0;
        transform: translateX(50px);
        transition: all 0.5s ease-out;
    }
    .info-card.visible {
        opacity: 1;
        transform: translateX(0);
    }

    /* Scroll Buttons */
    .scroll-btn {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 40px; height: 40px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; z-index: 50;
        transition: all 0.3s;
    }
    .scroll-btn:hover { background: #C5A059; color: black; }
    
    /* Responsif Mobile untuk Main Content */
    @media (max-width: 768px) {
        body { overflow-y: auto; } /* Mobile boleh scroll */
        .scene-3d { height: 400px; }
    }
</style>

<?php include 'components/navbar.php'; ?>

<main class="w-full min-h-screen flex flex-col md:flex-row items-center justify-center pt-20 relative">
    
    <div class="absolute top-24 w-full text-center z-0 pointer-events-none opacity-20">
        <h1 class="text-6xl md:text-9xl font-luxury text-transparent stroke-white stroke-2" style="-webkit-text-stroke: 1px rgba(255,255,255,0.1);">CAREER</h1>
    </div>

    <div class="w-full md:w-1/2 h-[50vh] md:h-[80vh] relative z-10 flex items-center justify-center">
        
        <div class="absolute right-4 md:right-20 top-1/2 -translate-y-1/2 flex flex-col gap-4 z-20">
            <button onclick="moveWheel(-1)" class="scroll-btn"><svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
            <button onclick="moveWheel(1)" class="scroll-btn"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
        </div>

        <div class="scene-3d">
            <div id="wheel-track" class="wheel-track">
                </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 h-auto md:h-full flex items-center justify-center md:justify-start px-6 z-20 pb-20 md:pb-0">
        
        <div id="job-info-card" class="info-card bg-black/40 backdrop-blur-xl border border-gray-800 p-8 rounded-2xl max-w-lg shadow-[0_0_50px_rgba(0,0,0,0.8)] relative">
            
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-lexusGold to-transparent"></div>

            <div class="flex items-center gap-4 mb-6">
                <div class="p-3 bg-white rounded-lg shadow-lg">
                    <img id="job-logo" src="" class="h-10 w-auto object-contain">
                </div>
                <div>
                    <h2 id="job-title" class="text-2xl font-bold text-white uppercase tracking-wide">Role</h2>
                    <p id="job-company" class="text-lexusGold text-xs uppercase tracking-[0.2em] font-bold">Company</p>
                </div>
            </div>

            <p id="job-year" class="text-gray-500 text-sm mb-6 border-b border-gray-800 pb-4">Years</p>

            <ul id="job-desc" class="list-disc ml-4 text-gray-300 text-sm space-y-3 leading-relaxed marker:text-lexusGold">
                </ul>

            <div class="mt-8 pt-4 border-t border-gray-800 flex justify-between items-center text-xs text-gray-500">
                <span id="job-index">01 / 05</span>
                <span class="uppercase tracking-widest">Professional Journey</span>
            </div>

        </div>
    </div>

</main>

<script>
    // --- DATA PENGALAMAN (DIAMBIL DARI PHP) ---
    // Perhatikan: Kita echo variabel PHP $t[...] langsung ke dalam string JS
    const experiences = [
        { 
            img: "logo-bmw.png", 
            role: "Sales Advisor",
            company: "BMW Millennium Welt KL North",
            year: "2023 – Present",
            desc: `<?= $t['job_bmw_desc'] ?>` // Ambil teks bahasa aktif
        },
        { 
            img: "logo-honda.png", 
            role: "Sales Advisor",
            company: "Tenaga Setia Resources (Honda)",
            year: "2018 – 2023",
            desc: `<?= $t['job_honda_desc'] ?>`
        },
        { 
            img: "logo-affin.png", 
            role: "Sales Executive",
            company: "Affin Islamic Bank Berhad",
            year: "2015 – 2016",
            desc: `<?= $t['job_affin_desc'] ?>`
        },
        { 
            img: "logo-rhb.png", 
            role: "Sales Executive",
            company: "RHB Banking Group",
            year: "2014 – 2015",
            desc: `<?= $t['job_rhb_desc'] ?>`
        },
        { 
            img: "logo-cimb.png", 
            role: "Financial Consultant",
            company: "CIMB Bank Berhad",
            year: "2013 – 2014",
            desc: `<?= $t['job_cimb_desc'] ?>`
        }
    ];

    let currentIndex = 0;
    const wheelTrack = document.getElementById('wheel-track');
    const theta = 360 / experiences.length;
    const radius = 250; // Jari-jari roda 3D

    // --- INIT ---
    function initExperience() {
        // Render Wheel Items
        wheelTrack.innerHTML = '';
        experiences.forEach((exp, index) => {
            const el = document.createElement('div');
            el.className = 'wheel-item';
            // Placeholder onerror agar tidak broken image
            el.innerHTML = `<img src="${exp.img}" alt="${exp.company}" onerror="this.src='https://placehold.co/100x50/333/C5A059?text=Logo'">`;
            el.onclick = () => {
                currentIndex = index;
                updateWheel();
            };
            wheelTrack.appendChild(el);
        });

        // Tampilkan data awal
        updateWheel();
    }

    // --- UPDATE 3D WHEEL & INFO ---
    function updateWheel() {
        const angle = currentIndex * -theta;
        
        // 1. Putar Roda
        wheelTrack.style.transform = `rotateX(${angle}deg)`;

        // 2. Update Style Item (Highlight yang tengah)
        const items = document.querySelectorAll('.wheel-item');
        items.forEach((item, index) => {
            // Set posisi 3D Melingkar Vertikal
            item.style.transform = `rotateX(${index * theta}deg) translateZ(${radius}px)`;

            if (index === currentIndex) {
                item.classList.add('active');
                item.style.opacity = '1';
            } else {
                item.classList.remove('active');
                item.style.opacity = '0.3';
            }
        });

        // 3. Update Info Panel (Fade Effect)
        const card = document.getElementById('job-info-card');
        card.classList.remove('visible');
        
        setTimeout(() => {
            const data = experiences[currentIndex];
            
            document.getElementById('job-logo').src = data.img;
            document.getElementById('job-title').innerText = data.role;
            document.getElementById('job-company').innerText = data.company;
            document.getElementById('job-year').innerText = data.year;
            document.getElementById('job-desc').innerHTML = data.desc; // Ini sudah berisi teks dari PHP
            document.getElementById('job-index').innerText = `0${currentIndex + 1} / 0${experiences.length}`;

            card.classList.add('visible');
        }, 300);
    }

    // --- NAVIGASI ---
    function moveWheel(dir) {
        currentIndex += dir;
        // Loop logic
        if (currentIndex < 0) currentIndex = experiences.length - 1;
        if (currentIndex >= experiences.length) currentIndex = 0;
        updateWheel();
    }

    // Scroll Mouse
    window.addEventListener('wheel', (e) => {
        if(e.deltaY > 0) moveWheel(1);
        else moveWheel(-1);
    });

    // Jalankan saat load
    document.addEventListener('DOMContentLoaded', initExperience);
</script>

<?php include 'components/footer.php'; ?>