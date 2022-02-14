<?php error_reporting(0); include 'template/header.php'; ?>
<style rel="stylesheet" type="text/css">
    .flip-card {
        background-color: transparent;
        width: 300px;
        height: 300px;
        perspective: 1000px;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .flip-card-front {
        background-color: #bbb;
        color: black;
    }

    .flip-card-back {
        transform: rotateY(180deg);
    }
</style>
<body class="bg-light" onload="startTime();">
    <!--  Navigation  -->
    <?php include 'template/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="alert alert-info text-center" role="alert">
                    <h4 class="lead fw-bold">Kamu sedang mengakses sistem Presensi kegiatan lapang Diklatsar XLI</h4>
                    <p>Apabila ada kendala, bisa menghubungi panitia terdekat untuk membantu ya.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert text-center" role="alert">
                    <h4 class="alert-heading" id="clock"></h4>
                    <h6 class="alert-heading" id="date"></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="card mt-2 mb-3 border border-danger">
                    <h5 class="card-header text-center bg-danger text-white">Presensi Peserta</h5>
                    <div class="card-body">
                        <div class="row d-flex justify-content-around">
                            <div class="col-md-3 mx-2 my-2 flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="./vendors/gif/raise-hand.gif" alt="Avatar" style="width:300px;height:300px;">
                                    </div>
                                    <div class="flip-card-back bg-white border border-dark">
                                        <a href="./presensi.php?jenis=harian" class="btn btn-outline-primary btn-lg mt-5">
                                            <i class="bi bi-journal-check"></i> Harian
                                        </a>
                                        <p class="lead mt-1 p-2">Presensi yang digunakan untuk merekap kehadiran peserta setiap harinya selama diklat lapang.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-2 my-2 flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="./vendors/gif/walking-away.gif" alt="Avatar" style="width:300px;height:300px;">
                                    </div>
                                    <div class="flip-card-back bg-white border border-dark">
                                        <a href="./presensi.php?jenis=izin" class="btn btn-outline-primary btn-lg mt-5">
                                            <i class="bi bi-door-open"></i> Izin
                                        </a>
                                        <p class="lead mt-1 p-2">Sebelum dan sesudah meninggalkan base camp (9.1), isi presensi ya. Guna <em>tracking</em> panitia aja kok.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mx-2 my-2 flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="./vendors/gif/will-eat.gif" alt="Avatar" style="width:300px;height:300px;">
                                    </div>
                                    <div class="flip-card-back bg-white border border-dark">
                                        <a href="./presensi.php?jenis=makan" class="btn btn-outline-primary btn-lg mt-5">
                                            <i class="bi bi-cup-straw"></i> Makan
                                        </a>
                                        <p class="lead mt-1 p-2">Selain berdoa sebelum makan, jangan lupa mengisi presensi juga ya. Selain berkah, biar disiplin juga.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><i class="bi bi-info text-info"></i> Program presensi ini dikembangkan oleh internal anggota UKM KSR UB.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md">

        </div>
    </div>
</body>
<?php include 'template/footer.php'; ?>
<script src="vendors/js/waktu.js" rel="script" type="text/javascript"></script>
