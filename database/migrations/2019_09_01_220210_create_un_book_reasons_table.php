<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnBookReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('un_book_reasons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('room_id');
            $table->integer('user_id');
            $table->time('from');
            $table->time('to');
            $table->date('day');
            $table->string('reason');
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
        Schema::dropIfExists('un_book_reasons');
    }
}
