<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Karyawan;

class GajiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=0;$i<100;$i++){
            Karyawan::create([
                'Jabatan'=> $faker->jobTitle,
                'Gaji_Karyawan'=> $faker->numberBetween(500000,5000000)
            ]);
        }
    }
}
