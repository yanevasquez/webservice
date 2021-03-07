<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createCategories();
    }

    private function createCategories()
    {
        $amount = 15;
        for ($i = 1; $i < $amount; $i++) :
            $this->createCategory($i);
        endfor;
    }

    private function createCategory($index)
    {
        return Category::create([
            'id' => $index,
            'title' => 'category ' . $index,
        ]);
    }
}

