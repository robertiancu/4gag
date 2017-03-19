<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Post;
use App\Comment;

class LikeControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_like_a_comment()
    {
        $user = factory(User::class)->create();
        $comment = factory(Comment::class)->create();

        $response = $this->actingAs($user)->json('POST', '/comment/' . $comment->id . '/like',[
            'post_id'=>$comment->post_id,
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function guest_cant_like_a_comment()
    {
        $comment = factory(Comment::class)->create();

        $response = $this->json('POST', '/comment/' . $comment->id . '/like',[
            'post_id'=>$comment->post_id,
        ]);

        $response->assertStatus(500);
    }

    /** @test */
    public function user_can_like_a_post()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();

        $response = $this->actingAs($user)->json('POST', '/post/' . $post->id . '/like',[]);

        $response->assertStatus(302);
    }

    /** @test */
    public function guest_cant_like_a_post()
    {
        $post = factory(Post::class)->create();

        $response = $this->json('POST', '/post/' . $post->id . '/like',[]);

        $response->assertStatus(500);
    }
}
