<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListmaniaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_object', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('api_id', 100);
            $table->string('type', 10);
            $table->string('timemark', 100)->nullable();
            $table->integer('episode')->nullable();
            $table->integer('bookmark')->nullable();
            $table->integer('line')->nullable();
            $table->string('status', 10)->nullable();
            $table->boolean('favourite')->nullable();
            $table->integer('rating')->nullable();

            $table->timestamps();

            //$table->index('user_id', 'fk_user_id_idx1');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');                
        });

         Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('saved_object_id')->unsigned();
            $table->string('title',50);
            $table->longText('text',500);
            $table->timestamps();

            //$table->index('user_id', 'fk_user_id_idx2');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            //$table->index('saved_object_id', 'fk_saved_object_id');
            $table->foreign('saved_object_id')
                ->references('id')->on('saved_object')
                ->onDelete('cascade');
        });

          Schema::create('likes_review', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('review_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            //$table->index('review_id', 'fk_review_id');
            $table->foreign('review_id')
                ->references('id')->on('review')
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
        Schema::dropIfExists('likes_review');
        Schema::dropIfExists('review');
        Schema::dropIfExists('saved_object');
        
        
    }
}
