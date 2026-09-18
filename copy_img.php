<?php
$source = "C:\\Users\\Rio Nelson\\.gemini\\antigravity\\brain\\323a82da-0b40-4234-803b-ab44e1e3c15c\\jakarta_neon_skyline_1779178491650.png";
$dest = __DIR__ . "/assets/img/jakarta_neon_skyline.png";
if(copy($source, $dest)) {
    echo "Copied successfully!";
} else {
    echo "Failed to copy.";
}
?>
