<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    // Membuat Format Rupiah
    function rupiah($total){
        return number_format($total,0);
    }

    // Convert tanggal sesuai format MySQL
    function convert_date_db($date){
        $exp = explode('/',$date);
        if(count($exp) == 3) {
            $date = $exp[2].'-'.$exp[1].'-'.$exp[0];
        }
        return $date;
    }

    // Merubah tanggal menjadi format MySQL/Database
    if (!function_exists('fix_date')) {
        function fix_date($date, $format = 'Y-m-d')
        {
            if (!empty($date)) {
                $date = str_replace('/', '-', $date);
                return date($format, strtotime($date));
            }
            return '';
        }
    }

    // Angka Terbilang
    function terbilang($x){
        $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if ($x < 12)
        return " " . $abil[$x];
        elseif ($x < 20)
            return Terbilang($x - 10) . " Belas";
        elseif ($x < 100)
            return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
        elseif ($x < 200)
            return " Seratus" . Terbilang($x - 100);
        elseif ($x < 1000)
            return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
        elseif ($x < 2000)
            return " Seribu"  . Terbilang($x - 1000);
        elseif ($x < 1000000)
            return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
        elseif ($x < 1000000000)
            return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
    }
    //* End of file my_helper.php */
    /* Location: ./application/helpers/my_helper.php */
?>