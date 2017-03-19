<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;
use App\Comment;
use App\Admin;
use App\User;

class CommentControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function users_can_post_comment()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('POST', '/post/' . $post->id . '/comment',[
            'comment_text' => 'Comment here',
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function guest_cant_post_comment()
    {
        $post = factory(Post::class)->create();

        $response = $this->json('POST', '/post/' . $post->id . '/comment',[
            'comment_text' => 'Comment here',
        ]);

        $response->assertStatus(500);
    }

    /** @test */
    public function just_admins_can_delete_comments()
    {
        $user = factory(User::class)->create();
        $admin = factory(Admin::class)->create(['user_id' => $user->id]);
        $comment = factory(Comment::class)->create();

        $response = $this->actingAs($user)->json('DELETE', '/comment/' . $comment->id . '/delete',[
            'comment_text' => 'Comment here',
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function users_cant_delete_comments()
    {
        $user = factory(User::class)->create();
        $comment = factory(Comment::class)->create();

        $response = $this->actingAs($user)->json('DELETE', '/comment/' . $comment->id . '/delete',[
            'comment_text' => 'Comment here',
        ]);

        $response->assertStatus(500);
    }
}
