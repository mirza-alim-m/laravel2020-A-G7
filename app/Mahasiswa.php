<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primaryKey = 'nim';

    protected $fillable = [
    	'nim', 'nama', 'kelas', 'alamat'
    ];
}
