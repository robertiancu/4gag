<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Category;

class CategoryControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function http_status_found_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->get('/category/' . $category->category_name);

        $response->assertStatus(200);
    }

    /** @test */
    public function http_status_post_not_found()
    {
        $response = $this->get('/category/' . 'iHopeThereIsNoCategoryWithThisLongAndWeirdName');

        $response->assertStatus(404);
    }
}
