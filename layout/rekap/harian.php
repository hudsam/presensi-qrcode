<div class="container-fluid">
    <div class="row">
        <div class="col-md">
            <div class="card mb-3 border border-danger">
                <h5 class="card-header bg-danger text-white">Data Rekap Presensi</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered border-danger table-striped table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th scope="col">Waktu</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $fileName = './log/presensi-harian.log';
                            $handle = fopen($fileName, 'r');
                            if ($handle) {
                                while (($line = fgets($handle)) !== false) {
                                    echo '<tr>';
                                    foreach (explode(';', $line) as $text) {
                                        echo '<td>';
                                        echo (substr($text, 0, 7) === 'success') ? '<i class="bi bi-check2-circle text-success"></i>' : $text;
                                        echo '</td>';
                                    }
                                    echo '</tr>';
                                }
                                fclose($handle);
                            } else {
                                echo 'Gagal membuka file rekap : ' . $fileName;
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th scope="col">Waktu</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Status</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>