<?php

namespace App\Models;

class UniqueKeyModel
{

    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function generateUniqueKey(...$data)
    {

        $nomer = 1;
        for ($i = 0; $i <= $nomer; $i++) {
            if ($data[0]['table'] === 'employees')
                $unikPK = self::NomerInduk($data[0]['table'], $nomer, $data);

            // if ($data['table'] == "user")
            //     // $unikPK = $this->UserPrimaryKey($nomer, $data);
            // elseif ($data['table'] == "guru")
            //     $unikPK = self::NomerInduk('guru', $nomer, $data);
            // elseif ($data['table'] == "siswa")
            //     // $unikPK = $this->NomerInduk('siswa', $nomer, $data);
            // else if ($data['table'] == "mata_pelajaran")
            //     // $unikPK = $this->DeviasiAbjad($data['table'], $nomer, $data);
            // elseif ($data['table'] == "rapor")
            //     // $unikPK = $this->UrutanKode('rapor', $nomer, $data);
            // else if ($data['table'] == "jadwal")
            //     // $unikPK = $this->UrutanKode('jadwal', $nomer, $data);
            else
                //buat kondisi kalo tabel tidak ditemukan menggunakan sweetalert
                $unikPK = 0;
            $query = $this->db->table($data[0]['table'])
                ->where($data[0]['pk'], $unikPK)
                ->orderBy($data[0]['pk'], 'ASC')
                ->get();
            $result = $query->getLastRow();
            if (!is_null($result))
                $nomer += 1;
            else
                return $unikPK;
        }
    }

    private static function NomerInduk($actor, $nomer, $data)
    {

        $validNum = array_map(function ($number) {
            return str_pad($number, 2, '0', STR_PAD_LEFT);
        }, explode('-', $data[1]));

        if ($actor == "employees") {
            return implode("", $validNum) . substr(date("Y"), 2) .  sprintf("%02s", $nomer);
        }
    }

    // private function UrutanKode($tabel, $nomer, $data)
    // {
    //     if ($tabel == "rapor")
    //         return substr($data, 4, 5) . sprintf("%03s", $nomer);
    //     else if ($tabel == "jadwal")
    //         return  substr($data[0], -4) . sprintf("%02s", substr($data[1], 0, 1)) . sprintf("%02s", $nomer);
    // }

    // private function UserPrimaryKey($nomer, $data)
    // {
    //     //extract($data, EXTR_PREFIX_SAME, "dkk");

    //     return "U" . substr($data[0], 0, 1) . substr($data[1], 0, 1) . sprintf("%04s", $nomer);
    // }

    // private function DeviasiAbjad($tabel, $nomer, $data)
    // {
    //     if ($tabel == "mata_pelajaran") {
    //         return "MPL" . substr($data, 0, 1) . $nomer;
    //     }
    // }

    // protected function countRows()
    // {
    //     // Lakukan penghitungan jumlah baris pada tabel yang relevan
    //     // Anda dapat menyesuaikan logika ini sesuai dengan kebutuhan aplikasi Anda
    //     // Contoh: $count = $db->table('tabel_relevan')->countAll();
    //     $count = 10; // Contoh angka 10

    //     return $count;
    // }
}
