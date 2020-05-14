<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->longText('api_id');
            $table->longText('type');

            $table->string('title',80);
            $table->longText('text',900);
            $table->timestamps();

            //$table->index('user_id', 'fk_user_id_idx2');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
