<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Data;

class KaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i < 25; $i++){

            // insert data ke table pegawai menggunakan Faker
            Data::create([
                'nama'=>$faker->name,
                 'jk'=>$faker->randomElement($array = array('laki-laki', 'perempuan')),
                 'tl'=>$faker->dateTimeThisCentury()->format('Y-m-d'),
                 'no_rek'=>'187827872'+$i,
                 'nohp'=>$faker->phoneNumber,
                 'alamat'=>$faker->address,
                 'jabatan'=>$faker->jobTitle
                 ]);

      }
        //
    }
}
