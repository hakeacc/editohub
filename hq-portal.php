<?php
session_start();
include 'config.php'; 

// SECURE CREDENTIALS (CHANGED FROM HAKE/BABYHAKE)
$admin_u = "RehanSigma";
$admin_p = "EditoHub2026!";

if (isset($_POST['login'])) {
    if ($_POST['username'] === $admin_u && $_POST['password'] === $admin_p) {
        $_SESSION['hake_auth'] = true;
    } else { $error = "Invalid Credentials, Human!"; }
}
// Update logout redirect to match the new file name
if (isset($_GET['logout'])) { session_destroy(); header("Location: hq-portal.php"); exit(); }

if (!isset($_SESSION['hake_auth'])):
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>HQ Vault | EditoHub</title><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><style>:root{--bg:#000205;--primary:#00d2ff;--glass:rgba(255,255,255,0.03);}*{box-sizing:border-box;outline:none;}body{font-family:sans-serif;background:var(--bg);color:#fff;height:100vh;display:flex;align-items:center;justify-content:center;margin:0;}.login-card{background:var(--glass);padding:45px;border-radius:40px;border:1px solid rgba(255,255,255,0.1);text-align:center;}input{width:100%;padding:16px;margin:12px 0;background:rgba(0,0,0,0.5);border:1px solid rgba(255,255,255,0.1);color:#fff;border-radius:15px;text-align:center;}input:focus{border-color:var(--primary);background:#000;}.btn{width:100%;padding:16px;border-radius:15px;border:none;background:linear-gradient(90deg,#00d2ff,#9d50bb);font-weight:800;cursor:pointer;color:#fff;text-transform:uppercase;}.error{color:#ff4d4d;font-weight:800;margin-bottom:15px;display:block;}</style></head><body><div class="login-card"><h2 style="margin-bottom: 25px; color:var(--primary);"><i class="fas fa-shield-alt"></i> HQ VAULT</h2><?php if(isset($error)) echo "<span class='error'>$error</span>"; ?><form method="POST"><input type="text" name="username" placeholder="Sigma ID" required autocomplete="off"><input type="password" name="password" placeholder="Passcode" required><button type="submit" name="login" class="btn">Authenticate</button></form></div></body></html>
<?php exit(); endif; ?>

<?php
if(!is_dir('uploads')) { mkdir('uploads', 0777, true); }

function makeSlug($string) {
    $string = strtolower(str_replace(' ', '-', trim($string)));
    return preg_replace('/[^a-z0-9\-]/', '', $string);
}

// --- BULLETPROOF UPLOAD ENGINE ---
if (isset($_POST['upload_work'])) {
    $base_title = trim($_POST['title']);
    $cid = $_POST['cat_id']; $sid = $_POST['sub_id'];
    $type = $_POST['p_type']; $ratio = $_POST['ratio'];

    $base_name = "Project";
    $cat_stmt = $conn->prepare("SELECT name FROM categories WHERE id=?");
    $cat_stmt->bind_param("i", $cid); $cat_stmt->execute();
    if($c_row = $cat_stmt->get_result()->fetch_assoc()) $base_name = $c_row['name'];

    if($sid > 0) {
        $sub_stmt = $conn->prepare("SELECT name FROM subcategories WHERE id=?");
        $sub_stmt->bind_param("i", $sid); $sub_stmt->execute();
        if($s_row = $sub_stmt->get_result()->fetch_assoc()) $base_name = $s_row['name'];
    }

    $count_stmt = $conn->prepare("SELECT COUNT(*) as cnt FROM works WHERE cat_id=? AND sub_id=?");
    $count_stmt->bind_param("ii", $cid, $sid); $count_stmt->execute();
    $current_count = 0;
    if($count_row = $count_stmt->get_result()->fetch_assoc()) $current_count = $count_row['cnt'];

    $v_files = (isset($_FILES['v_file']['name'][0]) && !empty($_FILES['v_file']['name'][0])) ? $_FILES['v_file'] : null;
    $th_files = (isset($_FILES['th_file']['name'][0]) && !empty($_FILES['th_file']['name'][0])) ? $_FILES['th_file'] : null;
    
    $v_count = $v_files ? min(count($v_files['name']), 8) : 0;
    $th_count = $th_files ? min(count($th_files['name']), 8) : 0;
    $iterations = max($v_count, $th_count);
    if ($iterations == 0) $iterations = 1; 

    $master_v = trim($_POST['v_url']);
    if ($v_count == 1 && $v_files['error'][0] === UPLOAD_ERR_OK) {
        $v_ext = strtolower(pathinfo($v_files['name'][0], PATHINFO_EXTENSION));
        $v_new_name = 'uploads/' . makeSlug($base_name) . '-vid-' . time() . '.' . $v_ext;
        if (move_uploaded_file($v_files['tmp_name'][0], $v_new_name)) $master_v = $v_new_name;
    }

    $master_th = trim($_POST['th_url']);
    if ($th_count == 1 && $th_files['error'][0] === UPLOAD_ERR_OK) {
        $th_ext = strtolower(pathinfo($th_files['name'][0], PATHINFO_EXTENSION));
        $th_new_name = 'uploads/' . makeSlug($base_name) . '-img-' . time() . '.' . $th_ext;
        if (move_uploaded_file($th_files['tmp_name'][0], $th_new_name)) $master_th = $th_new_name;
    }

    for ($i = 0; $i < $iterations; $i++) {
        $final_title = $base_title;
        if(empty($final_title)) $final_title = $base_name . " #" . ($current_count + $i + 1);
        else if ($iterations > 1) $final_title = $base_title . " #" . ($i + 1);

        $safe_slug = makeSlug($final_title);

        $final_v = $master_v;
        if ($v_count > 1 && $v_count > $i && $v_files['error'][$i] === UPLOAD_ERR_OK) {
            $v_ext = strtolower(pathinfo($v_files['name'][$i], PATHINFO_EXTENSION));
            $v_new_name = 'uploads/' . $safe_slug . '-vid-' . time() . '-' . $i . '.' . $v_ext;
            if (move_uploaded_file($v_files['tmp_name'][$i], $v_new_name)) $final_v = $v_new_name;
        }

        $final_th = $master_th;
        if ($th_count > 1 && $th_count > $i && $th_files['error'][$i] === UPLOAD_ERR_OK) {
            $th_ext = strtolower(pathinfo($th_files['name'][$i], PATHINFO_EXTENSION));
            $th_new_name = 'uploads/' . $safe_slug . '-img-' . time() . '-' . $i . '.' . $th_ext;
            if (move_uploaded_file($th_files['tmp_name'][$i], $th_new_name)) $final_th = $th_new_name;
        }

        if (empty($final_th) && $type === 'video') {
            $final_th = "https://via.placeholder.com/600x600/030d21/00d2ff?text=▶+VIDEO";
        }

        $stmt = $conn->prepare("INSERT INTO works (title, cat_id, sub_id, project_type, video_url, thumbnail_url, ratio) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siissss", $final_title, $cid, $sid, $type, $final_v, $final_th, $ratio);
        $stmt->execute();
    }
    
    header("Location: hq-portal.php?success=ProjectDeployed"); exit();
}

function handleSafeUpload($file_input_name, $raw_name) {
    if(isset($_FILES[$file_input_name]) && $_FILES[$file_input_name]['error'] === UPLOAD_ERR_OK) {
        $safe_slug = makeSlug($raw_name);
        $ext = strtolower(pathinfo($_FILES[$file_input_name]['name'], PATHINFO_EXTENSION));
        $new_name = 'uploads/' . $safe_slug . '-cat-' . time() . '.' . $ext;
        if(move_uploaded_file($_FILES[$file_input_name]['tmp_name'], $new_name)) return $new_name;
    } return null;
}

if (isset($_POST['add_cat'])) { 
    $uploaded_file = handleSafeUpload('c_file', $_POST['c_name']);
    $final_th = $uploaded_file ? $uploaded_file : $_POST['c_thumb'];
    $stmt = $conn->prepare("INSERT INTO categories (name, thumb_url) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['c_name'], $final_th);
    $stmt->execute(); header("Location: hq-portal.php?success=CategoryAdded"); exit();
}

if (isset($_POST['add_sub'])) { 
    $uploaded_file = handleSafeUpload('s_file', $_POST['s_name']);
    $final_th = $uploaded_file ? $uploaded_file : $_POST['s_thumb'];
    $stmt = $conn->prepare("INSERT INTO subcategories (category_id, name, thumb_url) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $_POST['cat_id'], $_POST['s_name'], $final_th);
    $stmt->execute(); header("Location: hq-portal.php?success=SubCategoryAdded"); exit();
}

if (isset($_GET['del_work'])) { $stmt=$conn->prepare("DELETE FROM works WHERE id=?"); $stmt->bind_param("i", $_GET['del_work']); $stmt->execute(); header("Location: hq-portal.php"); exit(); }
if (isset($_GET['del_cat'])) { $stmt=$conn->prepare("DELETE FROM categories WHERE id=?"); $stmt->bind_param("i", $_GET['del_cat']); $stmt->execute(); header("Location: hq-portal.php"); exit(); }
if (isset($_GET['del_sub'])) { $stmt=$conn->prepare("DELETE FROM subcategories WHERE id=?"); $stmt->bind_param("i", $_GET['del_sub']); $stmt->execute(); header("Location: hq-portal.php"); exit(); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HQ Vault | EditoHub</title>
    <link rel="icon" type="image/png" href="https://i.ibb.co/JR76yvRp/1758037248-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg: #00040d; --primary: #00d2ff; --purple: #9d50bb; --glass: rgba(255,255,255,0.03); --border: rgba(255,255,255,0.08); --neon: #00d2ff; }
        * { margin:0; padding:0; box-sizing:border-box; -webkit-tap-highlight-color: transparent !important; outline: none !important; }
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width:6px; } ::-webkit-scrollbar-track { background:var(--bg); } ::-webkit-scrollbar-thumb { background:linear-gradient(to bottom,var(--primary),var(--purple)); border-radius:10px; }
        ::selection { background: var(--primary); color: #000; text-shadow: none; }
        body { font-family: 'Segoe UI', sans-serif; background: var(--bg); color: #fff; overflow-x: hidden; }
        nav { background: rgba(0,5,15,0.85); padding: 15px 5%; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border); position: sticky; top:0; z-index: 100; backdrop-filter: blur(25px); }
        .logo-text { font-weight: 800; color: #fff; font-size: 1rem; letter-spacing: 1px; }
        .logout-link { color: #ff4d4d; text-decoration: none; font-weight: 800; font-size: 0.7rem; border: 1px solid #ff4d4d; padding: 6px 15px; border-radius: 50px; text-transform: uppercase; transition: 0.3s; }
        .logout-link:hover { background: rgba(255,77,77,0.1); box-shadow: 0 0 15px rgba(255,77,77,0.3); }
        .container { max-width: 1100px; margin: 25px auto; padding: 0 15px 100px; }
        .tabs { display: flex; background: var(--glass); padding: 5px; border-radius: 20px; border: 1px solid var(--border); margin-bottom: 30px; gap: 5px; }
        .tab-btn { flex: 1; padding: 14px; border: none; background: none; color: #ffffff; font-weight: 800; cursor: pointer; border-radius: 15px; transition: 0.3s; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; }
        .tab-btn.active { background: var(--primary); color: #000; box-shadow: 0 0 25px rgba(0, 210, 255, 0.4); }
        .section { display: none; animation: slideUp 0.4s ease-out; }
        .section.active { display: block; }
        @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .glass-card { background: var(--glass); padding: 30px; border-radius: 40px; border: 1px solid var(--border); margin-bottom: 25px; backdrop-filter: blur(30px); position: relative; transition: 0.4s; }
        .glass-card:hover { border-color: rgba(0, 210, 255, 0.3); box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        h2 { font-size: 0.85rem; margin-bottom: 20px; color: var(--primary); text-transform: uppercase; letter-spacing: 3px; font-weight: 900; }
        input, select { width: 100%; padding: 16px; margin: 10px 0; background: rgba(0,0,0,0.6); border: 1px solid var(--border); color: #fff; border-radius: 18px; font-size: 0.95rem; transition: 0.3s; }
        input[type="file"] { padding: 12px; background: rgba(0, 210, 255, 0.05); cursor: pointer; }
        input[type="file"]::-webkit-file-upload-button { background: var(--primary); border: none; padding: 8px 15px; border-radius: 10px; color: #000; font-weight: 800; cursor: pointer; margin-right: 15px; }
        input:focus, select:focus { border-color: var(--primary); box-shadow: 0 0 15px rgba(0, 210, 255, 0.2); background: #000; }
        .btn-act { width: 100%; padding: 18px; border: none; border-radius: 18px; font-weight: 900; cursor: pointer; background: var(--primary); color: #000; margin-top: 15px; transition: 0.4s; text-transform: uppercase; letter-spacing: 2px; }
        .btn-act:hover { box-shadow: 0 0 40px var(--neon); transform: translateY(-3px); }
        .list-item { display: flex; justify-content: space-between; align-items: center; padding: 18px; background: rgba(255,255,255,0.02); margin-top: 15px; border-radius: 25px; border: 1px solid var(--border); transition: 0.3s; }
        .list-item:hover { border-color: var(--primary); background: rgba(255,255,255,0.05); transform: translateX(5px); }
        .del-btn { color: #ff4d4d; font-size: 1.3rem; transition: 0.3s; padding: 10px; }
        .del-btn:hover { transform: scale(1.2) rotate(10deg); filter: drop-shadow(0 0 10px #ff4d4d); }
        .preview-img { width: 50px; height: 50px; border-radius: 12px; object-fit: cover; border: 2px solid var(--primary); background: #000; }
        label { font-size: 0.65rem; color: #555; font-weight: 900; margin-left: 10px; text-transform: uppercase; letter-spacing: 2px; }
        .upload-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; align-items: center; }
        @media (max-width: 600px) { .upload-row { grid-template-columns: 1fr; gap: 0; } .glass-card { padding: 20px; } .tabs { border-radius: 15px; } .tab-btn { padding: 12px; font-size: 0.65rem; } }
        .setting-check { display:flex; align-items:center; gap:10px; cursor:pointer; margin-top:15px; color:var(--primary); font-weight:800; font-size:0.8rem; text-transform:uppercase; letter-spacing:1px; }
        .setting-check input { width:auto; margin:0; cursor:pointer; accent-color: var(--primary); }

        /* Full Screen Loader */
        #uploadOverlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.95); z-index: 9999; flex-direction: column; align-items: center; justify-content: center; backdrop-filter: blur(10px); }
        .spinner { width: 60px; height: 60px; border: 5px solid rgba(0,210,255,0.2); border-top-color: var(--primary); border-radius: 50%; animation: spin 1s linear infinite; margin-bottom: 20px; box-shadow: 0 0 20px rgba(0,210,255,0.4); }
        @keyframes spin { 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>

    <div id="uploadOverlay">
        <div class="spinner"></div>
        <h2 style="color:var(--primary); letter-spacing: 3px;">DEPLOYING ASSETS...</h2>
        <p style="color:#888; margin-top:10px; font-size: 0.9rem;">Do not close or refresh this page.</p>
    </div>

    <nav>
        <span class="logo-text"><i class="fas fa-shield-alt" style="color:var(--primary);"></i> HQ VAULT</span>
        <a href="?logout=1" class="logout-link">TERMINATE HUB</a>
    </nav>
    <div class="container">
        <div class="tabs">
            <button class="tab-btn active" onclick="showTab('projects', this)">Portfolio</button>
            <button class="tab-btn" onclick="showTab('cats', this)">Categories</button>
            <button class="tab-btn" onclick="showTab('subs', this)">Sub-Cats</button>
        </div>

        <div id="projects" class="section active">
            <div class="glass-card">
                <h2><i class="fas fa-cloud-upload-alt"></i> Deploy New Project</h2>
                <form method="POST" enctype="multipart/form-data" onsubmit="showLoader()">
                    <input type="text" name="title" placeholder="Project Name (Leave blank for Auto-Naming)">
                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:15px;">
                        <div>
                            <label>Format</label>
                            <select name="p_type" id="typeSelect">
                                <option value="video">Full Video (VFX)</option>
                                <option value="image">Thumbnail Only</option>
                            </select>
                        </div>
                        <div>
                            <label>Dimension Ratio</label>
                            <select name="ratio" id="ratioSelect">
                                <option value="16:9">16:9 (Desktop)</option>
                                <option value="9:16">9:16 (Shorts/Reels)</option>
                                <option value="1:1">1:1 (Square)</option>
                            </select>
                        </div>
                    </div>
                    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:15px;">
                        <div>
                            <label>Main Category</label>
                            <select name="cat_id" id="catSelect" onchange="filterSubs()" required>
                                <option value="">Select Category</option>
                                <?php $cats=$conn->query("SELECT * FROM categories"); while($c=$cats->fetch_assoc()) echo "<option value='".$c['id']."'>".htmlspecialchars($c['name'], ENT_QUOTES)."</option>"; ?>
                            </select>
                        </div>
                        <div>
                            <label>Sub Category</label>
                            <select name="sub_id" id="subSelect"><option value="0">Optional Sub-cat</option></select>
                        </div>
                    </div>
                    
                    <div id="v_url_box">
                        <label id="vLabel" style="margin-top:10px; display:block;">Video Source (1 MP4 or Paste Link)</label>
                        <div class="upload-row">
                            <input type="file" name="v_file[]" id="vUploader" accept="video/mp4,video/webm,video/ogg">
                            <input type="text" name="v_url" placeholder="OR Paste Link">
                        </div>
                    </div>
                    
                    <div id="th_url_box">
                        <label id="thLabel" style="margin-top:10px; display:block;">Cover Image / Thumbnail (1 Image)</label>
                        <div class="upload-row">
                            <input type="file" name="th_file[]" id="thUploader" accept="image/*">
                            <input type="text" name="th_url" placeholder="OR Paste Image Link">
                        </div>
                    </div>

                    <button type="submit" name="upload_work" class="btn-act">Deploy to Portfolio</button>
                    <label class="setting-check"><input type="checkbox" id="saveSettingsCb"> Keep format & categories</label>
                </form>
            </div>

            <div class="glass-card">
                <h2>Deployed Works</h2>
                <?php $works=$conn->query("SELECT w.*, c.name as cn FROM works w JOIN categories c ON w.cat_id=c.id ORDER BY id DESC"); while($w=$works->fetch_assoc()): ?>
                    <div class="list-item">
                        <div style="display:flex; gap:15px; align-items:center;">
                            <img src="<?php echo htmlspecialchars($w['thumbnail_url']); ?>" style="width:55px; height:32px; border-radius:8px; object-fit:cover; border:1px solid var(--primary);" loading="lazy">
                            <div>
                                <p style="font-weight:900; font-size:0.85rem; letter-spacing:0.5px;"><?php echo htmlspecialchars($w['title']); ?></p>
                                <small style="color:var(--primary); font-size:0.6rem; font-weight:800;"><?php echo strtoupper(htmlspecialchars($w['cn'])); ?> • <?php echo htmlspecialchars($w['ratio']); ?></small>
                            </div>
                        </div>
                        <a href="?del_work=<?php echo $w['id']; ?>" class="del-btn"><i class="fas fa-trash-alt"></i></a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div id="cats" class="section">
            <div class="glass-card">
                <h2>Add Major Category</h2>
                <form method="POST" enctype="multipart/form-data" onsubmit="showLoader()">
                    <input type="text" name="c_name" placeholder="Category Name" required>
                    <div class="upload-row">
                        <input type="file" name="c_file" accept="image/*">
                        <input type="text" name="c_thumb" placeholder="OR Paste Image Link">
                    </div>
                    <button type="submit" name="add_cat" class="btn-act">Create Category</button>
                </form>
                
                <?php $clist=$conn->query("SELECT * FROM categories"); while($cl=$clist->fetch_assoc()): ?>
                    <div class="list-item">
                        <div style="display:flex; gap:15px; align-items:center;"><img src="<?php echo htmlspecialchars($cl['thumb_url']); ?>" class="preview-img" loading="lazy"><span style="font-weight:800; font-size:0.9rem;"><?php echo htmlspecialchars($cl['name']); ?></span></div>
                        <div style="display:flex; gap:5px;">
                            <a href="edit-cat.php?id=<?php echo $cl['id']; ?>" class="del-btn" style="color: var(--primary);" title="Edit Category"><i class="fas fa-edit"></i></a>
                            
                            <a href="?del_cat=<?php echo $cl['id']; ?>" class="del-btn" title="Delete"><i class="fas fa-times-circle"></i></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div id="subs" class="section">
            <div class="glass-card">
                <h2>Add Niche Sub-Category</h2>
                <form method="POST" enctype="multipart/form-data" onsubmit="showLoader()">
                    <select name="cat_id" required>
                        <option value="">Parent Category</option>
                        <?php $cats=$conn->query("SELECT * FROM categories"); while($c=$cats->fetch_assoc()) echo "<option value='".$c['id']."'>".htmlspecialchars($c['name'], ENT_QUOTES)."</option>"; ?>
                    </select>
                    <input type="text" name="s_name" placeholder="Sub-category Name" required>
                    <div class="upload-row">
                        <input type="file" name="s_file" accept="image/*">
                        <input type="text" name="s_thumb" placeholder="OR Paste Image Link">
                    </div>
                    <button type="submit" name="add_sub" class="btn-act">Create Sub-category</button>
                </form>
                <?php $slist=$conn->query("SELECT s.*, c.name as cn FROM subcategories s JOIN categories c ON s.category_id=c.id"); while($sl=$slist->fetch_assoc()): ?>
                    <div class="list-item">
                        <div style="display:flex; gap:15px; align-items:center;"><img src="<?php echo htmlspecialchars($sl['thumb_url']); ?>" class="preview-img" loading="lazy"><div><span style="font-weight:800; font-size:0.9rem;"><?php echo htmlspecialchars($sl['name']); ?></span><br><small style="opacity:0.4; font-size:0.65rem;">Parent: <?php echo htmlspecialchars($sl['cn']); ?></small></div></div>
                        <a href="?del_sub=<?php echo $sl['id']; ?>" class="del-btn"><i class="fas fa-minus-circle"></i></a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <script>
        const subData = [<?php $all_s=$conn->query("SELECT * FROM subcategories"); while($as=$all_s->fetch_assoc()) echo "{id:".$as['id'].", cid:".$as['category_id'].", name:'".htmlspecialchars($as['name'], ENT_QUOTES)."'},"; ?>];
        function filterSubs() { const cid = document.getElementById('catSelect').value; const select = document.getElementById('subSelect'); select.innerHTML = '<option value="0">Optional Sub-category</option>'; subData.filter(s => s.cid == cid).forEach(s => { select.innerHTML += `<option value="${s.id}">${s.name}</option>`; }); }
        function showTab(id, btn) { document.querySelectorAll('.section').forEach(s => s.classList.remove('active')); document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active')); document.getElementById(id).classList.add('active'); btn.classList.add('active'); }
        
        function showLoader() { document.getElementById('uploadOverlay').style.display = 'flex'; }

        function updateUploadFields() {
            const type = document.getElementById('typeSelect').value;
            const ratio = document.getElementById('ratioSelect').value;
            
            const vBox = document.getElementById('v_url_box');
            const thBox = document.getElementById('th_url_box');
            const vInput = document.getElementById('vUploader');
            const thInput = document.getElementById('thUploader');
            const vLabel = document.getElementById('vLabel');
            const thLabel = document.getElementById('thLabel');

            if (type === 'image') {
                vBox.style.display = 'none';
                thBox.style.display = 'block';
                thInput.multiple = true;
                thLabel.innerText = 'Cover Image / Thumbnail (Up to 8 files)';
            } else {
                vBox.style.display = 'block';
                if (ratio === '9:16') {
                    thBox.style.display = 'none';
                    vInput.multiple = true;
                    vLabel.innerText = 'Shorts Video Files (Up to 8 MP4s)';
                } else {
                    thBox.style.display = 'block';
                    vInput.multiple = false;
                    thInput.multiple = false;
                    vLabel.innerText = 'Video Source (1 MP4 or Paste Link)';
                    thLabel.innerText = 'Cover Image / Thumbnail (1 Image)';
                }
            }
        }

        document.getElementById('vUploader').addEventListener('change', function() { if(this.files.length > 8) { alert("Maximum 8 videos at a time!"); this.value = ""; } });
        document.getElementById('thUploader').addEventListener('change', function() { if(this.files.length > 8) { alert("Maximum 8 thumbnails at a time!"); this.value = ""; } });
        
        const saveCb = document.getElementById('saveSettingsCb');
        const typeSel = document.getElementById('typeSelect');
        const ratioSel = document.getElementById('ratioSelect');
        const catSel = document.getElementById('catSelect');
        const subSel = document.getElementById('subSelect');
        
        function saveFields() { if(saveCb.checked) { localStorage.setItem('eh_type', typeSel.value); localStorage.setItem('eh_ratio', ratioSel.value); localStorage.setItem('eh_cat', catSel.value); localStorage.setItem('eh_sub', subSel.value); } }
        saveCb.addEventListener('change', function() { if(this.checked) { localStorage.setItem('eh_save', 'yes'); saveFields(); } else { localStorage.removeItem('eh_save'); localStorage.removeItem('eh_type'); localStorage.removeItem('eh_ratio'); localStorage.removeItem('eh_cat'); localStorage.removeItem('eh_sub'); } });
        
        [typeSel, ratioSel, catSel, subSel].forEach(el => { el.addEventListener('change', () => { saveFields(); updateUploadFields(); }); });

        window.addEventListener('DOMContentLoaded', () => { 
            if(localStorage.getItem('eh_save') === 'yes') { 
                saveCb.checked = true; 
                if(localStorage.getItem('eh_type')) { typeSel.value = localStorage.getItem('eh_type'); } 
                if(localStorage.getItem('eh_ratio')) { ratioSel.value = localStorage.getItem('eh_ratio'); } 
                updateUploadFields();
                if(localStorage.getItem('eh_cat')) { 
                    catSel.value = localStorage.getItem('eh_cat'); 
                    filterSubs(); 
                    setTimeout(() => { if(localStorage.getItem('eh_sub')) subSel.value = localStorage.getItem('eh_sub'); }, 50); 
                } 
            } else { updateUploadFields(); }
        });
    </script>
</body>
</html>
