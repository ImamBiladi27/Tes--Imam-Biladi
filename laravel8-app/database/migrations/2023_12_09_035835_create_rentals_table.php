<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->unsignedBigInteger('mobil_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('mobil_id')->references('id')->on('mobils')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('userss')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
