<?php
$brainDir = "C:\\Users\\Rio Nelson\\.gemini\\antigravity\\brain\\323a82da-0b40-4234-803b-ab44e1e3c15c\\";
$targetDir = __DIR__ . "/assets/img/";

if (copy($brainDir . "jakarta_about_1779179254194.png", $targetDir . "jakarta_about.png")) {
    echo "Copied jakarta_about.png";
} else {
    echo "Failed";
}
?>
