<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('idkar');
            $table->string('nama',50);
            $table->enum('jk',['laki-laki','perempuan']);
            $table->date('tl');
            $table->integer('no_rek');
            $table->string('nohp',20);
            $table->text('alamat');
            $table->string('jabatan',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
