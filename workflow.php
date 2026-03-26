<?php 
$page_title = "The Workflow | EditoHub Pipeline";
$page_desc = "Experience our human-centric, elite editing pipeline.";
include 'header.php'; 
?>

<style>
    /* REMOVED HARDCODED BLACK BACKGROUNDS. USING THEME VARIABLES INSTEAD */
    .workflow-hero { padding: 160px 20px 60px; text-align: center; }
    .workflow-hero h1 { font-size: clamp(3.5rem, 10vw, 7rem); font-weight: 900; letter-spacing: -3px; line-height: 1.1; margin-bottom: 20px; min-height: 1.5em; }

    .pipeline-container { max-width: 1100px; margin: 0 auto 150px; padding: 0 20px; position: relative; }

    @media (min-width: 851px) {
        .central-spine { position: absolute; left: 50%; top: 0; bottom: 0; width: 1px; background: var(--border); transform: translateX(-50%); transition: background 0.4s; }
        .laser-progress { position: absolute; left: 50%; top: 0; width: 2px; height: 0; background: linear-gradient(to bottom, transparent, var(--primary), var(--purple)); box-shadow: 0 0 20px var(--primary); transform: translateX(-50%); z-index: 5; }
    }

    .step-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 150px; position: relative; width: 100%; }
    
    /* Using global process-card class for theme syncing */
    .step-content { width: 44%; padding: 50px; border-radius: 40px; transition: all 1s cubic-bezier(0.16, 1, 0.3, 1); opacity: 0; transform: translateY(50px) scale(0.9); }
    .step-row:nth-child(even) { flex-direction: row-reverse; }

    .step-row.is-active .step-content { opacity: 1; transform: translateY(0) scale(1); border-color: var(--primary) !important; box-shadow: 0 15px 40px rgba(0, 210, 255, 0.1) !important; }

    .step-node { position: absolute; left: 50%; transform: translateX(-50%) scale(0); width: 60px; height: 60px; background: var(--bg); border: 2px solid var(--border); border-radius: 50%; z-index: 10; display: flex; align-items: center; justify-content: center; color: var(--primary); transition: 0.8s cubic-bezier(0.34, 1.56, 0.64, 1), background 0.4s, border-color 0.4s; font-size: 1.2rem; }
    .step-row.is-active .step-node { transform: translateX(-50%) scale(1); border-color: var(--primary); box-shadow: 0 0 30px rgba(0,210,255,0.3); }

    .step-content span { display: inline-block; padding: 6px 15px; background: rgba(0, 210, 255, 0.1); border: 1px solid rgba(0, 210, 255, 0.2); color: var(--primary); border-radius: 100px; font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 25px; }
    .step-content h2 { font-size: 2.4rem; font-weight: 800; margin-bottom: 15px; letter-spacing: -1px; color: var(--text-main); transition: color 0.4s; }
    .step-content p { line-height: 1.8; font-size: 1.1rem; color: var(--text-muted); transition: color 0.4s; }

    @media (max-width: 850px) {
        .central-spine, .laser-progress, .step-node { display: none !important; }
        .step-row { margin-bottom: 40px; padding: 0; }
        .step-content { width: 100%; padding: 40px 30px; transform: translateY(30px); opacity: 0.3; text-align: left; }
        .step-row.is-active .step-content { opacity: 1; transform: translateY(0); }
        .step-content h2 { font-size: 1.8rem; }
    }
</style>

<div class="workflow-hero">
    <h1 class="sweep-text" data-aos="fade-down" style="display:inline-block;">The <span class="auto-type" data-words="Flow.|System.|Pipeline." style="color: var(--primary);"></span><span class="type-cursor">|</span></h1>
</div>

<div class="pipeline-container">
    <div class="central-spine"></div>
    <div class="laser-progress" id="laser"></div>

    <div class="step-row js-reveal">
        <div class="step-node"><i class="fas fa-comment-dots"></i></div>
        <div class="step-content process-card">
            <span>Phase 01</span>
            <h2>Creative Sync</h2>
            <p>Everything starts with a conversation in Discord. You share your footage and your goals; we define the pacing, references, and energy level before touching the timeline.</p>
        </div>
    </div>

    <div class="step-row js-reveal">
        <div class="step-node"><i class="fas fa-user-check"></i></div>
        <div class="step-content process-card">
            <span>Phase 02</span>
            <h2>Matchmaking</h2>
            <p>We pair your project with a specialist. A storyteller for vlogs, a high-octane editor for gaming, or a punchy artist for shorts. We don't do 'general' editing.</p>
        </div>
    </div>

    <div class="step-row js-reveal">
        <div class="step-node"><i class="fas fa-layer-group"></i></div>
        <div class="step-content process-card">
            <span>Phase 03</span>
            <h2>The Forge</h2>
            <p>The core construction phase. We engineer the retention hooks, layer custom soundscapes, and color-grade to perfection. We edit to keep eyes locked on screen.</p>
        </div>
    </div>

    <div class="step-row js-reveal">
        <div class="step-node"><i class="fas fa-cloud-upload-alt"></i></div>
        <div class="step-content process-card">
            <span>Phase 04</span>
            <h2>Final Delivery</h2>
            <p>Your high-bitrate master is rendered and delivered. We handle micro-adjustments until it's exactly what you envisioned. One link, full resolution, ready to post.</p>
        </div>
    </div>
</div>

<div style="text-align: center; margin-bottom: 150px;" data-aos="fade-up">
    <button class="btn btn-main" style="padding: 22px 60px;" onclick="openModal('discordModal')">Start Your Project</button>
</div>

<script>
    const steps = document.querySelectorAll('.js-reveal');
    const laser = document.getElementById('laser');
    const container = document.querySelector('.pipeline-container');

    function updateWorkflow() {
        const scrollY = window.scrollY;
        const vh = window.innerHeight;
        const trigger = vh * 0.8;

        if(window.innerWidth > 850 && container && laser) {
            const rect = container.getBoundingClientRect();
            const start = rect.top + scrollY;
            let progress = (scrollY + (vh/2)) - start;
            if (progress < 0) progress = 0;
            if (progress > rect.height) progress = rect.height;
            laser.style.height = progress + 'px';
        }

        steps.forEach(step => {
            const stepTop = step.getBoundingClientRect().top;
            if (stepTop < trigger) { 
                step.classList.add('is-active'); 
            } else { 
                step.classList.remove('is-active'); 
            }
        });
    }
    
    window.addEventListener('scroll', () => { requestAnimationFrame(updateWorkflow); });
    window.addEventListener('load', updateWorkflow);
    
    // Safety check incase the user opens the page already scrolled down
    setTimeout(updateWorkflow, 500); 
</script>

<?php include 'footer.php'; ?>
