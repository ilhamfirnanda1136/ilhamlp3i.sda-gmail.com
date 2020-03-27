<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTersangkaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tersangka', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('tempat_lahir');
            $table->string('umur_tanggal');
            $table->integer('kelamin');
            $table->string('kewarganegaraan');
            $table->string('tempat_tinggal');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('lain-lain');
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
        Schema::dropIfExists('tersangka');
    }
}
