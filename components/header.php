<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Car Expert - Hafiz Mazhanafi</title>
    <link rel="icon" type="image/png" href="lexus-logo.png">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    lexusBlack: '#050505',
                    lexusGold: '#C5A059',
                    lexusGray: '#1a1a1a',
                },
                fontFamily: {
                    sans: ['Poppins', 'sans-serif'], 
                    luxury: ['LexusFont', 'serif'], 
                }
            }
        }
    }
    </script>

   <style>
        /* --- 1. FONT UTAMA (Lexus Font) --- */
        /* Pastikan file 'regular.ttf' ada di folder */
        @font-face {
            font-family: 'LexusFont';
            src: url('regular.ttf') format('truetype');
        }

        /* --- 2. FONT KHUSUS NAMA (Hafiz Font) --- */
        /* Pastikan file 'hafizfont.ttf' ada di folder */
        @font-face {
            font-family: 'HafizFont';
            src: url('hafizfont.ttf') format('truetype');
        }

        /* Class untuk memanggil font */
        .font-luxury { font-family: 'LexusFont', serif; }
        .font-hafiz  { font-family: 'HafizFont', sans-serif; }

        /* --- STYLE LAINNYA (JANGAN DIHAPUS) --- */
        html { scroll-behavior: smooth; }
        .car-card:hover { transform: translateY(-5px); border-color: #C5A059; }

        .diamond-bg {
            background-color: #050505;
            background-image: 
                linear-gradient(135deg, #111 25%, transparent 25%),
                linear-gradient(225deg, #111 25%, transparent 25%),
                linear-gradient(45deg, #111 25%, transparent 25%),
                linear-gradient(315deg, #111 25%, transparent 25%);
            background-position: 20px 0, 20px 0, 0 0, 0 0;
            background-size: 40px 40px;
            background-repeat: repeat;
        }

        @keyframes spinSlow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        .turbine-spin { animation: spinSlow 20s linear infinite; transform-origin: center; }

        .service-card { transition: all 0.5s ease; }
        .service-card:hover {
            transform: translateY(-10px);
            background: linear-gradient(145deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
            border-color: #C5A059;
            box-shadow: 0 0 30px rgba(197, 160, 89, 0.2);
        }
        
        .collection-card { transition: all 0.5s ease; border: none; background: transparent; position: relative; }
        .collection-card:hover { transform: translateY(-10px); }
        .collection-card:hover img { transform: scale(1.1); filter: drop-shadow(0 20px 40px rgba(0,0,0,0.8)); }

        .review-track { display: flex; gap: 30px; width: max-content; padding: 40px 0; animation: scrollText 60s linear infinite; }
        @keyframes scrollText { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
        .review-wrapper:hover .review-track { animation-play-state: paused; }

        .glass-card {
            width: 350px; flex-shrink: 0;
            background: linear-gradient(145deg, rgba(20, 20, 20, 0.6), rgba(20, 20, 20, 0.3));
            backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 16px;
            padding: 30px; position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        }
        .quote-big { font-family: serif; font-size: 80px; position: absolute; top: 10px; right: 20px; color: #C5A059; opacity: 0.1; line-height: 1; pointer-events: none; }
    </style>
</head>
<body class="bg-lexusBlack text-white antialiased"></body>