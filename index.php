<?php 
$page_title = "EditoHub | Elite Video Editing & Thumbnail Design Agency";
$page_desc = "EditoHub is a premium video editing and thumbnail design agency. We engineer high-retention visuals, viral motion graphics, and YouTube automation strategies.";
include 'header.php'; 
?>

<style>
    .hero { 
        padding: 25vh 20px 10vh; 
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        text-align: center; 
        position: relative; 
        z-index: 10; 
    }

    .hero-label { 
        font-size: 0.75rem; 
        font-weight: 800; 
        text-transform: uppercase; 
        letter-spacing: 4px; 
        color: var(--primary); 
        margin-bottom: 25px; 
        background: rgba(0, 210, 255, 0.1); 
        padding: 8px 20px; 
        border-radius: 100px; 
        border: 1px solid rgba(0, 210, 255, 0.2); 
    }

    .hero-title { 
        font-size: clamp(3rem, 8vw, 6.5rem); 
        font-weight: 900; 
        line-height: 1.1; 
        letter-spacing: -3px; 
        margin-bottom: 30px; 
        min-height: 2.3em; 
    }

    .hero-desc { 
        font-size: clamp(1.1rem, 2vw, 1.3rem); 
        color: var(--text-muted); 
        max-width: 600px; 
        line-height: 1.6; 
        font-weight: 400; 
        margin-bottom: 40px; 
    }

    .btn-wrap { 
        display: flex; 
        gap: 20px; 
        justify-content: center; 
        flex-wrap: wrap; 
    }
    
    .scroll-indicator { 
        margin-top: 80px; 
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        gap: 12px; 
        opacity: 0.5; 
    }

    .mouse-outline { 
        width: 24px; 
        height: 36px; 
        border: 2px solid var(--text-muted); 
        border-radius: 50px; 
        position: relative; 
    }

    .mouse-wheel { 
        width: 4px; 
        height: 8px; 
        background: var(--text-main); 
        border-radius: 4px; 
        position: absolute; 
        top: 6px; 
        left: 50%; 
        transform: translateX(-50%); 
        animation: wheelDrop 2s ease-in-out infinite; 
    }

    @keyframes wheelDrop { 
        0% { top: 6px; opacity: 1; } 
        100% { top: 18px; opacity: 0; } 
    }

    .sec-title { 
        text-align: center; 
        font-size: clamp(2.5rem, 6vw, 4rem); 
        font-weight: 900; 
        margin-bottom: 60px; 
        color: var(--text-main); 
        letter-spacing: -1.5px; 
    }

    .services-section { 
        padding: 80px 20px; 
        max-width: 1300px; 
        margin: 0 auto; 
        position: relative; 
        z-index: 10; 
        perspective: 1000px; 
    }

    .grid-3 { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); 
        gap: 30px; 
    }

    .tilt-card { 
        padding: 50px 40px; 
        border-radius: 30px; 
        text-align: center; 
        transition: transform 0.2s ease-out, border-color 0.3s ease; 
        transform-style: preserve-3d; 
        will-change: transform; 
    }

    .tilt-inner { 
        transform: translateZ(30px); 
        pointer-events: none; 
    }

    .service-icon { 
        width: 70px; 
        height: 70px; 
        background: rgba(0,210,255,0.05); 
        border: 1px solid rgba(0,210,255,0.2); 
        border-radius: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        font-size: 2rem; 
        color: var(--primary); 
        margin: 0 auto 25px; 
    }

    .tilt-card h3 { 
        font-size: 1.5rem; 
        font-weight: 800; 
        margin-bottom: 15px; 
        letter-spacing: -0.5px; 
    }

    .tilt-card p { 
        font-size: 1rem; 
        line-height: 1.6; 
    }

    .featured-section { 
        padding: 80px 20px; 
        max-width: 1400px; 
        margin: 0 auto; 
        text-align: center; 
        z-index: 10; 
        position: relative; 
    }

    .preview-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); 
        gap: 20px; 
    }

    .preview-card { 
        position: relative; 
        border-radius: 24px; 
        overflow: hidden; 
        border: 1px solid var(--border); 
        aspect-ratio: 16/9; 
        background: var(--surface); 
        cursor: pointer; 
        transition: transform 0.3s ease; 
    }

    .preview-img { 
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        opacity: 0.6; 
        transition: 0.5s ease; 
    }

    .preview-card:hover { 
        transform: translateY(-10px); 
        border-color: var(--primary); 
    }

    .preview-card:hover .preview-img { 
        opacity: 1; 
        transform: scale(1.05); 
    }

    .preview-overlay { 
        position: absolute; 
        inset: 0; 
        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 50%); 
        display: flex; 
        flex-direction: column; 
        justify-content: flex-end; 
        align-items: flex-start; 
        padding: 30px; 
        pointer-events: none; 
    }

    .preview-overlay span { 
        font-size: 1.4rem; 
        font-weight: 900; 
        color: #fff !important; 
        letter-spacing: -0.5px; 
        margin-bottom: 5px; 
    }

    .preview-overlay small { 
        color: var(--primary); 
        font-weight: 800; 
        font-size: 0.75rem; 
        text-transform: uppercase; 
        letter-spacing: 2px; 
    }

    .founder-section { 
        padding: 40px 20px 40px; 
        max-width: 1000px; 
        margin: 0 auto; 
        position: relative; 
        z-index: 10; 
    }

    .founder-card-inline { 
        display: flex; 
        align-items: center; 
        gap: 50px; 
        padding: 50px; 
        border-radius: 40px; 
        transition: transform 0.4s ease; 
        background: var(--surface); 
        border: 1px solid var(--border); 
    }

    .founder-card-inline:hover { 
        transform: translateY(-5px); 
        border-color: var(--primary); 
    }

    .founder-img-inline { 
        width: 150px; 
        height: 150px; 
        border-radius: 50%; 
        object-fit: cover; 
        border: 2px solid var(--border); 
        flex-shrink: 0; 
    }

    .founder-info-inline { 
        text-align: left; 
    }

    .founder-info-inline h3 { 
        font-size: 2.5rem; 
        font-weight: 900; 
        margin-bottom: 5px; 
        line-height: 1; 
        letter-spacing: -1px; 
    }

    .founder-info-inline h3 span { 
        color: var(--text-muted); 
        font-size: 1.2rem; 
        font-weight: 500; 
        letter-spacing: 0; 
    }

    .founder-info-inline p.title { 
        color: var(--primary); 
        font-weight: 800; 
        font-size: 0.8rem; 
        text-transform: uppercase; 
        letter-spacing: 4px; 
        margin-bottom: 15px; 
    }

    .founder-info-inline p.desc { 
        font-size: 1.05rem; 
        margin-bottom: 25px; 
        line-height: 1.6; 
    }

    /* NEW SEO CONTENT BLOCK */
    .seo-mission-block {
        max-width: 900px;
        margin: 0 auto 120px;
        padding: 40px 20px;
        text-align: center;
    }
    .seo-mission-block h3 {
        font-size: 1.8rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: var(--text-main);
    }
    .seo-mission-block p {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--text-muted);
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .founder-card-inline { 
            flex-direction: column; 
            text-align: center; 
            padding: 40px 20px; 
            gap: 30px; 
        }
        .founder-info-inline { 
            text-align: center; 
        }
    }
</style>

<header class="hero">
    <div class="hero-label" data-aos="fade-down">Creative Agency</div>
    
    <h1 class="sr-only">EditoHub: Creative Agency Video Production & YouTube Automation Experts</h1>
    
    <div class="hero-title" aria-hidden="true" data-aos="zoom-out" data-aos-delay="100">
        <span class="sweep-text">We Engineer</span>
        <span class="auto-type" data-words="Retention.|Viral Hits.|Thumbnails.|The Algorithm." style="color: var(--primary);"></span>
        <span class="type-cursor">|</span>
    </div>
    
    <p class="hero-desc" data-aos="fade-up" data-aos-delay="200">
        Thumbnails that command clicks. Edits that hold attention. We build the digital assets that dominate the algorithm.
    </p>
    
    <div class="btn-wrap" data-aos="fade-up" data-aos-delay="300">
        <button class="btn btn-main" onclick="openModal('discordModal')">Commence Project</button>
        <a href="portfolio" class="btn btn-glass transition-link">Explore the Forge</a>
    </div>

    <div class="scroll-indicator" data-aos="fade-in" data-aos-delay="500">
        <div class="mouse-outline">
            <div class="mouse-wheel"></div>
        </div>
    </div>
</header>

<section id="services" class="services-section">
    <h2 class="sec-title sweep-text" data-aos="fade-up">YouTube & TikTok Editing Arsenal</h2>
    
    <div class="grid-3">
        <div class="tilt-card js-tilt" data-aos="fade-up">
            <div class="tilt-inner">
                <div class="service-icon"><i class="fas fa-layer-group"></i></div>
                <h3>YouTube Video Graphics</h3>
                <p>3D rendering, color theory, and composition designed specifically to break the algorithm and skyrocket your CTR.</p>
            </div>
        </div>
        
        <div class="tilt-card js-tilt" data-aos="fade-up" data-aos-delay="100">
            <div class="tilt-inner">
                <div class="service-icon"><i class="fas fa-film"></i></div>
                <h3>Good Video Editing For YouTube</h3>
                <p>High-paced pacing, motion graphics, and sound design formulated to keep viewers hooked from the hook to the outro.</p>
            </div>
        </div>
        
        <div class="tilt-card js-tilt" data-aos="fade-up" data-aos-delay="200">
            <div class="tilt-inner">
                <div class="service-icon"><i class="fas fa-mobile-alt"></i></div>
                <h3>TikTok Video Edits</h3>
                <p>Vertical content strictly optimized for TikTok, Shorts, and Reels to capture pure attention in the first 3 seconds.</p>
            </div>
        </div>
    </div>
</section>

<section class="featured-section">
    <h2 class="sec-title sweep-text" data-aos="fade-up">Recent Roblox & Gaming Thumbnails</h2>
    
    <div class="preview-grid">
        <div class="preview-card" data-aos="fade-up" onclick="window.location.href='portfolio'">
            <img src="uploads/roblox-thumbnail-3.jpg" class="preview-img" alt="Roblox Thumbnail Design" loading="lazy">
            <div class="preview-overlay">
                <span>Roblox Entity</span>
                <small>3D Thumbnail</small>
            </div>
        </div>
        
        <div class="preview-card" data-aos="fade-up" data-aos-delay="100" onclick="window.location.href='portfolio'">
            <img src="uploads/minecraft-thumbnail-1.jpg" class="preview-img" alt="Minecraft Thumbnail Creation" loading="lazy">
            <div class="preview-overlay">
                <span>Minecraft Hardcore</span>
                <small>Composition</small>
            </div>
        </div>
        
        <div class="preview-card" data-aos="fade-up" data-aos-delay="200" onclick="window.location.href='portfolio'">
            <img src="uploads/free-fire-thumbnails--1-1773157881.webp" class="preview-img" alt="Free Fire Thumbnail Graphics" loading="lazy">
            <div class="preview-overlay">
                <span>Free Fire Elite</span>
                <small>VFX Integration</small>
            </div>
        </div>
    </div>
    
    <a href="portfolio" class="btn btn-glass transition-link" style="margin-top: 50px;" data-aos="fade-up">View Full Archive</a>
</section>

<section class="founder-section">
    <h2 class="sec-title sweep-text" data-aos="fade-up" style="margin-bottom: 50px;">The Creative Engineer Behind It</h2>
    
    <div class="founder-card-inline" data-aos="fade-up">
        <img src="https://i.ibb.co/SX5sLkzX/IMG-20250911-222046-075.webp" alt="Rehan - Video Editing Agency Founder" class="founder-img-inline" loading="lazy">
        <div class="founder-info-inline">
            <h3>Rehan <span>(Sigma)</span></h3>
            <p class="title">Founder & Director</p>
            <p class="desc">Specializing in scalable creative growth and professional post-production. Let's discuss your brand's next major shift.</p>
            <button class="btn btn-glass" onclick="openModal('discordModal')">
                <i class="fab fa-discord" style="font-size: 1.2rem; color: #5865f2;"></i> CONTACT
            </button>
        </div>
    </div>
</section>

<section class="seo-mission-block" data-aos="fade-up">
    <h3>Elite Agency Video Production</h3>
    <p>
        EditoHub is a premier <strong>video editing agency</strong> dedicated to scaling YouTube channels and TikTok creators globally. Our expert artists specialize in high-retention <strong>video editing</strong>, viral <strong>thumbnail design</strong>, and advanced <strong>YouTube automation</strong>. We understand that a great YouTube video requires more than just simple cuts; it demands dynamic motion graphics, engaging pacing, and click-driven thumbnail creation.
    </p>
    <p>
        Whether you need a high-CTR Roblox thumbnail, dynamic TikTok video edits, or full-scale agency video production, our creative engineers ensure your content dominates the YouTube algorithm. Let us handle the intense video editing process so you can focus entirely on recording the best video possible.
    </p>
</section>

<script>
    if (window.matchMedia("(pointer: fine)").matches) {
        const tiltCards = document.querySelectorAll('.js-tilt');
        tiltCards.forEach(card => {
            let reqId;
            
            card.addEventListener('mousemove', (e) => {
                if(reqId) cancelAnimationFrame(reqId);
                reqId = requestAnimationFrame(() => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left; 
                    const y = e.clientY - rect.top;  
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateX = ((y - centerY) / centerY) * -10;
                    const rotateY = ((x - centerX) / centerX) * 10;
                    
                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
                    card.style.borderColor = 'var(--primary)';
                });
            });
            
            card.addEventListener('mouseleave', () => {
                if(reqId) cancelAnimationFrame(reqId);
                card.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg)`;
                card.style.borderColor = 'var(--border)';
            });
        });
    }
</script>

<?php include 'footer.php'; ?>
