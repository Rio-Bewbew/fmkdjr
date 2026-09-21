<?php
$is_local = !isset($_SERVER['SERVER_NAME']) || in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1', '::1']);

if ($is_local) {
    // Konfigurasi untuk Localhost (XAMPP)
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'fmkdjr_db'; // Sesuaikan jika nama database lokal Anda berbeda
} else {
    // Konfigurasi untuk Hosting (InfinityFree)
    $host = 'sql301.infinityfree.com';
    $username = 'if0_41970186';
    $password = 'fmkdjr2026';
    $dbname = 'if0_41970186_dbfmkd';
}

try {
    if ($is_local) {
        $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
        $pdo->exec("USE `$dbname`");
    } else {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
            PDO::ATTR_TIMEOUT => 3,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    // Tabel pesan_kontak
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS pesan_kontak (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            subjek VARCHAR(150) NOT NULL,
            pesan TEXT NOT NULL,
            tanggal_kirim TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    // Tabel pengurus
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS pengurus (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(150) NOT NULL,
            jabatan VARCHAR(150) NOT NULL,
            kedinasan VARCHAR(150) NOT NULL,
            badge_color VARCHAR(50) NOT NULL,
            kategori ENUM('dpd', 'dewas') NOT NULL,
            level VARCHAR(50) NOT NULL,
            foto VARCHAR(255) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

    // Pastikan kolom foto ada (untuk database yang sudah terbuat sebelumnya)
    try {
        $pdo->exec("ALTER TABLE pengurus ADD COLUMN foto VARCHAR(255) DEFAULT NULL");
    } catch (PDOException $e) {
        // Kolom mungkin sudah ada, abaikan error ini
    }

    // Tabel artikel
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS artikel (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL UNIQUE,
            excerpt TEXT NOT NULL,
            content TEXT NOT NULL,
            image VARCHAR(255) NOT NULL,
            date DATE NOT NULL,
            author VARCHAR(100) NOT NULL,
            category VARCHAR(50) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");

} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// AUTO SEED: Jika tabel artikel kosong, masukkan datanya otomatis
try {
    $stmt_check = $pdo->query("SELECT COUNT(*) FROM artikel");
    if ($stmt_check->fetchColumn() == 0) {
        $file_artikel = __DIR__ . '/../data/artikel_data.php';
        if (file_exists($file_artikel)) {
            include $file_artikel;
            if (isset($all_articles)) {
                $pdo->exec("ALTER TABLE artikel MODIFY date VARCHAR(100)");
                $stmt_in = $pdo->prepare("INSERT INTO artikel (id, title, slug, excerpt, content, image, date, author, category) VALUES (:id, :title, :slug, :excerpt, :content, :image, :date, :author, :category)");
                foreach ($all_articles as $artikel) {
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $artikel['title'])));
                    $stmt_in->execute([
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
            }
        }
    }

    $stmt_check_pengurus = $pdo->query("SELECT COUNT(*) FROM pengurus");
    if ($stmt_check_pengurus->fetchColumn() == 0) {
        $dpd_ketua = [['nama' => 'Alief Nugroho', 'jabatan' => 'Ketua DPD', 'kedinasan' => 'FMKD Jakarta Raya', 'badge_color' => 'bg-red-500 text-white']];
        $dpd_sekbend = [['nama' => 'Shilla Awaliyah Aszwa', 'jabatan' => 'Sekretaris 1', 'kedinasan' => 'Politeknik Kelautan dan Perikanan Pangandaran', 'badge_color' => 'bg-blue-500 text-white'], ['nama' => 'Yusyartania Novitamy', 'jabatan' => 'Sekretaris 2', 'kedinasan' => 'Politeknik Statistika STIS', 'badge_color' => 'bg-blue-400 text-white'], ['nama' => 'Richard Alimin', 'jabatan' => 'Bendahara 1', 'kedinasan' => 'Politeknik Keuangan Negara STAN', 'badge_color' => 'bg-green-500 text-white'], ['nama' => 'Putra Timothy', 'jabatan' => 'Bendahara 2', 'kedinasan' => 'Politeknik Keuangan Negara STAN', 'badge_color' => 'bg-green-400 text-white']];
        $dpd_kadiv = [['nama' => 'David Sam Limbong', 'jabatan' => 'Kepala Divisi Perencanaan', 'kedinasan' => 'Politeknik Siber dan Sandi Negara', 'badge_color' => 'bg-blue-800 text-white'], ['nama' => 'Rio Nelson', 'jabatan' => 'Kepala Divisi Kominfo', 'kedinasan' => 'Politeknik Siber dan Sandi Negara', 'badge_color' => 'bg-purple-700 text-white'], ['nama' => 'Naa\'ilah Desiyana Tursadi', 'jabatan' => 'Kepala Divisi Humas', 'kedinasan' => 'Politeknik Ketenagakerjaan', 'badge_color' => 'bg-yellow-600 text-white'], ['nama' => 'Fauzi Hadi Bintoro', 'jabatan' => 'Kepala Divisi Ekraf', 'kedinasan' => 'Politeknik Imigrasi', 'badge_color' => 'bg-teal-600 text-white']];
        $dpd_kasi = [['nama' => 'Budi Santoso', 'jabatan' => 'Kepala Seksi Perencanaan Strategis', 'kedinasan' => 'Politeknik Keuangan Negara STAN', 'badge_color' => 'bg-blue-600 text-white'], ['nama' => 'Siti Aminah', 'jabatan' => 'Kepala Seksi Media Digital', 'kedinasan' => 'Politeknik Statistika STIS', 'badge_color' => 'bg-purple-500 text-white'], ['nama' => 'Rizky Ramadhan', 'jabatan' => 'Kepala Seksi Hubungan Eksternal', 'kedinasan' => 'Politeknik Ilmu Pemasyarakatan', 'badge_color' => 'bg-yellow-500 text-white'], ['nama' => 'Ahmad Fauzan', 'jabatan' => 'Kepala Seksi Pengembangan Usaha', 'kedinasan' => 'Sekolah Tinggi Meteorologi Klimatologi dan Geofisika', 'badge_color' => 'bg-teal-500 text-white']];
        $dpd_staff = [['nama' => 'Putri Lestari', 'jabatan' => 'Staff Perencanaan Strategis', 'kedinasan' => 'Poltekkes Kemenkes Jakarta I', 'badge_color' => 'bg-blue-400 text-white'], ['nama' => 'Andi Pratama', 'jabatan' => 'Staff Media Digital', 'kedinasan' => 'Politeknik Penerbangan Indonesia', 'badge_color' => 'bg-purple-400 text-white'], ['nama' => 'Citra Maharani', 'jabatan' => 'Staff Hubungan Eksternal', 'kedinasan' => 'Sekolah Tinggi Intelijen Negara', 'badge_color' => 'bg-yellow-400 text-white'], ['nama' => 'Bagas Pamungkas', 'jabatan' => 'Staff Pengembangan Usaha', 'kedinasan' => 'Politeknik Transportasi Darat Indonesia', 'badge_color' => 'bg-teal-400 text-white'], ['nama' => 'Dina Fitriani', 'jabatan' => 'Staff Media Digital', 'kedinasan' => 'Politeknik Siber dan Sandi Negara', 'badge_color' => 'bg-purple-400 text-white']];
        $dewas_ketua = [['nama' => 'Siera Samudra J. P. Surbakti', 'jabatan' => 'Ketua Dewan Pengawas', 'kedinasan' => 'FMKD Jakarta Raya', 'badge_color' => 'bg-slate-800 text-white'], ['nama' => 'Rifky Ridho Baihaqi', 'jabatan' => 'Sekretaris Dewas', 'kedinasan' => 'Politeknik Statistika STIS', 'badge_color' => 'bg-slate-600 text-white']];
        $dewas_komisi = [['nama' => 'Lutfi Budiana', 'jabatan' => 'Ketua Komisi 1', 'kedinasan' => 'Politeknik Imigrasi', 'badge_color' => 'bg-teal-600 text-white'], ['nama' => 'Zildjian Ahmed Abu Bakar', 'jabatan' => 'Ketua Komisi 2', 'kedinasan' => 'Politeknik Kelautan Dan Perikanan Sidoarjo', 'badge_color' => 'bg-teal-500 text-white'], ['nama' => 'Satria Tegar', 'jabatan' => 'Ketua Komisi 3', 'kedinasan' => 'Politeknik Siber dan Sandi Negara', 'badge_color' => 'bg-teal-400 text-white']];
        $dewas_kasi = [['nama' => 'Rina Mulyani', 'jabatan' => 'Wakil Komisi 1', 'kedinasan' => 'Politeknik Statistika STIS', 'badge_color' => 'bg-slate-500 text-white'], ['nama' => 'Hendra Saputra', 'jabatan' => 'Wakil Komisi 2', 'kedinasan' => 'Politeknik Keuangan Negara STAN', 'badge_color' => 'bg-slate-500 text-white']];
        $dewas_staff = [['nama' => 'Aditya Nugraha', 'jabatan' => 'Staff Dewas', 'kedinasan' => 'Poltekkes Kemenkes Jakarta I', 'badge_color' => 'bg-slate-400 text-white'], ['nama' => 'Nia Ramadhani', 'jabatan' => 'Staff Dewas', 'kedinasan' => 'Sekolah Tinggi Meteorologi Klimatologi dan Geofisika', 'badge_color' => 'bg-slate-400 text-white']];

        $stmt_pengurus = $pdo->prepare("INSERT INTO pengurus (nama, jabatan, kedinasan, badge_color, kategori, level) VALUES (:nama, :jabatan, :kedinasan, :badge_color, :kategori, :level)");
        $insertPengurus = function($arr, $kategori, $level) use ($stmt_pengurus) {
            foreach ($arr as $p) {
                $stmt_pengurus->execute([':nama' => $p['nama'], ':jabatan' => $p['jabatan'], ':kedinasan' => $p['kedinasan'], ':badge_color' => $p['badge_color'], ':kategori' => $kategori, ':level' => $level]);
            }
        };

        $insertPengurus($dpd_ketua, 'dpd', 'ketua'); $insertPengurus($dpd_sekbend, 'dpd', 'sekbend'); $insertPengurus($dpd_kadiv, 'dpd', 'kadiv'); $insertPengurus($dpd_kasi, 'dpd', 'kasi'); $insertPengurus($dpd_staff, 'dpd', 'staff');
        $insertPengurus($dewas_ketua, 'dewas', 'ketua'); $insertPengurus($dewas_komisi, 'dewas', 'komisi'); $insertPengurus($dewas_kasi, 'dewas', 'kasi'); $insertPengurus($dewas_staff, 'dewas', 'staff');
    }
} catch (PDOException $e) {
    // Ignore error in seeding silently
}
?>
