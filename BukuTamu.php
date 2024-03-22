<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
</head>
<body>

<h2>Buku Tamu</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nama: <input type="text" name="nama"><br>
    Email: <input type="email" name="email"><br>
    Komentar: <textarea name="komentar" cols="30" rows="5"></textarea><br>
    <input type="submit" name="submit" value="Kirim">
</form>

<?php
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mendapatkan input
    if (isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["komentar"])) {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $komentar = $_POST["komentar"];

        if (!empty($nama) && !empty($email) && !empty($komentar)) {
            // file untuk menyimpan data
            $file = fopen("buku_tamu.dat", "a");

            // Menulis data ke file buku_tamu.dat
            fwrite($file, "Nama: " . $nama . "\n");
            fwrite($file, "Email: " . $email . "\n");
            fwrite($file, "Komentar: " . $komentar . "\n\n");
            // menutup file
            fclose($file);

            echo "<p> Data telah tersimpan.</p>";

            // jika user belum menginput data di kolom form
        } else {
            echo "<p>mohon isi kolom harus yang kosong.</p>";
        }
    } else {
        echo "<p>mohon isi kolom harus yang kosong.</p>";
    }
}
?>

</body>
</html>