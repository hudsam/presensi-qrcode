<?php include 'template/header.php'; ?>
<body class="bg-light">
    <!-- Navigasi -->
    <?php include 'template/navbar.php'; ?>

    <!-- Konten -->
    <?php
        switch ($_GET['jenis'])
        {
            case 'harian':
                include 'layout/presensi/harian.php';
                break;
            case 'izin':
                include 'layout/presensi/izin.php';
                break;
            case 'makan':
                include 'layout/presensi/makan.php';
                break;
            default:
                return header('Location: index.html');
        }
    ?>
</body>
<?php include 'template/footer.php'; ?>
<script src="vendors/js/presensi/<?php echo (isset($_GET['jenis'])) ? $_GET['jenis'] : null; ?>.js" rel="script" type="text/javascript"></script>
