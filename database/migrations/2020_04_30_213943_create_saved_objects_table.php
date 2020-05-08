<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_objects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('api_id', 100);
            $table->string('name_object', 200);
            $table->string('type', 20);
            $table->string('timemark', 100)->nullable();
            $table->integer('season')->nullable();
            $table->integer('episode')->nullable();
            $table->integer('bookmark')->nullable();
            $table->integer('line')->nullable();
            $table->string('status', 25)->nullable();
            $table->boolean('favourite')->nullable();
            $table->integer('rating')->nullable();

            $table->timestamps();

            //$table->index('user_id', 'fk_user_id_idx1');
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
        Schema::dropIfExists('saved_objects');
    }
}
