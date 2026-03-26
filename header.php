<?php
$current_page = basename($_SERVER['PHP_SELF'], ".php");

// DYNAMIC URL GENERATOR FOR CANONICAL TAGS
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$page_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// SEO-OPTIMIZED DEFAULTS FROM YOUR CSV
$page_title = $page_title ?? "EditoHub | YouTube Automation, TikTok Editing & Thumbnail Design Agency";
$page_desc = $page_desc ?? "EditoHub is a premium creative agency for video production. We specialize in good video editing for YouTube, TikTok video edits, and custom YouTube video graphics.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo $page_desc; ?>">
    <link rel="canonical" href="<?php echo $page_url; ?>" />
    
    <link rel="alternate" hreflang="en" href="<?php echo $page_url; ?>" />
    <link rel="alternate" hreflang="x-default" href="<?php echo $page_url; ?>" />
    
    <link rel="icon" type="image/png" href="https://i.ibb.co/JR76yvRp/1758037248-icon.png">
    
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $page_url; ?>" />
    <meta property="og:title" content="<?php echo $page_title; ?>" />
    <meta property="og:description" content="<?php echo $page_desc; ?>" />
    <meta property="og:image" content="https://i.ibb.co/JR76yvRp/1758037248-icon.png" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@EditoHub_in" />
    <meta name="twitter:title" content="<?php echo $page_title; ?>" />
    <meta name="twitter:description" content="<?php echo $page_desc; ?>" />
    <meta name="twitter:image" content="https://i.ibb.co/JR76yvRp/1758037248-icon.png" />

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "EditoHub",
      "url": "https://editohub.in/",
      "logo": "https://i.ibb.co/JR76yvRp/1758037248-icon.png",
      "image": "https://i.ibb.co/JR76yvRp/1758037248-icon.png",
      "description": "Premium agency video production, YouTube automation, and thumbnail design.",
      "priceRange": "$$",
      "sameAs": [
        "https://x.com/EditoHub_in",
        "https://youtube.com/@edito-hub",
        "https://linkedin.com/company/editohub",
        "https://instagram.com/editohub",
        "https://facebook.com/editohub"
      ]
    }
    </script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"></noscript>
    <link rel="preload" href="https://unpkg.com/aos@2.3.1/dist/aos.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"></noscript>

    <style>
        /* --- THE THEME ENGINE (DARK MODE DEFAULT) --- */
        :root { 
            --bg: #030305; 
            --surface: rgba(10, 10, 14, 0.4); 
            --primary: #00d2ff; 
            --purple: #9d50bb; 
            --border: rgba(255, 255, 255, 0.05); 
            --text-main: #ffffff; 
            --text-muted: #8b949e; 
            --nav-bg: rgba(10, 10, 15, 0.6); 
            --shadow: rgba(0,0,0,0.8); 
            --easing: cubic-bezier(0.16, 1, 0.3, 1); 
        }

        /* --- THE THEME ENGINE (LIGHT MODE) --- */
        [data-theme="light"] { 
            --bg: #f8fafc; 
            --surface: rgba(255, 255, 255, 0.7); 
            --primary: #0284c7; 
            --purple: #7e22ce; 
            --border: rgba(0, 0, 0, 0.08); 
            --text-main: #0f172a; 
            --text-muted: #475569; 
            --nav-bg: rgba(255, 255, 255, 0.8); 
            --shadow: rgba(0,0,0,0.05); 
        }
        
        /* CSS RESET */
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            -webkit-tap-highlight-color: transparent !important; 
            outline: none !important; 
        }

        @media (hover: hover) and (pointer: fine) { 
            body, a, button { cursor: none !important; } 
        }

        html { 
            scroll-behavior: smooth; 
            background: var(--bg); 
        }

        ::-webkit-scrollbar { 
            width: 0px; 
            background: transparent; 
        } 

        /* SEO HIDDEN KEYWORDS (Screen Reader Only) */
        .sr-only { 
            position: absolute; 
            width: 1px; 
            height: 1px; 
            padding: 0; 
            margin: -1px; 
            overflow: hidden; 
            clip: rect(0, 0, 0, 0); 
            white-space: nowrap; 
            border-width: 0; 
        }

        /* GLOBAL BODY */
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--bg); 
            color: var(--text-main); 
            overflow-x: hidden; 
            line-height: 1.5; 
            transition: background-color 0.4s, color 0.4s; 
        }

        body.fade-out { 
            opacity: 0; 
        }

        h1, h2, h3, h4, h5, h6 { 
            color: var(--text-main) !important; 
            transition: color 0.4s; 
        }

        p:not(.btn p) { 
            color: var(--text-muted) !important; 
            transition: color 0.4s; 
        }
        
        /* UNIVERSAL SWEEP GRADIENT */
        .sweep-text { 
            background: linear-gradient(90deg, var(--text-main) 0%, var(--text-main) 40%, var(--primary) 50%, var(--text-main) 60%, var(--text-main) 100%); 
            background-size: 300% 100%; 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
            background-position: 100% 0; 
            animation: sweepAnim 7s ease-out infinite; 
            display: block; 
        }

        @keyframes sweepAnim { 
            0% { background-position: 100% 0; } 
            20% { background-position: 0% 0; } 
            100% { background-position: 0% 0; } 
        }

        /* TYPEWRITER CURSOR */
        .type-cursor { 
            font-weight: 100; 
            color: var(--text-main); 
            animation: blink 1s infinite; 
            margin-left: 5px; 
            opacity: 1; 
            display: inline-block; 
        }

        @keyframes blink { 
            0%, 100% { opacity: 1; } 
            50% { opacity: 0; } 
        }
        
        /* CARD OVERRIDES */
        .tilt-card, .service-card, .price-card, .founder-card-inline, .info-card, .story-card, .process-card, .faq-item, .modal-box, .c-card, footer { 
            background: var(--surface) !important; 
            border-color: var(--border) !important; 
            box-shadow: 0 15px 35px var(--shadow) !important; 
            transition: transform 0.4s var(--easing), background 0.4s, border-color 0.4s, box-shadow 0.4s !important; 
        }

        .service-icon, .card-icon, .c-icon, .step-num { 
            color: var(--primary) !important; 
            border-color: rgba(var(--primary), 0.3) !important; 
        }

        /* ELITE CYBERPUNK LOADER */
        #dream-loader { 
            position: fixed; 
            inset: 0; 
            background: var(--bg); 
            z-index: 1000000; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.6s, transform 0.6s; 
        }

        .loader-hidden { 
            opacity: 0; 
            visibility: hidden; 
            pointer-events: none; 
            transform: scale(1.1); 
        }

        .loader-content { 
            position: relative; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            width: 120px; 
            height: 120px; 
        }

        .loader-ring { 
            position: absolute; 
            inset: 0; 
            border-radius: 50%; 
            border: 3px solid transparent; 
            border-top-color: var(--primary); 
            border-bottom-color: var(--purple); 
            animation: spin 1.2s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite; 
            filter: drop-shadow(0 0 10px var(--primary)); 
        }

        .loader-ring-2 { 
            position: absolute; 
            inset: 12px; 
            border-radius: 50%; 
            border: 2px solid transparent; 
            border-left-color: var(--primary); 
            border-right-color: var(--purple); 
            animation: spinReverse 1.5s linear infinite; 
            opacity: 0.6; 
        }

        .loader-logo { 
            width: 65px; 
            height: 65px; 
            border-radius: 50%; 
            object-fit: cover; 
            animation: logoPulse 1.5s ease-in-out infinite alternate; 
            z-index: 10; 
        } 
        
        @keyframes spin { 
            0% { transform: rotate(0deg); } 
            100% { transform: rotate(360deg); } 
        }

        @keyframes spinReverse { 
            0% { transform: rotate(360deg); } 
            100% { transform: rotate(0deg); } 
        }

        @keyframes logoPulse { 
            0% { transform: scale(0.9); filter: brightness(0.8) drop-shadow(0 0 0px var(--primary)); } 
            100% { transform: scale(1.1); filter: brightness(1.2) drop-shadow(0 0 20px var(--primary)); } 
        }

        /* BUTTONS */
        .btn { 
            padding: 18px 40px; 
            border-radius: 100px; 
            font-weight: 800; 
            text-decoration: none; 
            border: none; 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            gap: 12px; 
            transition: 0.3s; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
            font-size: 0.85rem; 
            cursor: pointer; 
        }

        .btn-main { 
            background: var(--text-main) !important; 
            color: var(--bg) !important; 
            box-shadow: 0 10px 30px var(--shadow); 
        }

        .btn-main:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 15px 40px rgba(0, 210, 255, 0.2); 
        }

        .btn-glass { 
            background: var(--surface) !important; 
            color: var(--text-main) !important; 
            border: 1px solid var(--border) !important; 
            backdrop-filter: blur(10px); 
        }

        .btn-glass:hover { 
            border-color: var(--primary) !important; 
            transform: translateY(-5px); 
        }

        /* CUSTOM CURSOR & ORBS */
        .cursor-dot { 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 6px; 
            height: 6px; 
            background: var(--primary); 
            border-radius: 50%; 
            z-index: 999999; 
            pointer-events: none; 
            will-change: transform; 
            transition: background 0.4s; 
        }

        .cursor-outline { 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 40px; 
            height: 40px; 
            border: 1px solid var(--primary); 
            border-radius: 50%; 
            z-index: 999998; 
            pointer-events: none; 
            will-change: transform; 
            transition: border-color 0.4s; 
            opacity: 0.5; 
        }

        @media (hover: none) and (pointer: coarse) { 
            .cursor-dot, .cursor-outline { display: none !important; } 
        }

        .mesh-glow { 
            position: fixed; 
            inset: 0; 
            z-index: -2; 
            background: var(--bg); 
            overflow: hidden; 
            pointer-events: none; 
            transition: background 0.4s; 
        }

        .mesh-orb { 
            position: absolute; 
            border-radius: 50%; 
            filter: blur(100px); 
            opacity: 0.15; 
            transition: background 0.4s, opacity 0.4s; 
        }

        .mesh-orb.c1 { 
            top: -10%; 
            left: -10%; 
            width: 50vw; 
            height: 50vw; 
            background: var(--primary); 
            animation: float1 20s ease-in-out infinite alternate; 
        }

        .mesh-orb.c2 { 
            bottom: -20%; 
            right: -10%; 
            width: 60vw; 
            height: 60vw; 
            background: var(--purple); 
            animation: float2 25s ease-in-out infinite alternate; 
        }
        
        [data-theme="light"] .mesh-orb { opacity: 0.3; } 
        [data-theme="light"] .mesh-orb.c1 { background: #bae6fd; }
        [data-theme="light"] .mesh-orb.c2 { background: #e9d5ff; }

        @keyframes float1 { 0% { transform: translate(0, 0); } 100% { transform: translate(5%, 5%); } }
        @keyframes float2 { 0% { transform: translate(0, 0); } 100% { transform: translate(-5%, -5%); } }

        /* NAVIGATION BAR */
        nav { 
            position: fixed; 
            top: 20px; 
            left: 50%; 
            transform: translateX(-50%); 
            width: 95%; 
            max-width: 900px; 
            z-index: 2000; 
            background: var(--nav-bg) !important; 
            backdrop-filter: blur(12px); 
            -webkit-backdrop-filter: blur(12px); 
            padding: 12px 24px; 
            border-radius: 100px; 
            border: 1px solid var(--border) !important; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            transition: background 0.4s, border-color 0.4s; 
        }

        .logo { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            text-decoration: none; 
            transition: 0.3s; 
        }

        .logo img { 
            width: 36px; 
            height: 36px; 
            border-radius: 50%; 
            object-fit: cover; 
        } 

        .logo span { 
            font-weight: 800; 
            font-size: 1.1rem; 
            letter-spacing: -0.5px; 
            color: var(--text-main); 
            transition: color 0.4s; 
        }
        
        .nav-links { 
            display: flex; 
            gap: 15px; 
        }

        .nav-links a { 
            text-decoration: none; 
            color: var(--text-muted); 
            font-weight: 700; 
            font-size: 0.75rem; 
            text-transform: uppercase; 
            letter-spacing: 1.5px; 
            transition: 0.3s; 
            padding: 5px; 
        }

        .nav-links a:hover, .nav-links a.active { 
            color: var(--primary); 
        }
        
        .theme-toggle { 
            color: var(--text-main); 
            font-size: 1.2rem; 
            cursor: pointer; 
            transition: 0.3s; 
            padding: 5px; 
        }

        .theme-toggle:hover { 
            color: var(--primary); 
            transform: scale(1.1); 
        }

        .hamburger { 
            display: none; 
            color: var(--text-main); 
            font-size: 1.2rem; 
            cursor: pointer; 
        }

        @media (max-width: 950px) { 
            .nav-links { display: none; } 
            .hamburger { display: block; } 
        }

        /* GLASS MOBILE MENU */
        .mobile-nav { 
            position: fixed; 
            inset: 0; 
            background: rgba(3, 3, 5, 0.6); 
            backdrop-filter: blur(25px); 
            -webkit-backdrop-filter: blur(25px); 
            z-index: 1999; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            gap: 15px; 
            opacity: 0; 
            pointer-events: none; 
            transition: opacity 0.4s var(--easing); 
        }

        [data-theme="light"] .mobile-nav { 
            background: rgba(255, 255, 255, 0.6); 
        }

        .mobile-nav.active { 
            opacity: 1; 
            pointer-events: all; 
        }

        .mobile-nav a { 
            font-size: 1.3rem; 
            font-weight: 800; 
            text-transform: uppercase; 
            color: var(--text-muted); 
            text-decoration: none; 
            transition: all 0.4s var(--easing); 
            padding: 12px 35px; 
            border-radius: 100px; 
            letter-spacing: 2px; 
            border: 1px solid transparent; 
            transform: translateY(20px); 
            opacity: 0; 
        }

        .mobile-nav.active a { 
            transform: translateY(0); 
            opacity: 1; 
        }
        
        .mobile-nav a:nth-child(2) { transition-delay: 0.05s; }
        .mobile-nav a:nth-child(3) { transition-delay: 0.10s; }
        .mobile-nav a:nth-child(4) { transition-delay: 0.15s; }
        .mobile-nav a:nth-child(5) { transition-delay: 0.20s; }
        .mobile-nav a:nth-child(6) { transition-delay: 0.25s; }
        .mobile-nav a:nth-child(7) { transition-delay: 0.30s; }
        .mobile-nav a:nth-child(8) { transition-delay: 0.35s; }
        .mobile-nav a:nth-child(9) { transition-delay: 0.40s; }

        .mobile-nav a:hover, .mobile-nav a.active { 
            color: var(--primary); 
            background: rgba(0, 210, 255, 0.05); 
            border: 1px solid rgba(0, 210, 255, 0.2); 
            box-shadow: 0 10px 25px rgba(0, 210, 255, 0.1); 
            transform: translateY(-3px) scale(1.05); 
        }

        .close-menu { 
            position: absolute; 
            top: 30px; 
            right: 30px; 
            width: 45px; 
            height: 45px; 
            background: var(--surface); 
            border: 1px solid var(--border); 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.5rem; 
            color: var(--text-main); 
            cursor: pointer; 
            transition: 0.4s var(--easing); 
            box-shadow: 0 10px 25px var(--shadow); 
        }

        .close-menu:hover { 
            background: var(--primary); 
            color: var(--bg); 
            transform: rotate(90deg); 
            border-color: var(--primary); 
        }

        /* MODAL */
        .modal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.8); z-index: 5000; align-items: center; justify-content: center; padding: 20px; opacity: 0; transition: opacity 0.3s; backdrop-filter: blur(5px); }
        .modal.show { opacity: 1; display: flex; }
    </style>
</head>
<body>

    <script>
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'light') { 
            document.documentElement.setAttribute('data-theme', 'light'); 
        }
    </script>

    <div id="dream-loader">
        <div class="loader-content">
            <div class="loader-ring"></div>
            <div class="loader-ring-2"></div>
            <img src="https://i.ibb.co/JR76yvRp/1758037248-icon.png" class="loader-logo" alt="EditoHub Loading Logo">
        </div>
    </div>

    <div class="cursor-dot" id="cursorDot"></div>
    <div class="cursor-outline" id="cursorOutline"></div>
    <div class="mesh-glow">
        <div class="mesh-orb c1"></div>
        <div class="mesh-orb c2"></div>
    </div>

    <nav>
        <a href="/" class="logo transition-link">
            <img src="https://i.ibb.co/JR76yvRp/1758037248-icon.png" alt="EditoHub Agency Logo">
            <span>EditoHub</span>
        </a>
        <div class="nav-links">
            <a href="services" class="transition-link <?= ($current_page == 'services') ? 'active' : '' ?>">Services</a>
            <a href="portfolio" class="transition-link <?= ($current_page == 'portfolio') ? 'active' : '' ?>">Archive</a>
            <a href="workflow" class="transition-link <?= ($current_page == 'workflow') ? 'active' : '' ?>">Workflow</a>
            <a href="pricing" class="transition-link <?= ($current_page == 'pricing') ? 'active' : '' ?>">Pricing</a>
            <a href="blog" class="transition-link <?= ($current_page == 'blog') ? 'active' : '' ?>">Insights</a>
            <a href="collab" class="transition-link <?= ($current_page == 'collab') ? 'active' : '' ?>">Collabs</a>
        </div>
        <div style="display: flex; align-items: center; gap: 20px;">
            <div class="theme-toggle" id="themeBtn" onclick="toggleTheme()" title="Switch Theme">
                <i class="fas fa-sun"></i>
            </div>
            <div class="hamburger" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <div class="mobile-nav" id="mobileNav">
        <div class="close-menu" onclick="toggleMenu()">&times;</div>
        <a href="/" class="transition-link <?= ($current_page == 'index') ? 'active' : '' ?>">Home</a>
        <a href="services" class="transition-link <?= ($current_page == 'services') ? 'active' : '' ?>">Services</a>
        <a href="portfolio" class="transition-link <?= ($current_page == 'portfolio') ? 'active' : '' ?>">Portfolio</a>
        <a href="workflow" class="transition-link <?= ($current_page == 'workflow') ? 'active' : '' ?>">Workflow</a>
        <a href="pricing" class="transition-link <?= ($current_page == 'pricing') ? 'active' : '' ?>">Pricing</a>
        <a href="blog" class="transition-link <?= ($current_page == 'blog') ? 'active' : '' ?>">Insights</a>
        <a href="about" class="transition-link <?= ($current_page == 'about') ? 'active' : '' ?>">About Us</a>
        <a href="contact" class="transition-link <?= ($current_page == 'contact') ? 'active' : '' ?>">Contact</a>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('themeBtn');
            if(document.documentElement.getAttribute('data-theme') === 'light') { 
                btn.innerHTML = '<i class="fas fa-moon"></i>'; 
            } else { 
                btn.innerHTML = '<i class="fas fa-sun"></i>'; 
            }
        });

        function toggleTheme() {
            const root = document.documentElement;
            const btn = document.getElementById('themeBtn');
            if (root.getAttribute('data-theme') === 'light') {
                root.removeAttribute('data-theme');
                localStorage.setItem('theme', 'dark');
                btn.innerHTML = '<i class="fas fa-sun"></i>';
            } else {
                root.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
                btn.innerHTML = '<i class="fas fa-moon"></i>';
            }
        }

        function toggleMenu() { 
            document.getElementById('mobileNav').classList.toggle('active'); 
        }

        // HARDWARE ACCELERATED CUSTOM CURSOR
        if (window.matchMedia("(pointer: fine)").matches) {
            const dot = document.getElementById('cursorDot'); 
            const out = document.getElementById('cursorOutline');
            let mouseX = window.innerWidth / 2, mouseY = window.innerHeight / 2;
            let outX = mouseX, outY = mouseY;

            window.addEventListener('mousemove', (e) => { 
                mouseX = e.clientX; 
                mouseY = e.clientY; 
            });

            function animateCursor() {
                dot.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0) translate(-50%, -50%)`;
                outX += (mouseX - outX) * 0.2; 
                outY += (mouseY - outY) * 0.2;
                out.style.transform = `translate3d(${outX}px, ${outY}px, 0) translate(-50%, -50%)`;
                requestAnimationFrame(animateCursor);
            }
            animateCursor();
        }

        // GLOBAL MODAL LOGIC
        function openModal(id) { 
            const m = document.getElementById(id); 
            if(m) { 
                m.style.display = "flex"; 
                setTimeout(() => m.classList.add('show'), 10); 
            } 
        }

        function closeModal(id) { 
            const m = document.getElementById(id); 
            if(m) { 
                m.classList.remove('show'); 
                setTimeout(() => m.style.display = "none", 300); 
            } 
        }

        // PAGE TRANSITION LOGIC
        document.querySelectorAll('.transition-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.getAttribute('target') === '_blank') return;
                e.preventDefault();
                let url = this.href;
                document.body.classList.add('fade-out');
                setTimeout(() => { window.location.href = url; }, 300); 
            });
        });
    </script>
