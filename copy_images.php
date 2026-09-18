<?php
$brainDir = "C:\\Users\\Rio Nelson\\.gemini\\antigravity\\brain\\323a82da-0b40-4234-803b-ab44e1e3c15c\\";
$targetDir = __DIR__ . "/assets/img/";

$files = [
    "jakarta_visi_misi_1779178969445.png" => "jakarta_visi_misi.png",
    "jakarta_artikel_1779178989739.png" => "jakarta_artikel.png",
    "jakarta_kontak_1779179009380.png" => "jakarta_kontak.png"
];

foreach ($files as $source => $dest) {
    if (copy($brainDir . $source, $targetDir . $dest)) {
        echo "Copied $dest<br>";
    } else {
        echo "Failed to copy $dest<br>";
    }
}
?>
