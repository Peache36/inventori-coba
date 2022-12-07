<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('group_id');
            $table->string('no_do');
            $table->integer('qty');
            $table->string('disetujui_oleh');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('barang_id')
                ->references('id')
                ->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
};
