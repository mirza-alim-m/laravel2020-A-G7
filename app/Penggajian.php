<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Karyawan;
use App\Data;

class Penggajian extends Model
{
    protected $primaryKey = 'id_gaji';

    protected $fillable = [
    	'id_gaji', 'idkar', 'id_jenis', 'total', 'jam_lembur', 'tanggal','gambar','pdf'
    ];
    public function Gaji_karyawan() {
        return $this->belongsTo(Karyawan::class, 'id_jenis');
    }
    public function Penggajian_karyawan() {
        return $this->belongsTo(Data::class, 'idkar');
    }
}
