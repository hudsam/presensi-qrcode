<?php

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

$dayList = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
$getDay = $dayList[date('N')];

$waktu = date('d-m-Y H:i:s');
$waktu = $getDay . ', ' . $waktu;

$parameter = $_GET['jenis'];
$nim = $_POST['nim'];
$buka = null;
$result = null;

if (isset($parameter))
{
    if ($parameter === 'harian')
    {
        $fileName = './log/presensi-harian.log';
        if (isset($nim))
        {
            $konten = "$waktu;$nim;success\r\n";
            $buka = fopen($fileName, 'a');
            fwrite($buka, $konten);
            $result = json_encode(array('status' => true));
        }
        else
        {
            $result = json_encode(array('status' => false));
        }
    }
    elseif ($parameter === 'izin')
    {
        $fileName = './log/presensi-izin.log';
        $waktu = date('Y-m-d H:i:s');
        $nim = $_POST['nim'];
        if (isset($_POST['tipe']))
        {
            if ($_POST['tipe'] === 'keluar')
            {
                $keperluan = $_POST['keperluan'];

                $konten = "$waktu;X;-;$nim;$keperluan;success\r\n";
                $buka = fopen($fileName, 'a');
                fwrite($buka, $konten);
                $result = json_encode(array('status' => 'keluar'));
            }
            elseif ($_POST['tipe'] === 'masuk')
            {
                // Insert line with new data
                $handle = fopen($fileName, 'r');
                $lineOf = null;
                if ($handle)
                {
                    while (($line = fgets($handle)) !== false)
                    {
                        $lineOf[] = $line; // Set index for next identify
                        foreach (explode(';', $line) as $key => $value)
                        {
                            if ($key === 3) // Select value of NIM
                            {
                                if ($value === $nim)
                                {
                                    $extract = explode(';', $line);
                                    $keluar = date_create($extract[0]);
                                    $masuk = date_create(date('Y-m-d H:i:s'));
                                    $selisih = date_diff($masuk, $keluar);
                                    $durasi = $selisih->h . ' jam ' . $selisih->i . ' menit ' . $selisih->s . ' detik';
                                    $masuk = $masuk->format('Y-m-d H:i:s');
                                    $nim = $extract[3];
                                    $keperluan = $extract[4];
                                    $status = $extract[5];

                                    if ($extract[1] === 'X' AND $extract[2] === '-')
                                    {
                                        $konten = "$extract[0];$masuk;$durasi;$nim;$keperluan;$status";
                                        $buka = fopen($fileName, 'a');
                                        fwrite($buka, $konten);
                                    }
                                }
                            }
                        }
                    }
                    fclose($handle);
                }

                // Delete old line
                foreach (file($fileName) as $keyLine => $valueLine)
                {
                    foreach (explode(';', $valueLine) as $key => $value)
                    {
                        if ($key === 3)
                        {
                            if ($value === $nim)
                            {
                                $extract = explode(';', $valueLine);
                                if ($extract[1] === 'X' AND $extract[2] === '-')
                                {
                                    deleteLineInFile($fileName, $lineOf[$keyLine]);
                                }
                            }
                        }
                    }
                }

                $result = json_encode(array('status' => 'masuk'));
            }
        }
    }
    elseif ($parameter === 'makan')
    {
        $fileName = './log/presensi-makan.log';
        $jamSekarang = date('H:i:s');
        $keteranganWaktu = null;
        if ($jamSekarang >= '00:00:00' AND $jamSekarang <= '12:00:00') { $keteranganWaktu = 'Pagi'; }
        if ($jamSekarang >= '12:00:01' AND $jamSekarang <= '15:00:00') { $keteranganWaktu = 'Siang'; }
        if ($jamSekarang >= '15:00:01' AND $jamSekarang <= '19:00:00') { $keteranganWaktu = 'Sore'; }
        if ($jamSekarang >= '19:00:01' AND $jamSekarang <= '23:59:59') { $keteranganWaktu = 'Malam'; }

        if (isset($nim))
        {
            $konten = "$waktu;$keteranganWaktu;$nim;success\r\n";
            $buka = fopen($fileName, 'a');
            fwrite($buka, $konten);
            $result = json_encode(array('status' => true));
        }
        else
        {
            $result = json_encode(array('status' => false));
        }
    }
    else
    {
        $result = json_encode(array('status' => null));
    }
}
else
{
    $result = json_encode(array('status' => null));
}

fclose($buka);

// Sumber: github.com/yjajkiew/php-delete-line-in-file.git
function deleteLineInFile($file, $string)
{
    $i=0;$array=array();

    $read = fopen($file, "r") or die("can't open the file");
    while(!feof($read)) {
        $array[$i] = fgets($read);
        ++$i;
    }
    fclose($read);

    $write = fopen($file, "w") or die("can't open the file");
    foreach($array as $a) {
        if(!strstr($a,$string)) fwrite($write,$a);
    }
    fclose($write);
}

echo $result;
