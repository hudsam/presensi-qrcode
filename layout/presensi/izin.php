<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="alert alert-info text-center fw-bold" role="alert">
                Halaman Presensi Perizinan
            </div>
            <div class="card mb-3 border border-danger">
                <h5 class="card-header text-danger bg-light">Panduan Presensi</h5>
                <div class="card-body">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Senyum manisnya mana nih <i class="bi bi-emoji-smile text-dark"></i></li>
                        <li class="list-group-item">Siapkan nametag bagian belakang</li>
                        <li class="list-group-item">Pastikan bagian QRCode tidak kotor</li>
                        <li class="list-group-item">Letakan nametag tepat di depan webcam</li>
                    </ol>
                </div>
            </div>
            <div class="card mb-3 border border-danger">
                <h5 class="card-header text-danger bg-light">Data Rekap</h5>
                <div class="card-body">
                    <ul id="izin-list" class="list-group list-group-flush" style="height: 175px; overflow-y: auto;">
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3 border border-danger" style="height: 575px;">
                <h5 class="card-header bg-danger text-white">Tangkapan Kamera</h5>
                <div class="card-body text-center">
                    <video id="webcam"></video>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><i class="bi bi-camera-fill"></i>
                        <small id="camera-name"></small> ( <small id="camera-id"></small> )
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>