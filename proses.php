<?php
// proses.php
$koneksi = mysqli_connect("localhost", "root", "", "pesan");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// fungsi untuk mengamankan output
function e($s) {
    return htmlspecialchars($s, ENT_QUOTES);
}

// ambil input dari form
$nokartu           = $_POST['nokartu'] ?? null;
$nama              = trim($_POST['nama'] ?? '');
$alamat            = trim($_POST['alamat'] ?? '');
$nohp              = trim($_POST['nohp'] ?? '');
$pesanan           = trim($_POST['pesanan'] ?? '');
$jumlah            = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 0;
$catatantambahan   = trim($_POST['catatantambahan'] ?? '');
$metode_pembayaran = $_POST['metode_pembayaran'] ?? '';

// validasi sederhana
if ($nama === '' || $alamat === '' || $nohp === '' || $pesanan === '' || $jumlah <= 0 || $metode_pembayaran === '') {
    echo "<p>❌ Lengkapi semua field wajib (nama, alamat, nohp, pesanan, jumlah, metode pembayaran).</p>";
    echo "<a href='pesan.php'>⬅ Kembali ke Form</a>";
    exit;
}

// simpan ke database
$query = "INSERT INTO pesan (nokartu, nama, alamat, nohp, pesanan, jumlah, catatantambahan, metode_pembayaran)
          VALUES ('$nokartu','$nama','$alamat','$nohp','$pesanan','$jumlah','$catatantambahan','$metode_pembayaran')";

if (mysqli_query($koneksi, $query)) {
    $last_id = mysqli_insert_id($koneksi);
    $result  = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id=$last_id");
    $row     = mysqli_fetch_assoc($result);

    echo "<div style='max-width:800px;margin:20px auto;font-family:Arial,Helvetica,sans-serif;'>";
    echo "<h2>✅ Pesanan Berhasil Disimpan!</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse:collapse;width:100%;'>";
    echo "<tr><td><b>ID Pesanan</b></td><td>" . e($row['id']) . "</td></tr>";
    echo "<tr><td><b>No. Kartu</b></td><td>" . e($row['nokartu']) . "</td></tr>";
    echo "<tr><td><b>Nama</b></td><td>" . e($row['nama']) . "</td></tr>";
    echo "<tr><td><b>Alamat</b></td><td>" . nl2br(e($row['alamat'])) . "</td></tr>";
    echo "<tr><td><b>No. HP</b></td><td>" . e($row['nohp']) . "</td></tr>";
    echo "<tr><td><b>Pesanan</b></td><td>" . nl2br(e($row['pesanan'])) . "</td></tr>";
    echo "<tr><td><b>Jumlah</b></td><td>" . e($row['jumlah']) . "</td></tr>";
    echo "<tr><td><b>Catatan Tambahan</b></td><td>" . nl2br(e($row['catatantambahan'])) . "</td></tr>";
    echo "<tr><td><b>Metode Pembayaran</b></td><td>" . e($row['metode_pembayaran']) . "</td></tr>";
    echo "<tr><td><b>Tanggal Pesan</b></td><td>" . e($row['tanggal_pesan']) . "</td></tr>";
    echo "</table>";
    echo "<br><a href='pesan.php'>⬅ Kembali ke Form</a>";
    echo "</div>";
} else {
    echo "❌ Gagal menyimpan pesanan: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
