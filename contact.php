<?php 
$page_title = "Contact & Support | EditoHub";
$page_desc = "Connect with EditoHub. Open a ticket in our Discord server to get a quote, ask questions, or start a project.";
include 'header.php'; 
?>

<style>
    .contact-container { padding: 180px 20px 100px; max-width: 1200px; margin: 0 auto; position: relative; z-index: 10; display: flex; flex-wrap: wrap; gap: 60px; align-items: center; }
    
    .c-text { flex: 1; min-width: 300px; }
    .c-text h1 { font-size: clamp(3rem, 7vw, 5rem); font-weight: 900; line-height: 1.1; margin-bottom: 20px; letter-spacing: -2px; }
    .c-text p { font-size: 1.15rem; line-height: 1.7; margin-bottom: 40px; max-width: 500px; }
    
    .contact-method { display: flex; align-items: center; gap: 20px; margin-bottom: 30px; }
    .c-icon { width: 60px; height: 60px; border-radius: 50%; background: rgba(0,210,255,0.05); border: 1px solid rgba(0,210,255,0.2); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--primary); flex-shrink: 0; }
    .contact-method h3 { font-size: 1.2rem; font-weight: 800; margin-bottom: 5px; }
    .contact-method p { font-size: 0.9rem; margin: 0; }

    .contact-socials { display: flex; gap: 15px; margin-top: 10px; }
    .contact-socials a { color: var(--text-muted); font-size: 1.2rem; transition: 0.3s; background: var(--surface); width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; border: 1px solid var(--border); }
    .contact-socials a:hover { color: var(--primary); border-color: var(--primary); transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0, 210, 255, 0.2); }

    .c-card { flex: 1; min-width: 350px; border: 1px solid rgba(88,101,242,0.3) !important; border-radius: 40px; padding: 60px 40px; text-align: center; position: relative; overflow: hidden; }
    .c-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: #5865f2; }
    
    .discord-massive { font-size: 5rem; color: #5865f2; margin-bottom: 20px; filter: drop-shadow(0 0 30px rgba(88,101,242,0.4)); animation: floatDiscord 4s infinite ease-in-out alternate; }
    @keyframes floatDiscord { 0% { transform: translateY(0); } 100% { transform: translateY(-15px); } }

    .c-card h2 { font-size: 2.2rem; font-weight: 900; margin-bottom: 15px; }
    .c-card p { font-size: 1.05rem; margin-bottom: 40px; line-height: 1.6; }
</style>

<div class="contact-container">
    
    <div class="c-text" data-aos="fade-right">
        <h1 class="sweep-text">Commence<br><span class="auto-type" data-words="Comms.|Contact.|Projects." style="color: var(--primary);"></span><span class="type-cursor">|</span></h1>
        <p>Ready to upgrade your visual assets? Our management team is online and ready to build a custom workflow for your channel.</p>
        
        <div class="contact-method">
            <div class="c-icon"><i class="fas fa-bolt"></i></div>
            <div>
                <h3>Fast Track</h3>
                <p>Join Discord, open a ticket, get a quote instantly.</p>
            </div>
        </div>
        
        <div class="contact-method">
            <div class="c-icon"><i class="fas fa-hashtag"></i></div>
            <div>
                <h3>Official Channels</h3>
                <p>Follow our work and agency updates globally.</p>
                <div class="contact-socials">
                    <a href="https://youtube.com/@edito-hub" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="https://x.com/EditoHub_in" target="_blank" title="X (Twitter)"><i class="fab fa-x-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="c-card" data-aos="fade-left" data-aos-delay="200">
        <i class="fab fa-discord discord-massive"></i>
        <h2>The Hub Server</h2>
        <p>This is where the magic happens. All project files, drafts, revisions, and communications are securely handled through our dedicated Discord server.</p>
        <a href="https://discord.gg/editohub-1402333030827425922" target="_blank" class="btn btn-main" style="width: 100%; background: #5865f2 !important; color: #fff !important; box-shadow: 0 10px 30px rgba(88,101,242,0.3);">Enter The Server</a>
    </div>

</div>

<?php include 'footer.php'; ?>
