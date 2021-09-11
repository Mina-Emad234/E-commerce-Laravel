<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class SubCategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(2)->create([
            'parent_id'=> $this -> getRandomParentId(),
        ]);
    }
    private function getRandomParentId(){
       return Category::inRandomOrder()->first();
    }
}
