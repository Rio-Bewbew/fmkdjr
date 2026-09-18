<?php
$pdo = new PDO('mysql:host=localhost;dbname=fmkdjr_db', 'root', '');
$stmt = $pdo->query("SELECT * FROM pengurus");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$out = "<?php\nrequire_once 'config/db.php';\n";
$out .= "\$pdo->exec('TRUNCATE TABLE pengurus');\n";
$out .= "\$stmt = \$pdo->prepare('INSERT INTO pengurus (id, nama, jabatan, kedinasan, badge_color, kategori, level, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');\n";

foreach($rows as $r) {
    $out .= "\$stmt->execute(['" . addslashes($r['id']) . "', '" . addslashes($r['nama']) . "', '" . addslashes($r['jabatan']) . "', '" . addslashes($r['kedinasan']) . "', '" . addslashes($r['badge_color']) . "', '" . addslashes($r['kategori']) . "', '" . addslashes($r['level']) . "', " . ($r['foto'] ? "'".addslashes($r['foto'])."'" : "null") . "]);\n";
}

$out .= "echo '<h1>Data Localhost Berhasil Di-migrate!</h1>';\n";
$out .= "echo '<p><a href=\"database.php\">Kembali ke halaman Database</a></p>';\n";
$out .= "?>";

file_put_contents('migrasi_data_asli.php', $out);
echo "Script migrasi_data_asli.php berhasil dibuat.";
?>
