<?php

$parameter = $_GET['jenis'];
if (isset($parameter))
{
    $fileName = null;
    switch ($parameter)
    {
        case 'harian':
            $fileName = './log/presensi-harian.log';
            break;
        case 'izin':
            $fileName = './log/presensi-izin.log';
            break;
        case 'makan':
            $fileName = './log/presensi-makan.log';
            break;
        default:
            $fileName = false;
            break;
    }

    if ($fileName === false)
    {
        return header('location: index.html');
    }

    header('Content-Type: text/plain; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . basename($fileName));
    header('Content-Length: ' . filesize($fileName));
    readfile($fileName);
    exit();
}
else
{
    return header('location: index.html');
}