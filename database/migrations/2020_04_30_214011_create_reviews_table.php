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
            $table->bigInteger('saved_object_id')->unsigned();
            $table->string('title',80);
            $table->longText('text',900);
            $table->timestamps();

            //$table->index('user_id', 'fk_user_id_idx2');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            //$table->index('saved_object_id', 'fk_saved_object_id');
            $table->foreign('saved_object_id')
                ->references('id')->on('saved_objects')
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
