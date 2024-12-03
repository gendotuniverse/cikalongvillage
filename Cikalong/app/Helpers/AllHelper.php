<?php
namespace App\Helpers;
 
class AllHelper {

    public static function rupiah($rupiah) {
        $hasil = 'Rp'.number_format($rupiah, 0, ',', '.');

        return $hasil;
    }

    public static function rupiah_v2($rupiah) {
        $hasil = 'Rp'.number_format($rupiah, 2, ',', '.');

        return $hasil;
    }

    public static function bulan() {
        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );

        return $bulan;
    }

    public static function tanggal($tanggal) {
        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );

        $hasil = date('d', strtotime($tanggal)).' '.$bulan[date('m', strtotime($tanggal))].' '.date('Y', strtotime($tanggal));

        return $hasil;
    }
}