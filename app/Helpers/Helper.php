<?php
namespace App\Helpers;


class Helper {
    function tanggal_indo($tanggal, $cetak_hari = true)
    {
        $hari = [
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $split = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }

    function getThisDay()
    {
        $hari = [
            1 => 'senin',
            'selasa',
            'rabu',
            'kamis',
            'jumat',
            'sabtu',
            'minggu',
        ];

        $num = date('N');
        return $hari[$num];
    }
}
