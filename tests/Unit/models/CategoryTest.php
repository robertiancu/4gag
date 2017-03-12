<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Category;
use App\Post;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_relation_with_posts()
    {
        $category = factory(Category::class)->create();

        $post = factory(Post::class)
              ->create(['category_id' => $category->id]);

        $post = Post::with(['category'])->find($post->id);

        $this->assertEquals($category->name, $post->category->name);
    }
}
