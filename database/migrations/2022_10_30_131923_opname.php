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
        Schema::create('opname', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('stock');
            $table->string('catatan');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');;

            $table->foreign('barang_id')
                ->references('id')
                ->on('barang')
                ->onUpdate('cascade')
                ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opname');
    }
};
