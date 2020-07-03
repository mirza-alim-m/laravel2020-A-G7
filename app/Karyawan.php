<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penggajian;

class Karyawan extends Model
{
    protected $primaryKey = 'id_jenis';

    protected $fillable = [
    	'id_jenis','Jabatan', 'Gaji_Karyawan','gambar','pdf'
    ];
    public function Gaji() {
        return $this->hasMany(Penggajian::class, 'id_jenis');
    }
}

