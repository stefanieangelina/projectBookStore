<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('blurb',255);
            $table->integer('stock');
            $table->integer('rating');
            $table->string('language', 255);
            $table->integer('buy_price');
            $table->integer('sell_price');
            $table->integer('discount');
            $table->string('writer',255);
            $table->string('image',255)->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Foreign Keys
            //  $table->foreignId('user_id')->constrained();
             $table->foreignId('genre_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
