<?php
require_once 'db.php';
require_once '../data/artikel_data.php';

try {
    $pdo->exec("TRUNCATE TABLE pengurus");
    $pdo->exec("TRUNCATE TABLE artikel");

    // Insert Artikel
    $stmt_artikel = $pdo->prepare("INSERT INTO artikel (id, title, slug, excerpt, content, image, date, author, category) VALUES (:id, :title, :slug, :excerpt, :content, :image, :date, :author, :category)");
    
    foreach ($all_articles as $artikel) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $artikel['title'])));
        
        // Konversi tanggal Indonesia ke format Y-m-d untuk disimpan di DB jika memungkinkan, 
        // tapi tipe kolom saat ini adalah DATE. 
        // Mari kita ubah tipe kolom menjadi VARCHAR(100) di migrate ini untuk menyederhanakan
        $pdo->exec("ALTER TABLE artikel MODIFY date VARCHAR(100)");

        $stmt_artikel->execute([
            ':id' => $artikel['id'],
            ':title' => $artikel['title'],
            ':slug' => $slug,
            ':excerpt' => $artikel['excerpt'],
            ':content' => $artikel['content'],
            ':image' => $artikel['image'],
            ':date' => $artikel['date'],
            ':author' => $artikel['author'],
            ':category' => $artikel['category']
        ]);
    }
    echo "Data artikel berhasil dimigrasi.<br>";

    // Data DPD
    $dpd_ketua = [['nama' => 'Alief Nugroho', 'jabatan' => 'Ketua DPD', 'kedinasan' => 'FMKD Jakarta Raya', 'badge_color' => 'bg-red-500 text-white']];
    $dpd_sekbend = [
        ['nama' => 'Shilla Awaliyah Aszwa', 'jabatan' => 'Sekretaris 1', 'kedinasan' => 'Politeknik Kelautan dan Perikanan Pangandaran', 'badge_color' => 'bg-blue-500 text-white'],
        ['nama' => 'Yusyartania Novitamy', 'jabatan' => 'Sekretaris 2', 'kedinasan' => 'Politeknik Statistika STIS', 'badge_color' => 'bg-blue-400 text-white'],
        ['nama' => 'Richard Alimin', 'jabatan' => 'Bendahara 1', 'kedinasan' => 'Politeknik Keuangan Negara STAN', 'badge_color' => 'bg-green-500 text-white'],
        ['nama' => 'Putra Timothy', 'jabatan' => 'Bendahara 2', 'kedinasan' => 'Politeknik Keuangan Negara STAN', 'badge_color' => 'bg-green-400 text-white']
    ];
    $dpd_kadiv = [
        ['nama' => 'David Sam Limbong', 'jabatan' => 'Kepala Divisi Perencanaan', 'kedinasan' => 'Politeknik Siber dan Sandi Negara', 'badge_color' => 'bg-purple-500 text-white'],
        ['nama' => 'Rio Nelson', 'jabatan' => 'Kepala Divisi Kominfo', 'kedinasan' => 'Politeknik Siber dan Sandi Negara', 'badge_color' => 'bg-indigo-500 text-white'],
        ['nama' => 'Naa\'ilah Desiyana Tursadi', 'jabatan' => 'Kepala Divisi Humas', 'kedinasan' => 'Politeknik Ketenagakerjaan', 'badge_color' => 'bg-pink-500 text-white'],
        ['nama' => 'Fauzi Hadi Bintoro', 'jabatan' => 'Kepala Divisi Ekraf', 'kedinasan' => 'Politeknik Imigrasi', 'badge_color' => 'bg-orange-500 text-white']
    ];
    $dpd_kasi = [
        ['nama' => 'Budi Santoso', 'jabatan' => 'Kepala Seksi Perencanaan Strategis', 'kedinasan' => 'Politeknik Keuangan Negara STAN', 'badge_color' => 'bg-blue-500 text-white'],
        ['nama' => 'Siti Aminah', 'jabatan' => 'Kepala Seksi Media Digital', 'kedinasan' => 'Politeknik Statistika STIS', 'badge_color' => 'bg-blue-500 text-white'],
        ['nama' => 'Rizky Ramadhan', 'jabatan' => 'Kepala Seksi Hubungan Eksternal', 'kedinasan' => 'Politeknik Ilmu Pemasyarakatan', 'badge_color' => 'bg-blue-500 text-white'],
        ['nama' => 'Ahmad Fauzan', 'jabatan' => 'Kepala Seksi Pengembangan Usaha', 'kedinasan' => 'Sekolah Tinggi Meteorologi Klimatologi dan Geofisika', 'badge_color' => 'bg-blue-500 text-white']
    ];
    $dpd_staff = [
        ['nama' => 'Putri Lestari', 'jabatan' => 'Staff Divisi Perencanaan', 'kedinasan' => 'Poltekkes Kemenkes Jakarta I', 'badge_color' => 'bg-gray-500 text-white'],
        ['nama' => 'Andi Pratama', 'jabatan' => 'Staff Divisi Kominfo', 'kedinasan' => 'Politeknik Penerbangan Indonesia', 'badge_color' => 'bg-gray-500 text-white'],
        ['nama' => 'Citra Maharani', 'jabatan' => 'Staff Divisi Humas', 'kedinasan' => 'Sekolah Tinggi Intelijen Negara', 'badge_color' => 'bg-gray-500 text-white'],
        ['nama' => 'Bagas Pamungkas', 'jabatan' => 'Staff Divisi Ekraf', 'kedinasan' => 'Politeknik Transportasi Darat Indonesia', 'badge_color' => 'bg-gray-500 text-white'],
        ['nama' => 'Dina Fitriani', 'jabatan' => 'Staff Divisi Kominfo', 'kedinasan' => 'Politeknik Siber dan Sandi Negara', 'badge_color' => 'bg-gray-500 text-white']
    ];

    // Data Dewas
    $dewas_ketua = [
        ['nama' => 'Siera Samudra J. P. Surbakti', 'jabatan' => 'Ketua Dewan Pengawas', 'kedinasan' => 'FMKD Jakarta Raya', 'badge_color' => 'bg-slate-800 text-white'],
        ['nama' => 'Rifky Ridho Baihaqi', 'jabatan' => 'Sekretaris Dewas', 'kedinasan' => 'Politeknik Statistika STIS', 'badge_color' => 'bg-slate-600 text-white']
    ];
    $dewas_komisi = [
        ['nama' => 'Lutfi Budiana', 'jabatan' => 'Ketua Komisi 1', 'kedinasan' => 'Politeknik Imigrasi', 'badge_color' => 'bg-teal-600 text-white'],
        ['nama' => 'Zildjian Ahmed Abu Bakar', 'jabatan' => 'Ketua Komisi 2', 'kedinasan' => 'Politeknik Kelautan Dan Perikanan Sidoarjo', 'badge_color' => 'bg-teal-500 text-white'],
        ['nama' => 'Satria Tegar', 'jabatan' => 'Ketua Komisi 3', 'kedinasan' => 'Politeknik Siber dan Sandi Negara', 'badge_color' => 'bg-teal-400 text-white']
    ];
    $dewas_kasi = [
        ['nama' => 'Rina Mulyani', 'jabatan' => 'Wakil Komisi 1', 'kedinasan' => 'Politeknik Statistika STIS', 'badge_color' => 'bg-slate-500 text-white'],
        ['nama' => 'Hendra Saputra', 'jabatan' => 'Wakil Komisi 2', 'kedinasan' => 'Politeknik Keuangan Negara STAN', 'badge_color' => 'bg-slate-500 text-white']
    ];
    $dewas_staff = [
        ['nama' => 'Aditya Nugraha', 'jabatan' => 'Staff Dewas', 'kedinasan' => 'Poltekkes Kemenkes Jakarta I', 'badge_color' => 'bg-slate-400 text-white'],
        ['nama' => 'Nia Ramadhani', 'jabatan' => 'Staff Dewas', 'kedinasan' => 'Sekolah Tinggi Meteorologi Klimatologi dan Geofisika', 'badge_color' => 'bg-slate-400 text-white']
    ];

    $stmt_pengurus = $pdo->prepare("INSERT INTO pengurus (nama, jabatan, kedinasan, badge_color, kategori, level) VALUES (:nama, :jabatan, :kedinasan, :badge_color, :kategori, :level)");
    
    function insertPengurus($arr, $kategori, $level, $stmt) {
        foreach ($arr as $p) {
            $stmt->execute([
                ':nama' => $p['nama'],
                ':jabatan' => $p['jabatan'],
                ':kedinasan' => $p['kedinasan'],
                ':badge_color' => $p['badge_color'],
                ':kategori' => $kategori,
                ':level' => $level
            ]);
        }
    }

    insertPengurus($dpd_ketua, 'dpd', 'ketua', $stmt_pengurus);
    insertPengurus($dpd_sekbend, 'dpd', 'sekbend', $stmt_pengurus);
    insertPengurus($dpd_kadiv, 'dpd', 'kadiv', $stmt_pengurus);
    insertPengurus($dpd_kasi, 'dpd', 'kasi', $stmt_pengurus);
    insertPengurus($dpd_staff, 'dpd', 'staff', $stmt_pengurus);

    insertPengurus($dewas_ketua, 'dewas', 'ketua', $stmt_pengurus);
    insertPengurus($dewas_komisi, 'dewas', 'komisi', $stmt_pengurus);
    insertPengurus($dewas_kasi, 'dewas', 'kasi', $stmt_pengurus);
    insertPengurus($dewas_staff, 'dewas', 'staff', $stmt_pengurus);

    echo "Data pengurus berhasil dimigrasi.<br>";
    echo "Semua data berhasil masuk ke database!";

} catch (PDOException $e) {
    die("Gagal migrasi: " . $e->getMessage());
}
?>
