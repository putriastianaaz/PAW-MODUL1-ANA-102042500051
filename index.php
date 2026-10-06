<?php
$data_produk = [
    [
        "nama"     => "Mouse Wireless",
        "kategori" => "Aksesoris",
        "harga"    => 120000,
        "stok"     => 25
    ],
    [
        "nama"     => "Flashdisk 64GB",
        "kategori" => "Storage",
        "harga"    => 75000,
        "stok"     => 30
    ],
    [
        "nama"     => "Powerbank 10.000 mAh",
        "kategori" => "Charger",
        "harga"    => 185000,
        "stok"     => 14
    ],
    [
        "nama"     => "Earbuds Bluetooth TWS",
        "kategori" => "Audio",
        "harga"    => 250000,
        "stok"     => 0
    ],
    [
        "nama"     => "Laptop Gaming 15 inch",
        "kategori" => "Laptop",
        "harga"    => 12500000,
        "stok"     => 5
    ],
    [
        "nama"     => "Smartphone Flagship 5G",
        "kategori" => "Handphone",
        "harga"    => 8500000,
        "stok"     => 8
    ],
];

$total_produk = count($data_produk);

$batas_diskon  = 1000000;
$persen_diskon = 10;

function format_rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="container nav-isi">
            <h1 class="logo">Cia<span>Store</span></h1>
            <nav>
                <a href="#hero">Beranda</a>
                <a href="#katalog">Produk</a>
                <a href="#kontak">Kontak</a>
            </nav>
        </div>
    </header>

    <section class="hero" id="hero">
        <div class="container">
            <h2>Gadget &amp; Aksesoris<br>Dijamin Raamaahh di Kantong!</h2>

            <p class="hero-teks">
                Diskon <?php echo $persen_diskon; ?>% untuk produk mulai <?php echo format_rupiah($batas_diskon); ?>.
            </p>

            <div class="hero-btn">
                <a href="#katalog" class="btn btn-putih">Lihat Produk</a>
                <a href="#kontak" class="btn btn-garis-putih">Hubungi Kami</a>
            </div>
        </div>
    </section>

    <section class="info-produk">
        <div class="container info-isi">
            <div class="info-box utama">
                <span class="info-angka"><?php echo $total_produk; ?></span>
                <span class="info-label">Total Produk</span>
            </div>
        </div>
    </section>

    <section class="katalog" id="katalog">
        <div class="container">
            <h2 class="judul">Katalog Produk</h2>

            <div class="grid">

                <?php
                foreach ($data_produk as $produk) {
                    if ($produk["harga"] >= $batas_diskon) {
                        $dapat_diskon = true;
                        $potongan     = $produk["harga"] * $persen_diskon / 100;
                        $harga_akhir  = $produk["harga"] - $potongan;
                    } else {
                        $dapat_diskon = false;
                        $harga_akhir  = $produk["harga"];
                    }
                ?>

                    <div class="card">
                        <div class="card-header">
                            <span class="kategori"><?php echo $produk["kategori"]; ?></span>
                            <?php if ($dapat_diskon) { ?>
                                <span class="label-diskon">DISKON <?php echo $persen_diskon; ?>%</span>
                            <?php } ?>
                        </div>

                        <h3><?php echo $produk["nama"]; ?></h3>

                        <div class="harga">
                            <?php if ($dapat_diskon) { ?>
                                <p class="harga-normal"><?php echo format_rupiah($produk["harga"]); ?></p>
                            <?php } ?>
                            <p class="harga-akhir"><?php echo format_rupiah($harga_akhir); ?></p>
                        </div>

                        <div class="stok">
                            <span>Stok: <?php echo $produk["stok"]; ?></span>
                            <?php if ($produk["stok"] > 0) { ?>
                                <span class="status tersedia">Tersedia</span>
                            <?php } else { ?>
                                <span class="status habis">Stok Habis</span>
                            <?php } ?>
                        </div>

                        <?php if ($produk["stok"] > 0) { ?>
                            <button class="btn btn-beli">Beli Sekarang</button>
                        <?php } else { ?>
                            <button class="btn btn-mati" disabled>Stok Habis</button>
                        <?php } ?>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
    </section>

    <section class="kontak" id="kontak">
        <div class="container">
            <h2 class="judul">Hubungi Kami</h2>
            <div class="kontak-isi">
                <div class="kontak-box"><h3>Alamat</h3><p>Jl. Minang No. 25, Jakarta Selatan</p></div>
                <div class="kontak-box"><h3>WhatsApp</h3><p>0812-3456-7890</p></div>
                <div class="kontak-box"><h3>Email</h3><p>halo@ciastore.com</p></div>
                <div class="kontak-box"><h3>Jam Buka</h3><p>Senin - Sabtu: 09.00 - 20.00</p></div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; <?php echo date("Y"); ?> Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>