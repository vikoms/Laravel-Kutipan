<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('subject');
            $table->bigInteger('quote_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();


            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');

            
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
        Schema::dropIfExists('quoteComments');
    }
}
