<?php 
$page_title = "Partnerships & Collabs | EditoHub";
$page_desc = "Partner with EditoHub. We are always open to meaningful collaborations that align with our goals and community values.";
include 'header.php'; 
?>

<style>
    .collab-container { padding: 180px 20px 100px; max-width: 1200px; margin: 0 auto; position: relative; z-index: 10; }
    
    .page-header { text-align: center; margin-bottom: 80px; }
    .page-header h1 { font-size: clamp(3rem, 8vw, 5.5rem); font-weight: 900; line-height: 1.1; margin-bottom: 20px; letter-spacing: -2px; }
    .page-header p { font-size: 1.2rem; color: #8b949e; line-height: 1.6; max-width: 700px; margin: 0 auto; }

    /* Split Grid Layout */
    .collab-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: stretch; }
    @media (max-width: 900px) { .collab-grid { grid-template-columns: 1fr; } }

    /* Glass Cards */
    .info-card { padding: 50px 40px; border-radius: 40px; display: flex; flex-direction: column; justify-content: center; }
    .info-card:hover { border-color: var(--primary) !important; transform: translateY(-10px); }
    
    .card-icon { width: 70px; height: 70px; background: rgba(0,210,255,0.05); border: 1px solid rgba(0,210,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin-bottom: 25px; }
    
    .info-card h2 { font-size: 2rem; font-weight: 900; margin-bottom: 20px; letter-spacing: -1px; }
    .info-card p { font-size: 1.05rem; line-height: 1.7; margin-bottom: 20px; }
    .info-card p:last-of-type { margin-bottom: 0; }

    .tag-cloud { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 25px; }
    .tag { background: var(--bg); border: 1px solid var(--border); padding: 8px 16px; border-radius: 50px; font-size: 0.85rem; font-weight: 800; letter-spacing: 1px; color: var(--text-main); }

    .cta-wrapper { text-align: center; margin-top: 80px; }
</style>

<div class="collab-container">
    <div class="page-header" data-aos="fade-down">
        <h1 class="sweep-text">Strategic <span class="auto-type" data-words="Partnerships.|Collabs.|Alliances." style="color: var(--primary);"></span><span class="type-cursor">|</span></h1>
        <p>We truly value every opportunity to connect and grow together!</p>
    </div>

    <div class="collab-grid">
        <div class="info-card" data-aos="fade-right">
            <div class="card-icon"><i class="fas fa-handshake"></i></div>
            <h2>How We Collab</h2>
            <p>We’re always open to meaningful collaborations that align with our goals and community values. If you’re interested in working with us, feel free to reach out or create a ticket at our discord server with your proposal.</p>
            <p>Whether you’re aiming for sleek visuals or engaging media content, our team is ready to make it happen.</p>
        </div>

        <div style="display: flex; flex-direction: column; gap: 40px;">
            <div class="info-card" data-aos="fade-left" data-aos-delay="100">
                <div class="card-icon" style="color: var(--purple); border-color: var(--purple);"><i class="fas fa-layer-group"></i></div>
                <h2>What We Offer</h2>
                <div class="tag-cloud">
                    <span class="tag">GFX</span>
                    <span class="tag">SFX</span>
                    <span class="tag">VFX</span>
                    <span class="tag">Thumbnails</span>
                    <span class="tag">Video Editing</span>
                    <span class="tag">Content Writing</span>
                    <span class="tag">Post-Production</span>
                    <span class="tag">3D Design</span>
                </div>
            </div>

            <div class="info-card" data-aos="fade-left" data-aos-delay="200" style="padding: 40px;">
                <h2 style="font-size: 1.5rem;"><i class="fas fa-tags" style="color: var(--primary); margin-right: 10px;"></i> Curious About Pricing?</h2>
                <p>Since every project is unique, our pricing is flexible and based on the level of detail, creativity, and effort required. To get an estimate or discuss your project, simply open a ticket and our team will assist you shortly.</p>
            </div>
        </div>

    </div>

    <div class="cta-wrapper" data-aos="fade-up">
        <button class="btn btn-main" style="padding: 20px 50px; font-size: 1rem;" onclick="openModal('discordModal')">
            <i class="fab fa-discord" style="font-size: 1.2rem;"></i> Open a Proposal Ticket
        </button>
    </div>

</div>

<?php include 'footer.php'; ?>
