<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('text');
            $table->string('email', 100);
            $table->string('city', 100);
            $table->string('address', 150);
            $table->string('phone', 11);
            $table->decimal('price', 8, 2);
            $table->decimal('price_new', 8, 2);
            $table->string('edit_token', 50);
            $table->integer('status');
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
        Schema::dropIfExists('ads');
    }
}
