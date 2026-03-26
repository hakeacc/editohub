<?php
session_start();
include 'config.php'; 

// SECURE CREDENTIAL CHECK
if (!isset($_SESSION['hake_auth'])) {
    header("Location: hq-portal.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: hq-portal.php");
    exit();
}

$id = intval($_GET['id']);
$success = "";
$error = "";

function makeSlug($string) {
    $string = strtolower(str_replace(' ', '-', trim($string)));
    return preg_replace('/[^a-z0-9\-]/', '', $string);
}

function handleSafeUpload($file_input_name, $raw_name) {
    if(isset($_FILES[$file_input_name]) && $_FILES[$file_input_name]['error'] === UPLOAD_ERR_OK) {
        if(!is_dir('uploads')) { mkdir('uploads', 0777, true); }
        $safe_slug = makeSlug($raw_name);
        $ext = strtolower(pathinfo($_FILES[$file_input_name]['name'], PATHINFO_EXTENSION));
        $new_name = 'uploads/' . $safe_slug . '-cat-upd-' . time() . '.' . $ext;
        if(move_uploaded_file($_FILES[$file_input_name]['tmp_name'], $new_name)) return $new_name;
    } return null;
}

// Handle Update
if (isset($_POST['update_cat'])) {
    $name = $_POST['c_name']; // Intentionally not strict-cleaned here to preserve special chars if needed, prepared statements protect SQL
    $uploaded_file = handleSafeUpload('c_file', $name);
    
    // Fallback: If new file uploaded, use it. Otherwise, keep the text field link.
    $final_th = $uploaded_file ? $uploaded_file : $_POST['c_thumb'];

    $stmt = $conn->prepare("UPDATE categories SET name=?, thumb_url=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $final_th, $id);
    
    if ($stmt->execute()) {
        $success = "Category successfully upgraded.";
    } else {
        $error = "System Error: Failed to update category.";
    }
}

// Fetch Current Data
$stmt = $conn->prepare("SELECT * FROM categories WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$cat = $stmt->get_result()->fetch_assoc();

if (!$cat) {
    header("Location: hq-portal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category | HQ Vault</title>
    <link rel="icon" type="image/png" href="https://i.ibb.co/JR76yvRp/1758037248-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --bg: #00040d; --primary: #00d2ff; --purple: #9d50bb; --glass: rgba(255,255,255,0.03); --border: rgba(255,255,255,0.08); --neon: #00d2ff; }
        * { margin:0; padding:0; box-sizing:border-box; outline: none !important; font-family: 'Segoe UI', sans-serif; }
        body { background: var(--bg); color: #fff; display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 20px; }
        
        .glass-card { background: var(--glass); padding: 40px; border-radius: 40px; border: 1px solid var(--border); width: 100%; max-width: 600px; backdrop-filter: blur(30px); position: relative; box-shadow: 0 20px 50px rgba(0,0,0,0.5); }
        h2 { font-size: 1.2rem; margin-bottom: 25px; color: var(--primary); text-transform: uppercase; letter-spacing: 2px; font-weight: 900; text-align: center; }
        
        label { font-size: 0.7rem; color: #888; font-weight: 900; text-transform: uppercase; letter-spacing: 2px; margin-left: 10px; display: block; margin-top: 15px; }
        input { width: 100%; padding: 18px; margin: 8px 0 15px; background: rgba(0,0,0,0.6); border: 1px solid var(--border); color: #fff; border-radius: 18px; font-size: 1rem; transition: 0.3s; }
        input:focus { border-color: var(--primary); box-shadow: 0 0 15px rgba(0, 210, 255, 0.2); background: #000; }
        input[type="file"] { padding: 15px; background: rgba(0, 210, 255, 0.05); cursor: pointer; }
        input[type="file"]::-webkit-file-upload-button { background: var(--primary); border: none; padding: 8px 15px; border-radius: 10px; color: #000; font-weight: 800; cursor: pointer; margin-right: 15px; }
        
        .btn-act { width: 100%; padding: 20px; border: none; border-radius: 18px; font-weight: 900; cursor: pointer; background: var(--primary); color: #000; margin-top: 20px; transition: 0.4s; text-transform: uppercase; letter-spacing: 2px; }
        .btn-act:hover { box-shadow: 0 0 40px var(--neon); transform: translateY(-3px); }
        .back-link { display: block; text-align: center; margin-top: 25px; color: #ff4d4d; text-decoration: none; font-weight: 800; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s; }
        .back-link:hover { text-shadow: 0 0 10px #ff4d4d; transform: translateY(-2px); }

        .current-preview { display: flex; align-items: center; gap: 15px; background: rgba(0,0,0,0.4); padding: 20px; border-radius: 20px; border: 1px solid var(--border); margin-bottom: 20px; }
        .current-preview img { width: 70px; height: 70px; border-radius: 15px; object-fit: cover; border: 2px solid var(--primary); background: #000; }

        .alert { padding: 15px; border-radius: 15px; text-align: center; font-weight: bold; margin-bottom: 20px; font-size: 0.9rem; }
        .alert-success { background: rgba(0, 255, 100, 0.1); color: #00ff66; border: 1px solid rgba(0, 255, 100, 0.2); }
        .alert-error { background: rgba(255, 50, 50, 0.1); color: #ff4d4d; border: 1px solid rgba(255, 50, 50, 0.2); }
    </style>
</head>
<body>

    <div class="glass-card">
        <h2><i class="fas fa-sliders-h"></i> Modify Category</h2>
        
        <?php if($success) echo "<div class='alert alert-success'><i class='fas fa-check-circle'></i> $success</div>"; ?>
        <?php if($error) echo "<div class='alert alert-error'><i class='fas fa-exclamation-triangle'></i> $error</div>"; ?>

        <div class="current-preview">
            <img src="<?php echo htmlspecialchars($cat['thumb_url']); ?>" alt="Current">
            <div>
                <span style="font-size: 0.65rem; color: var(--primary); text-transform: uppercase; font-weight: 900; letter-spacing: 2px;">Editing Sector</span><br>
                <span style="font-weight: 900; font-size: 1.3rem;"><?php echo htmlspecialchars($cat['name']); ?></span>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <label>Sector Name</label>
            <input type="text" name="c_name" value="<?php echo htmlspecialchars($cat['name'], ENT_QUOTES); ?>" required>
            
            <label>Upload New Thumbnail (Overrides current)</label>
            <input type="file" name="c_file" accept="image/*">
            
            <label>OR Use Image Link (Current link below)</label>
            <input type="text" name="c_thumb" value="<?php echo htmlspecialchars($cat['thumb_url'], ENT_QUOTES); ?>">
            
            <button type="submit" name="update_cat" class="btn-act">Deploy Configuration</button>
        </form>

        <a href="hq-portal.php" class="back-link"><i class="fas fa-arrow-left"></i> Return to Main Vault</a>
    </div>

</body>
</html>
