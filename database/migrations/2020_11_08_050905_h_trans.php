<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htrans', function (Blueprint $table) {
            $table->id();
            $table->string('cara_pembayaran',20);
            $table->integer('total');
            $table->string('file_bukti',255);
            $table->softDeletes();
            $table->timestamps();
            $table->integer('status');

            // Foreign Keys
            $table->foreignId('user_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('htrans');
    }
}
