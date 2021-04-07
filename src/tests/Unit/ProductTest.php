<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function check_if_it_can_store_a_new_product()
    {
        $product = [
            'title' => $this->faker->word,
            'description' => $this->faker->word,
            'category_id'=> random_int(1, 10)
        ];
        $this->postJson('api/v1/products', $product)
            ->assertStatus(201)
            ->assertJson($product);
    }
    /**
     * @test
     */
    public function check_if_it_can_update_product()
    {
        $product = factory(Product::class)->create();
        $data = [
            'title' => $this->faker->word,
            'description' => $this->faker->word

        ];
        $this->putJson('api/v1/products/' . $product->id, $data)
            ->assertStatus(200)
            ->assertJson($data);
    }
    /**
     * @test
     */
    public function check_if_it_can_delete_product()
    {
        $product = factory(Product::class)->create();
        $this->deleteJson('api/v1/products/' . $product->id)
            ->assertStatus(204);
    }
}
