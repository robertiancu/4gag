<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Post;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_relation_with_user()
    {
        $user = factory(User::class)->create();

        $post = factory(Post::class)
                 ->create(['user_id' => $user->id]);

        $post = Post::with(['user'])->find($post->id);

        $this->assertEquals($user->id, $post->user->id);
    }
}
