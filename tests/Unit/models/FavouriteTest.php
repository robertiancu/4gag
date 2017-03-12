<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Favourite;
use App\Post;
use App\User;

class FavouriteTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_relation_with_post()
    {
        $post = factory(Post::class)->create();

        $favourite = factory(Favourite::class)
                 ->create(['post_id' => $post->id]);

        $favourite = Favourite::with(['post'])->find($favourite->id);

        $this->assertEquals($post->id, $favourite->post->id);
    }

    /** @test */
    public function test_relation_with_user()
    {
        $user = factory(User::class)->create();

        $favourite = factory(Favourite::class)
                 ->create(['user_id' => $user->id]);

        $favourite = Favourite::with(['user'])->find($favourite->id);

        $this->assertEquals($user->id, $favourite->user->id);
    }
}
