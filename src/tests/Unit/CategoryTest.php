<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    public function test_check_if_it_can_store_a_new_category()
    {
        $category = [
            'title' => $this->faker->word,
        ];
        $this->postJson('api/categories', $category)
            ->assertStatus(201)
            ->assertJson($category);
    }

    public function test_check_if_it_can_update_category()
    {
        $category = factory(Category::class)->create();
        $data = [
            'title' => $this->faker->word
        ];
        $this->putJson('api/categories/'. $category->id, $data)
            ->assertStatus(200)
            ->assertJson($data);
    }
    
    public function test_check_if_it_can_delete_category()
    {
        $category = factory(Category::class)->create();
        $this->deleteJson('api/categories/' . $category->id)
            ->assertStatus(204);
    }
}
