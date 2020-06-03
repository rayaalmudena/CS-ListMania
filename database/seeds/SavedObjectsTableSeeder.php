<?php

use Illuminate\Database\Seeder;
use App\SavedObject;
class SavedObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\SavedObject::class,80)->create();
    }
}
