<?php 
$page_title = "Rates & Retainers | EditoHub";
$page_desc = "Transparent pricing. A flat 10% agency fee. High-end talent at fair market rates.";
include 'header.php'; 
?>

<style>
    .page-header { padding: 180px 20px 80px; text-align: center; max-width: 900px; margin: 0 auto; position: relative; z-index: 10; }
    .page-header h1 { font-size: clamp(3rem, 8vw, 5.5rem); font-weight: 900; line-height: 1.1; margin-bottom: 20px; letter-spacing: -2px; min-height: 1.5em; }

    .golden-rule { max-width: 1000px; margin: 0 auto 80px; border: 1px solid var(--primary); border-radius: 40px; padding: 60px 40px; display: flex; align-items: center; gap: 40px; position: relative; z-index: 10; }
    .rule-number { font-size: 6rem; font-weight: 900; color: var(--primary); line-height: 1; text-shadow: 0 0 30px rgba(0,210,255,0.4); }
    .rule-text h2 { font-size: 2rem; font-weight: 800; margin-bottom: 10px; }
    .rule-text p { font-size: 1.05rem; line-height: 1.6; }
    @media (max-width: 768px) { .golden-rule { flex-direction: column; text-align: center; gap: 20px; padding: 40px 25px; } }

    .pricing-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto 100px; padding: 0 20px; position: relative; z-index: 10; }
    .price-card { padding: 50px 40px; transition: 0.4s var(--easing); display: flex; flex-direction: column; }
    .price-card:hover { transform: translateY(-10px); border-color: var(--primary) !important; }
    
    .price-card.premium { border-color: var(--purple) !important; position: relative; }
    .price-card.premium::before { content: 'RECOMMENDED'; position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--purple); color: #fff; font-size: 0.7rem; font-weight: 900; padding: 5px 15px; border-radius: 50px; letter-spacing: 2px; text-transform: uppercase; }
    
    .p-title { font-size: 1.5rem; font-weight: 800; margin-bottom: 15px; }
    .p-desc { font-size: 0.95rem; margin-bottom: 30px; line-height: 1.6; flex-grow: 1; }
    .p-price { font-size: 2.5rem; font-weight: 900; margin-bottom: 30px; border-bottom: 1px solid var(--border); padding-bottom: 30px; }
    .p-price span { font-size: 1rem; font-weight: 500; }
    
    .p-features { list-style: none; margin-bottom: 40px; }
    .p-features li { margin-bottom: 15px; font-size: 0.95rem; display: flex; align-items: center; gap: 10px; }
    .p-features li i { color: var(--primary); }
    .premium .p-features li i { color: var(--purple); }
</style>

<div class="page-header" data-aos="fade-down">
    <h1 class="sweep-text">The <span class="auto-type" data-words="Investment.|Rates.|Retainers." style="color: var(--primary);"></span><span class="type-cursor">|</span></h1>
    <p>We eliminated the corporate bloat. You pay for pure, highly-skilled labor, not expensive office spaces.</p>
</div>

<div class="golden-rule process-card" data-aos="fade-up">
    <div class="rule-number">10%</div>
    <div class="rule-text">
        <h2>The Flat Agency Fee</h2>
        <p>Traditional agencies take 30% to 50% of your budget, leaving the editor underpaid and unmotivated. We charge a flat 10% fee to cover management and infrastructure. <strong>90% of your money goes directly to the artist building your video.</strong> Better pay means better edits.</p>
    </div>
</div>

<div class="pricing-grid">
    <div class="price-card" data-aos="fade-up" data-aos-delay="100">
        <h3 class="p-title">One-Off Forges</h3>
        <p class="p-desc">Perfect for testing our quality or handling overflow work when your in-house editor is backed up.</p>
        <div class="p-price">Custom <span>/ per video</span></div>
        <ul class="p-features">
            <li><i class="fas fa-check"></i> Assigned to a specialized artist</li>
            <li><i class="fas fa-check"></i> Standard 3-round revision system</li>
            <li><i class="fas fa-check"></i> 50% upfront, 50% on completion</li>
            <li><i class="fas fa-check"></i> Quality Assurance by Hub Managers</li>
        </ul>
        <button class="btn btn-glass" style="width: 100%;" onclick="openModal('discordModal')">Get a Quote</button>
    </div>

    <div class="price-card premium" data-aos="fade-up" data-aos-delay="200">
        <h3 class="p-title">Monthly Retainer</h3>
        <p class="p-desc">Secure a dedicated editor for your channel. Priority delivery and consistent quality across all your uploads.</p>
        <div class="p-price">Discounted <span>/ monthly</span></div>
        <ul class="p-features">
            <li><i class="fas fa-check"></i> Priority queue placement</li>
            <li><i class="fas fa-check"></i> Dedicated editor who learns your style</li>
            <li><i class="fas fa-check"></i> Bulk-pricing discount applied</li>
            <li><i class="fas fa-check"></i> Cancel or pause at any time</li>
        </ul>
        <button class="btn btn-main" style="width: 100%;" onclick="openModal('discordModal')">Negotiate Retainer</button>
    </div>
</div>

<?php include 'footer.php'; ?>
