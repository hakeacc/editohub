<?php 
$page_title = "Our Arsenal | EditoHub Services";
$page_desc = "From high-retention editing to viral GFX, explore the services we provide.";
include 'header.php'; 
?>

<style>
    .services-hero { padding: 180px 20px 80px; text-align: center; }
    .services-hero h1 { font-size: clamp(3.5rem, 10vw, 7rem); font-weight: 900; letter-spacing: -3px; line-height: 1.1; margin-bottom: 20px; }

    .services-grid { max-width: 1200px; margin: 0 auto 150px; display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px; padding: 0 20px; }
    
    /* Relies on the global .service-card override in header.php for Theme switching */
    .service-card { padding: 50px; border-radius: 40px; position: relative; overflow: hidden; }
    .service-card:hover { border-color: var(--primary) !important; transform: translateY(-10px); }

    .service-video-preview { width: 100%; aspect-ratio: 16/9; background: var(--bg); border-radius: 20px; margin-bottom: 30px; overflow: hidden; border: 1px solid var(--border); position: relative; }
    .service-video-preview img { width: 100%; height: 100%; object-fit: cover; opacity: 0.8; }

    .service-card i { font-size: 2.5rem; color: var(--primary); margin-bottom: 25px; display: block; }
    .service-card h2 { font-size: 2rem; font-weight: 800; margin-bottom: 15px; }
    .service-card p { line-height: 1.7; font-size: 1.05rem; }

    @media (max-width: 768px) { .services-grid { grid-template-columns: 1fr; } .service-card { padding: 35px; } }
</style>

<div class="services-hero" data-aos="fade-down">
    <h1 class="sr-only">Video Editing For TikTok, YouTube Video Graphics & Thumbnail Design</h1>
    <div class="sweep-text" aria-hidden="true" style="font-size: clamp(3.5rem, 10vw, 7rem); font-weight: 900; letter-spacing: -3px; line-height: 1.1; display:inline-block;">The <span class="auto-type" data-words="Arsenal.|Engine.|Assets." style="color: var(--primary);"></span><span class="type-cursor">|</span></div>
</div>

<div class="services-grid">
    <div class="service-card" data-aos="fade-up">
        <i class="fas fa-cut"></i>
        <h2>Retention Editing</h2>
        <p>We don't just cut clips. We engineer the pacing, sound design, and visual hooks to keep your audience locked until the very last second. Optimized for the YouTube algorithm.</p>
    </div>

    <div class="service-card" data-aos="fade-up" data-aos-delay="100">
        <div class="service-video-preview">
            <img src="uploads/motion-graphics-cat-1773158842.webp" alt="Motion Graphics Video Production" loading="lazy">
        </div>
        <h2>Custom Motion Graphics</h2>
        <p>Algorithm-optimized overlays, seamless transitions, and cinematic VFX engineered to maximize audience retention. We create the custom aesthetics that separate elite creators from the rest.</p>
    </div>

    <div class="service-card" data-aos="fade-up" data-aos-delay="200">
        <i class="fas fa-paint-brush"></i>
        <h2>Viral Thumbnail Design</h2>
        <p>Thumbnails that command a click. We blend psychological triggers with high-fidelity design to ensure your CTR dominates the browse features.</p>
    </div>

    <div class="service-card" data-aos="fade-up">
        <i class="fas fa-tasks"></i>
        <h2>YouTube Automation</h2>
        <p>Let us handle the logistics. From scheduling to community engagement and server development, we build the infrastructure so you can focus on creating.</p>
    </div>
</div>

<?php include 'footer.php'; ?>
