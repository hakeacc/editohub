<?php 
$page_title = "About Us & FAQ | EditoHub";
$page_desc = "We connect creators with top-tier artists. High-quality edits, fair pricing, and transparent workflows.";
include 'header.php'; 
?>

<style>
    .about-container { max-width: 1200px; margin: 180px auto 100px; padding: 0 20px; position: relative; z-index: 10; }
    
    .intro-header { text-align: center; margin-bottom: 100px; }
    .intro-header h1 { font-size: clamp(3rem, 8vw, 5.5rem); font-weight: 900; line-height: 1.1; margin-bottom: 25px; letter-spacing: -2px; min-height: 1.5em; }
    .intro-header p { font-size: 1.2rem; color: var(--text-muted); max-width: 700px; margin: 0 auto; line-height: 1.7; }

    .story-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-bottom: 140px; }
    .story-card { padding: 50px 40px; border-radius: 40px; text-align: left; display: flex; flex-direction: column; justify-content: center; }
    .story-icon { font-size: 2.5rem; color: var(--primary); margin-bottom: 25px; filter: drop-shadow(0 0 15px rgba(0,210,255,0.3)); }
    .story-card h3 { font-size: 2rem; margin-bottom: 20px; font-weight: 900; letter-spacing: -1px; }
    .story-card p { line-height: 1.8; font-size: 1.05rem; margin: 0; }
    @media (max-width: 900px) { .story-grid { grid-template-columns: 1fr; gap: 30px; } }

    .process-section { margin-bottom: 140px; }
    .process-section h2 { font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 900; text-align: center; margin-bottom: 60px; letter-spacing: -1.5px; }
    .process-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }
    .process-card { padding: 50px 40px; border-radius: 40px; text-align: center; }
    .step-num { width: 70px; height: 70px; font-weight: 900; font-size: 1.8rem; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin: 0 auto 30px; background: rgba(0, 210, 255, 0.05); border: 1px solid rgba(0, 210, 255, 0.2); color: var(--primary); box-shadow: inset 0 0 20px rgba(0,210,255,0.1); }
    .process-card h3 { font-size: 1.6rem; font-weight: 800; margin-bottom: 15px; letter-spacing: -0.5px; }
    .process-card p { font-size: 1.05rem; line-height: 1.7; margin: 0; }

    .faq-section { max-width: 900px; margin: 0 auto 60px; }
    .faq-section h2 { font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 900; text-align: center; margin-bottom: 60px; letter-spacing: -1.5px; }
    .faq-container { display: flex; flex-direction: column; gap: 20px; }
    .faq-item { border-radius: 24px; overflow: hidden; cursor: pointer; }
    
    .faq-question { padding: 30px 40px; display: flex; justify-content: space-between; align-items: center; font-weight: 800; font-size: 1.2rem; user-select: none; transition: color 0.3s; }
    .faq-item:hover .faq-question { color: var(--primary); }
    
    .faq-icon { font-size: 1.1rem; transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); color: var(--text-muted); }
    .faq-item.active .faq-icon { transform: rotate(180deg); color: var(--primary); }
    
    .faq-answer { max-height: 0; padding: 0 40px; font-size: 1.05rem; line-height: 1.8; transition: all 0.4s ease-in-out; opacity: 0; color: var(--text-muted); }
    .faq-item.active .faq-answer { max-height: 600px; padding-bottom: 35px; opacity: 1; }
    .faq-answer strong { color: var(--text-main); font-weight: 800; }

    @media (max-width: 768px) {
        .faq-question { padding: 25px; font-size: 1.05rem; }
        .faq-answer { padding: 0 25px; font-size: 0.95rem; }
        .faq-item.active .faq-answer { padding-bottom: 25px; }
    }
</style>

<div class="about-container">
    
    <div class="intro-header" data-aos="fade-down">
        <h1 style="margin: 0; padding: 0;">
            <span class="sr-only">EditoHub Agency: Elite Video Editing & YouTube Automation Experts</span>
            <span aria-hidden="true" style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; line-height: 1.1; margin-bottom: 20px; letter-spacing: -1px; display: block; color: var(--text-main);">We connect <span class="highlight" style="color: var(--primary);">creators</span> with top artists.</span>
        </h1>
        <p>No corporate fluff, no hidden fees. Just high-quality video editing and design work priced fairly for everyone involved.</p>
    </div>

    <div class="story-grid">
        <div class="story-card" data-aos="fade-right">
            <i class="fas fa-network-wired story-icon"></i>
            <h3>The EditoHub Protocol</h3>
            <p>EditoHub is an elite freelancing agency that acts as a secure bridge between high-level content creators and vetted artists. We find creators who demand the best quality at the fairest price, and we connect them with the specific specialists in our network who are ready to build it.</p>
        </div>
        <div class="story-card" data-aos="fade-left" data-aos-delay="100">
            <i class="fas fa-percentage story-icon" style="color: var(--purple); filter: drop-shadow(0 0 15px rgba(157,80,187,0.3));"></i>
            <h3>The 10% Golden Rule</h3>
            <p>Traditional agencies often drain 30% to 50% of your hard-earned budget. We operate differently. We take a strict, flat 10% commission to maintain the agency infrastructure, and <strong>90% of the funds go directly to the artist.</strong> This keeps prices optimal for creators and payouts highly motivating for editors.</p>
        </div>
    </div>

    <div class="process-section">
        <h2 class="sweep-text" data-aos="fade-up">The Workflow</h2>
        <div class="process-grid">
            <div class="process-card" data-aos="fade-up">
                <div class="step-num">01</div>
                <h3>The Brief</h3>
                <p>Join our Discord server, open a private ticket, and drop your raw footage, assets, and overall vision. We review it instantly.</p>
            </div>
            <div class="process-card" data-aos="fade-up" data-aos-delay="100">
                <div class="step-num">02</div>
                <h3>The Forge</h3>
                <p>We match you with the absolute best artist for your specific style. They get to work immediately on cutting, pacing, and VFX.</p>
            </div>
            <div class="process-card" data-aos="fade-up" data-aos-delay="200">
                <div class="step-num">03</div>
                <h3>The Polish</h3>
                <p>We deliver the first draft. You request any tweaks, we polish the final renders, and you upload an asset engineered to click.</p>
            </div>
        </div>
    </div>

    <div class="faq-section">
        <h2 class="sweep-text" data-aos="fade-up">Intelligence & FAQ</h2>
        
        <div class="faq-container">
            
            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">Who founded EditoHub? <i class="fas fa-chevron-down faq-icon"></i></div>
                <div class="faq-answer">EditoHub was founded by six core members: <strong>Rehan, RevenantX, Subh, Hake, Leo, & RAGE.</strong> We started this as a normal agency with a basic goal to do great work. Thanks to the creators who trusted us early on, it grew into an elite, global network.</div>
            </div>

            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">What is your typical turnaround time? <i class="fas fa-chevron-down faq-icon"></i></div>
                <div class="faq-answer">For high-end thumbnails, you can expect the first draft within <strong>24 to 48 hours</strong>. For full video edits, turnaround times generally vary from 3 to 7 days depending on the complexity, VFX, and length of the raw footage.</div>
            </div>

            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">Do you offer revisions if I want changes? <i class="fas fa-chevron-down faq-icon"></i></div>
                <div class="faq-answer">Yes. Our standard workflow includes <strong>3 rounds of revisions</strong>. However, completely changing the core concept after the edit is finished will lead to extra charges. We highly recommend providing a clear vision and all assets upfront.</div>
            </div>

            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">How do I pay for the services? <i class="fas fa-chevron-down faq-icon"></i></div>
                <div class="faq-answer">Our network spans across multiple countries. We accept secure payments via <strong>USD, Crypto, PayPal, UPI, Bkash, PKR, EasyPaisa,</strong> and more. Please note that standard transfer fees charged by payment gateways are not covered by the agency.</div>
            </div>

            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">Can I get a refund if I change my mind? <i class="fas fa-chevron-down faq-icon"></i></div>
                <div class="faq-answer">No. Because our artists invest significant time, effort, and creative energy into every project immediately, <strong>refunds are not possible</strong> once work has begun. We rely on our revision process to ensure the final product matches your vision perfectly.</div>
            </div>

            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">Do you offer bulk discounts or monthly retainers? <i class="fas fa-chevron-down faq-icon"></i></div>
                <div class="faq-answer">Absolutely. While we gladly do one-off projects, we highly recommend our <strong>Monthly Retainer</strong> packages for consistent creators. Opening a ticket on our Discord is the best way to negotiate a custom bulk quote for your channel.</div>
            </div>

            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">Do I get the source files (.psd, .prproj)? <i class="fas fa-chevron-down faq-icon"></i></div>
                <div class="faq-answer">Our standard delivery includes the final exported high-resolution files (PNG, JPG, MP4). If you require the editable source files to make your own tweaks later, they can be provided for an additional <strong>source-file buyout fee</strong> to protect our artists' proprietary assets.</div>
            </div>

            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">What happens if an artist flakes or cannot finish the job? <i class="fas fa-chevron-down faq-icon"></i></div>
                <div class="faq-answer">That is the primary advantage of hiring EditoHub instead of a solo freelancer. Because we manage a vast network of vetted artists, if an editor gets sick or has an emergency, our management team <strong>instantly assigns another top-tier artist</strong> to ensure your deadline is met seamlessly.</div>
            </div>

            <div class="faq-item" data-aos="fade-up">
                <div class="faq-question">How do I start a project with EditoHub? <i class="fas fa-chevron-down faq-icon"></i></div>
                <div class="faq-answer">It's simple. Click the <strong>Discord</strong> button anywhere on our website to join our server. Once inside, open a private ticket, tell us what you need, and we will immediately connect you with the right artist and give you a custom quote.</div>
            </div>

        </div>
    </div>
    
    <div style="text-align: center; margin-top: 80px;" data-aos="fade-up">
        <button class="btn btn-main" style="padding: 20px 50px; font-size: 1.1rem;" onclick="openModal('discordModal')">Open A Ticket</button>
    </div>

</div>

<script>
    // Smooth Accordion Logic
    document.querySelectorAll('.faq-item').forEach(item => {
        item.addEventListener('click', event => {
            const isActive = item.classList.contains('active');
            
            // Close all others
            document.querySelectorAll('.faq-item').forEach(faq => {
                faq.classList.remove('active');
            });

            // Open clicked
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
</script>

<?php include 'footer.php'; ?>
