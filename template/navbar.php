<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">DIKLATSAR XLI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html"><i class="bi bi-house-fill"></i> Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="peserta-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-heart"></i> Peserta</a>
                    <ul class="dropdown-menu" aria-labelledby="peserta-dropdown">
                        <li><a class="dropdown-item" href="presensi.php?jenis=harian">Harian</a></li>
                        <li><a class="dropdown-item" href="presensi.php?jenis=izin">Izin</a></li>
                        <li><a class="dropdown-item" href="presensi.php?jenis=makan">Makan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" onClick="window.location.reload();"><i class="bi bi-arrow-clockwise"></i> Muat Ulang Halaman</a>
                </li>
            </ul>
            <ul class="navbar-nav flex-row flex-wrap ms-md-auto <?php echo (basename($_SERVER['SCRIPT_NAME']) === 'menu.php' ? 'd-none' : null) ; ?>">
                <?php $menu = (basename($_SERVER['SCRIPT_NAME']) === 'rekap.php') ? 'd-block' : 'd-none'; ?>
                <li class="nav-item col-md-auto <?php echo $menu; ?>">
                    <a class="nav-link p-2 text-white" href="#" onclick="unduhPerekapan('<?php echo $_GET['jenis']; ?>');"><i class="bi bi-download"></i> Unduh Perekapan</a>
                </li>
                <li class="nav-item col-md-auto">
                    <?php
                        $menu = (basename($_SERVER['SCRIPT_NAME']) === 'presensi.php') ? 'Presensi Manual' : 'Isi Presensi';
                        $redirect = null;
                        if ($_GET['jenis'] === 'harian') {
                            $redirect = (basename($_SERVER['SCRIPT_NAME']) === 'presensi.php') ? 'href="#" onclick="presensiManual();"' : 'href="presensi.php?jenis=harian"';
                        } elseif ($_GET['jenis'] === 'izin') {
                            $redirect = (basename($_SERVER['SCRIPT_NAME']) === 'presensi.php') ? 'href="#" onclick="presensiManual();"' : 'href="presensi.php?jenis=izin"';
                        } elseif ($_GET['jenis'] === 'makan') {
                            $redirect = (basename($_SERVER['SCRIPT_NAME']) === 'presensi.php') ? 'href="#" onclick="presensiManual();"' : 'href="presensi.php?jenis=makan"';
                        }
                    ?>
                    <a class="nav-link p-2 text-white" <?php echo $redirect; ?>><i class="bi bi-pencil-square"></i> <?php echo $menu; ?></a>
                </li>
                <li class="nav-item col-md-auto">
                    <a class="nav-link p-2 text-white" href="rekap.php?jenis=<?php echo (isset($_GET['jenis'])) ? $_GET['jenis'] : null; ?>"><i class="bi bi-card-checklist"></i> Rekap Presensi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
