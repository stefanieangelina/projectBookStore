<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dtrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('dtrans', function (Blueprint $table) {
            $table->id();
            $table->integer('htrans_id');
            $table->integer('books_id');
            $table->integer('banyak');
            $table->integer('satuan');
            $table->integer('jumlah');


            // Foreign Keys
            //test

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dtrans');
    }
}
