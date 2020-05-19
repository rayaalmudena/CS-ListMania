<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('review_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            //$table->index('review_id', 'fk_review_id');
            $table->foreign('review_id')
                ->references('id')->on('reviews')
                ->onDelete('cascade');

            //$table->index('user_id', 'fk_user_id_idx3');
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
        Schema::dropIfExists('likes_reviews');
    }
}
