<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Penggajian;

class Data extends Model
{
     //
     
     protected $primaryKey = 'idkar';
     protected $fillable = ['idkar','nama', 'jk','tl','no_rek','nohp','alamat','jabatan'];

     public function data() {
          return $this->hasMany(Penggajian::class, 'idkar');
      }
}
