<?php include 'template/header.php'; ?>
<link href="vendors/datatables-1.11.4/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<style rel="stylesheet" type="text/css">
    table > thead, tbody, tfoot, tr > th, td { text-align: center; }
</style>
<body class="bg-light">
    <!-- Navigasi -->
    <?php include 'template/navbar.php'; ?>

    <!-- Konten -->
    <?php
    switch ($_GET['jenis'])
    {
        case 'harian':
            include 'layout/rekap/harian.php';
            break;
        case 'izin':
            include 'layout/rekap/izin.php';
            break;
        case 'makan':
            include 'layout/rekap/makan.php';
            break;
        default:
            return header('Location: index.html');
    }
    ?>
</body>
<?php include 'template/footer.php'; ?>
<script src="vendors/datatables-1.11.4/jquery.dataTables.min.js" rel="script" type="text/javascript"></script>
