<?php 
include 'config.php'; 

// --- THE ORIGINAL AJAX ENGINE (RESTORED) ---
if(isset($_GET['get_subs'])) {
    $stmt = $conn->prepare("SELECT id, name, thumb_url FROM subcategories WHERE category_id = ?");
    $stmt->bind_param("i", $_GET['get_subs']);
    $stmt->execute();
    $res = $stmt->get_result();
    $data = []; while($row = $res->fetch_assoc()) { $data[] = $row; }
    header('Content-Type: application/json'); echo json_encode($data); exit;
}

if(isset($_GET['get_works'])) {
    $stmt = $conn->prepare("SELECT * FROM works WHERE sub_id = ? ORDER BY id DESC");
    $stmt->bind_param("i", $_GET['get_works']);
    $stmt->execute();
    $res = $stmt->get_result();
    $data = []; while($row = $res->fetch_assoc()) { $data[] = $row; }
    header('Content-Type: application/json'); echo json_encode($data); exit;
}

$page_title = "Portfolio | EditoHub Elite";
include 'header.php'; 
?>

<style>
    .container { max-width: 1100px; margin: 120px auto 100px; padding: 0 15px; position: relative; z-index: 10; }
    .header-box { text-align: center; margin-bottom: 40px; }
    .header-box h1 { font-size: clamp(2.5rem, 8vw, 4rem); font-weight: 900; line-height: 1.1; margin-bottom: 10px; letter-spacing: -1px; }
    
    .controls { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
    .back-btn { display: none; color: var(--text-main); font-weight: 800; cursor: pointer; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; background: var(--surface); padding: 10px 22px; border-radius: 50px; border: 1px solid var(--border); transition: 0.3s; box-shadow: 0 5px 15px var(--shadow); }
    .back-btn:hover { background: var(--primary); color: var(--bg); transform: scale(0.95); border-color: var(--primary); }

    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
    @media (max-width: 600px) { .grid { grid-template-columns: repeat(2, 1fr); gap: 12px; } }

    /* Category & Subcategory Cards (Theme Adjusted) */
    .item-card { background: var(--surface); border: 1px solid var(--border); border-radius: 30px; overflow: hidden; aspect-ratio: 1/1; position: relative; cursor: pointer; transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); animation: cardIn 0.5s ease-out backwards; box-shadow: 0 10px 30px var(--shadow); }
    @keyframes cardIn { from { opacity: 0; transform: scale(0.9) translateY(20px); } to { opacity: 1; transform: scale(1) translateY(0); } }
    .item-card:hover { transform: translateY(-10px) scale(1.03); border-color: var(--primary); box-shadow: 0 15px 40px rgba(0, 210, 255, 0.2); }
    .item-card img { width: 100%; height: 100%; object-fit: cover; opacity: 0.7; transition: 0.6s; pointer-events: none; }
    .item-card:hover img { opacity: 1; transform: scale(1.1); }
    .item-info { position: absolute; bottom: 0; left: 0; width: 100%; padding: 20px 15px; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); text-align: center; }
    .item-info h3 { font-size: 0.9rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: #fff !important; margin: 0; }

    /* The actual Work Items (Theme Adjusted) */
    .work-card { aspect-ratio: auto !important; cursor: pointer; transition: 0.3s; }
    .work-card:active { transform: scale(0.95); }
    .wrapper { width: 100%; border-radius: 25px; overflow: hidden; position: relative; border: 1px solid var(--border); transition: 0.4s; background: var(--bg); box-shadow: 0 10px 25px var(--shadow); }
    .work-card:hover .wrapper { border-color: var(--primary); transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0, 210, 255, 0.2); }
    
    .ratio-16-9 .wrapper { aspect-ratio: 16/9; }
    .ratio-9-16 .wrapper { aspect-ratio: 9/16; }
    .ratio-1-1 .wrapper { aspect-ratio: 1/1; }

    .play-icon { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.2); transition: 0.3s; pointer-events: none; z-index: 10; }
    .work-card:hover .play-icon { background: rgba(0,0,0,0.4); }
    .play-icon i { font-size: 3rem; color: var(--primary); filter: drop-shadow(0 0 15px var(--primary)); opacity: 0.9; transition: 0.3s; }
    .work-card:hover .play-icon i { opacity: 1; transform: scale(1.1); }

    /* Modal (Always Dark for Media Viewing) */
    #previewModal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.95); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); z-index: 99999; align-items: center; justify-content: center; padding: 20px; }
    .modal-content-wrapper { position: relative; width: 100%; margin: 0 auto; display: flex; flex-direction: column; align-items: center; animation: popIn 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
    @keyframes popIn { 0% { opacity: 0; transform: scale(0.95) translateY(20px); } 100% { opacity: 1; transform: scale(1) translateY(0); } }
    
    .close-modal { position: absolute; top: -55px; right: 0; background: var(--primary); color: var(--bg); padding: 10px 24px; border-radius: 50px; font-weight: 900; font-size: 0.8rem; cursor: pointer; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s; z-index: 100; box-shadow: 0 5px 15px rgba(0,210,255,0.3); border: none; }
    .close-modal:hover { transform: scale(1.05); background: #fff; color: #000; }
    
    #modalContent { width: 100%; display: flex; justify-content: center; }
    .loader { display: none; text-align: center; color: var(--primary); font-size: 2.5rem; padding: 60px; animation: pulse 1s infinite alternate; }
    @keyframes pulse { from { opacity: 0.5; } to { opacity: 1; } }
</style>

<div class="container">
    <div class="controls">
        <div id="backBtn" class="back-btn" onclick="goBack()"><i class="fas fa-chevron-left"></i> Back</div>
    </div>
    
    <div class="header-box" data-aos="fade-down">
        <h1 id="pageTitle" class="sweep-text">Our <span class="auto-type" data-words="Archive.|Vault.|Portfolio." style="color: var(--primary);"></span><span class="type-cursor">|</span></h1>
    </div>
    
    <div id="loader" class="loader"><i class="fas fa-circle-notch fa-spin"></i></div>

    <div id="catGrid" class="grid">
        <?php $cats = $conn->query("SELECT * FROM categories"); while($c = $cats->fetch_assoc()): ?>
            <div class="item-card" data-aos="fade-up" onclick="loadSubs(<?php echo $c['id']; ?>, '<?php echo htmlspecialchars($c['name'], ENT_QUOTES); ?>')">
                <img src="<?php echo htmlspecialchars($c['thumb_url'], ENT_QUOTES); ?>" alt="Category" loading="lazy" oncontextmenu="return false;" draggable="false">
                <div class="item-info"><h3><?php echo htmlspecialchars($c['name'], ENT_QUOTES); ?></h3></div>
            </div>
        <?php endwhile; ?>
    </div>

    <div id="subGrid" class="grid" style="display:none;"></div>
    <div id="workGrid" class="grid" style="display:none;"></div>
</div>

<div id="previewModal">
    <div class="modal-content-wrapper" id="modalWrapper">
        <button class="close-modal" onclick="closePreview()">× Close</button>
        <div id="modalContent"></div>
    </div>
</div>

<script>
    let currentStep = 'cat';

    // AJAX: Load Subcategories
    async function loadSubs(id, name) {
        document.getElementById('loader').style.display = 'block';
        const res = await fetch(`portfolio.php?get_subs=${id}`);
        const data = await res.json();
        
        let html = '';
        data.forEach(sub => {
            html += `<div class="item-card" onclick="loadWorks(${sub.id}, '${sub.name.replace(/'/g, "\\'")}')"><img src="${sub.thumb_url}" loading="lazy" oncontextmenu="return false;" draggable="false"><div class="item-info"><h3>${sub.name}</h3></div></div>`;
        });
        renderStep('catGrid', 'subGrid', html, name, 'sub');
    }

    // AJAX: Load Works
    async function loadWorks(id, name) {
        document.getElementById('loader').style.display = 'block';
        const res = await fetch(`portfolio.php?get_works=${id}`);
        const data = await res.json();
        
        let html = '';
        data.forEach(w => {
            const ratioClass = 'ratio-' + w.ratio.replace(':', '-');
            let thumb = w.thumbnail_url;
            let mediaHtml = '';

            // First Frame Extraction or Fallback Thumbnail
            if (w.project_type === 'video' && (!thumb || thumb.includes('placeholder') || thumb.trim() === '')) {
                mediaHtml = `<video src="${w.video_url}#t=0.001" preload="metadata" muted playsinline style="width:100%; height:100%; object-fit:cover; pointer-events:none;" oncontextmenu="return false;" draggable="false"></video>`;
            } else {
                if(!thumb) thumb = 'https://via.placeholder.com/600x400/030d21/00d2ff?text=EditoHub+Visual';
                mediaHtml = `<img src="${thumb}" loading="lazy" style="width:100%; height:100%; object-fit:cover;" oncontextmenu="return false;" draggable="false">`;
            }

            html += `
            <div class="work-card ${ratioClass}" onclick="openProject('${w.video_url}', '${thumb}', '${w.project_type}', '${w.ratio}')">
                <div class="wrapper">
                    ${mediaHtml}
                    <div class="play-icon"><i class="fas ${w.project_type == 'video' ? 'fa-play-circle' : 'fa-expand-alt'}"></i></div>
                </div>
                <div style="padding:15px 5px;"><h3 style="font-size:0.85rem; font-weight:800; color: var(--text-main); margin:0;">${w.title}</h3></div>
            </div>`;
        });
        renderStep('subGrid', 'workGrid', html, name, 'work');
    }

    // UI State Manager
    function renderStep(hide, show, html, title, step) {
        document.getElementById(hide).style.display = 'none';
        const showEl = document.getElementById(show);
        showEl.innerHTML = html || '<p style="grid-column:1/-1; text-align:center; color: var(--text-muted); font-weight: bold;">Coming Soon...</p>';
        showEl.style.display = 'grid';
        // Apply sweep-text effect to dynamic titles
        document.getElementById('pageTitle').innerHTML = `<span class="sweep-text">${title}</span>`;
        document.getElementById('backBtn').style.display = 'block';
        document.getElementById('loader').style.display = 'none';
        currentStep = step;
        window.scrollTo(0,0);
    }

    // Modal Player Engine
    function openProject(url, thumb, type, ratio) {
        const container = document.getElementById('modalContent');
        const wrapper = document.getElementById('modalWrapper');
        
        if(ratio === '9:16') wrapper.style.maxWidth = '400px';
        else if(ratio === '1:1') wrapper.style.maxWidth = '600px';
        else wrapper.style.maxWidth = '1000px';

        if(type === 'image') {
            container.innerHTML = `<img src="${thumb}" oncontextmenu="return false;" draggable="false" style="width: 100%; height: auto; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 0 40px rgba(0, 210, 255, 0.2); display: block;">`;
        } else {
            if(url.includes('youtube.com') || url.includes('youtu.be')) {
                let vidId = url.split('v=')[1] || url.split('/').pop();
                const pb = ratio === '9:16' ? '177.77%' : '56.25%';
                container.innerHTML = `<div style="position: relative; padding-bottom: ${pb}; height: 0; width: 100%;"><iframe src="https://www.youtube.com/embed/${vidId}?autoplay=1&rel=0" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 0 40px rgba(0, 210, 255, 0.2);" allowfullscreen allow="autoplay"></iframe></div>`;
            } else {
                // Bulletproof Native Video Tag
                container.innerHTML = `
                    <video id="hqVideoPlayer" controls playsinline preload="metadata" style="width: 100%; max-height: 85vh; background: #000; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 0 40px rgba(0, 210, 255, 0.2); display: block; outline: none;">
                        <source src="${url}" type="video/mp4">
                        Your browser does not support this video format.
                    </video>
                `;
            }
        }
        document.getElementById('previewModal').style.display = 'flex';
    }

    // Modal Destruction Engine (Fixes background audio bug)
    function closePreview() { 
        document.getElementById('previewModal').style.display = 'none'; 
        const container = document.getElementById('modalContent');
        const vid = document.getElementById('hqVideoPlayer');
        if(vid) {
            vid.pause();
            vid.removeAttribute('src'); 
            vid.load();
        }
        container.innerHTML = ''; 
    }
    
    // Back Navigation Logic
    function goBack() {
        if(currentStep === 'sub') { 
            document.getElementById('subGrid').style.display = 'none'; 
            document.getElementById('catGrid').style.display = 'grid'; 
            document.getElementById('pageTitle').innerHTML = '<span class="sweep-text">Our Portfolio</span>'; 
            document.getElementById('backBtn').style.display = 'none'; 
            currentStep = 'cat'; 
        } 
        else if(currentStep === 'work') { 
            document.getElementById('workGrid').style.display = 'none'; 
            document.getElementById('subGrid').style.display = 'grid'; 
            document.getElementById('pageTitle').innerHTML = '<span class="sweep-text">Select Category</span>';
            currentStep = 'sub'; 
        }
    }
</script>

<?php include 'footer.php'; ?>
