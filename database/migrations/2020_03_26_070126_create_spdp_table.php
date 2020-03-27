<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpdpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spdp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor');
            $table->date('tanggal_spdp');
            $table->date('tanggal_terima');
            $table->integer('perkara_id');
            $table->integer('users_id');
            $table->text('pasal');
            $table->text('uraian');
            $table->string('lp');
            $table->date('t_lp');
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
        Schema::dropIfExists('spdp');
    }
}
