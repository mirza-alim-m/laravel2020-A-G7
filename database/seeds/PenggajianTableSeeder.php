<?php

use Illuminate\Database\Seeder;
use App\Penggajian;

class PenggajianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $faker = Faker::create('id_ID');

        for($i=0;$i<100;$i++){
            Penggajian::create(['idkar'=>$i+209,'id_jenis'=>$i,'jam_lembur'=>"3",'total'=>"5000000",'tanggal'=>"2020-12-02"]);

        }
        
    }
}
