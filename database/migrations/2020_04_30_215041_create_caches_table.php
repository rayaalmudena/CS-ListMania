<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caches', function (Blueprint $table) {
            $table->id();
            $table->longText('api_id');
            $table->longText('type');

            $table->longText('title');
            $table->longText('awards')->nullable();
            $table->longText('country')->nullable();
            $table->longText('director')->nullable();
            $table->longText('writer')->nullable();
            $table->longText('actors')->nullable();
            $table->longText('genre')->nullable();
            $table->longText('language')->nullable();
            $table->longText('plot')->nullable();
            $table->longText('image')->default("https://www.fcmlindia.com/images/fifty-days-campaign/no-image.jpg");
            $table->longText('rated')->nullable();
            $table->longText('runtime')->nullable();
            $table->longText('released')->nullable();
           
            $table->longText('authors')->nullable();
            $table->longText('publisher')->nullable();
            $table->longText('pages')->nullable();

            //MOVIE AND SHOWS APi NAMES
                // Title--
                // Awards--
                // Country--
                // Director --
                // Writer --
                // Actors--
                // Genre--
                // Language--
                // Plot--
                // Poster--
                // Rated --
                // Released --
                // Runtime--
                // Type --
                // imdbID--


            //BOOKS API NAMES
                // accessInfo.country--    
                // id--
                // volumeInfo.title--
                // volumeInfo.authors--
                // volumeInfo.categories--
                // volumeInfo.description --
                // volumeInfo.imageLinks.medium--
                // volumeInfo.language--
                // volumeInfo.maturityRating--
                // volumeInfo.pageCount--
                // volumeInfo.publisher --
                // volumeInfo.publishedDate --


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
        Schema::dropIfExists('caches');
    }
}
