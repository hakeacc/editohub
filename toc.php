<?php 
$page_title = "Terms of Service | EditoHub Agency";
include 'header.php'; 
?>

<style>
    /* Specific CSS for the Terms Page */
    .container { max-width: 900px; margin: 120px auto 60px; padding: 0 20px; }
    .glass-card { background: rgba(255, 255, 255, 0.02); padding: 60px 40px; border-radius: 45px; border: 1px solid var(--border); backdrop-filter: blur(40px); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5); }
    h1 { font-size: clamp(2rem, 8vw, 3rem); margin-bottom: 15px; text-align: center; background: linear-gradient(to right, #fff, var(--primary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .last-update { text-align: center; color: #444; font-weight: 700; font-size: 0.8rem; margin-bottom: 50px; text-transform: uppercase; }
    .toc-section { margin-bottom: 40px; }
    .toc-header { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
    .toc-header i { font-size: 1.5rem; color: var(--primary); filter: drop-shadow(0 0 10px var(--primary)); }
    .toc-header h2 { font-size: 1.5rem; font-weight: 800; }
    .toc-content p, .toc-content li { color: #94a3b8; font-size: 1rem; margin-bottom: 12px; list-style: none; }
    .toc-content li::before { content: "•"; color: var(--primary); margin-right: 10px; font-weight: bold; }
    
    /* Acceptance UI */
    .accept-box { display: flex; flex-direction: column; align-items: center; gap: 20px; background: rgba(0, 210, 255, 0.05); border: 1px solid var(--primary); padding: 30px; border-radius: 30px; margin-top: 50px; text-align: center; }
    @media (min-width: 768px) { .accept-box { flex-direction: row; justify-content: space-between; text-align: left; padding: 30px 40px; } }
    @media (max-width: 768px) { .glass-card { padding: 40px 25px; } }
</style>

<div class="container">
    <div class="glass-card" data-aos="fade-up">
        <h1>Terms of Service</h1>
        <p class="last-update">Last Updated: February 1, 2026</p>

        <div class="toc-section"><div class="toc-header"><i class="fas fa-handshake"></i><h2>1. Acceptance of Terms</h2></div><div class="toc-content"><p>By accessing EditoHub or using our creative services, you legally agree to be bound by these terms. Our mission is to provide professional visuals under a clear and mutual understanding of these conditions.</p></div></div>
        <div class="toc-section"><div class="toc-header"><i class="fab fa-discord"></i><h2>2. Official Communication</h2></div><div class="toc-content"><p>All project discussions, brief submissions, and asset deliveries must be handled through our official Discord tickets. This ensures a transparent workflow and professional archiving of your project assets.</p></div></div>
        <div class="toc-section"><div class="toc-header"><i class="fas fa-wallet"></i><h2>3. Payment & Pricing</h2></div><div class="toc-content"><ul><li><strong>Fixed Quotes:</strong> Pricing is determined per project. Any major change in the initial brief will result in a price adjustment.</li><li><strong>Upfront Commitment:</strong> To secure a slot and start production, a 50% upfront payment is mandatory.</li><li><strong>Final Delivery:</strong> High-resolution, un-watermarked files are released only after 100% payment completion.</li></ul></div></div>
        <div class="toc-section"><div class="toc-header"><i class="fas fa-edit"></i><h2>4. Revision Protocol</h2></div><div class="toc-content"><p>We offer 3 rounds of minor revisions (text, colors, minor pacing tweaks). Requests that change the entire core concept after work has begun will be treated as a new project and charged accordingly.</p></div></div>
        <div class="toc-section"><div class="toc-header"><i class="fas fa-copyright"></i><h2>5. Rights & Usage</h2></div><div class="toc-content"><p>Clients receive full commercial rights upon final payment. EditoHub reserves the right to display the produced work in our portfolio/showreel unless an NDA (Non-Disclosure Agreement) is requested and paid for.</p></div></div>
        <div class="toc-section"><div class="toc-header"><i class="fas fa-shield-alt"></i><h2>6. Refund & Termination</h2></div><div class="toc-content"><p>Because creative work involves irreversible labor hours, refunds are not possible once production has started. EditoHub reserves the right to refuse or terminate service if the client is disrespectful or requests unethical content.</p></div></div>
        <div class="toc-section"><div class="toc-header"><i class="fas fa-gavel"></i><h2>7. Legal Compliance</h2></div><div class="toc-content"><p>The client is responsible for all raw footage/assets provided. EditoHub is not liable for copyright strikes or legal actions resulting from assets supplied by the client.</p></div></div>

        <div class="accept-box" data-aos="fade-up" data-aos-delay="200">
            <div>
                <h3 style="font-size: 1.3rem; color: #fff;">Acknowledge & Accept</h3>
                <p style="color: #94a3b8; font-size: 0.95rem; margin-top: 5px; max-width: 400px;">By proceeding, you agree to EditoHub's terms of service and workflow policies.</p>
            </div>
            <button id="acceptBtn" class="btn btn-main" onclick="acceptTerms()" style="max-width:250px; width:100%;">
                <i class="fas fa-check-circle" id="checkIcon" style="display:none;"></i> 
                <span id="btnText">Accept All</span>
            </button>
        </div>
    </div>
</div>

<script>
    // Smart Acceptance Logic
    window.addEventListener('load', () => {
        if(localStorage.getItem('editoHubTerms') === 'accepted') {
            const btn = document.getElementById('acceptBtn');
            document.getElementById('checkIcon').style.display = 'inline-block';
            document.getElementById('checkIcon').className = 'fas fa-check-double';
            document.getElementById('btnText').innerText = 'Already Accepted';
            
            btn.style.background = 'rgba(255, 255, 255, 0.05)';
            btn.style.boxShadow = 'none';
            btn.style.color = '#666';
            btn.style.border = '1px solid rgba(255,255,255,0.1)';
            btn.disabled = true;
        }
    });

    function acceptTerms() {
        const btn = document.getElementById('acceptBtn');
        const icon = document.getElementById('checkIcon');
        const text = document.getElementById('btnText');

        icon.style.display = 'inline-block';
        icon.className = 'fas fa-check';
        text.innerText = 'Accepted!';
        btn.style.background = 'linear-gradient(135deg, #00b09b, #96c93d)';
        btn.style.boxShadow = '0 0 40px rgba(0, 255, 100, 0.4)';
        btn.disabled = true;

        localStorage.setItem('editoHubTerms', 'accepted');

        setTimeout(() => {
            document.body.classList.add('fade-out');
            setTimeout(() => { window.location.href = 'index.php'; }, 400);
        }, 1000); 
    }
</script>

<?php include 'footer.php'; ?>
