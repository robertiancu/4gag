<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Comment;
use App\Like;
use App\Post;
use App\User;

class CommentTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_relation_with_post()
    {
        $post = factory(Post::class)->create();

        $comment = factory(Comment::class)
                 ->create(['post_id' => $post->id]);

        $comment = Comment::with(['post'])->find($comment->id);

        $this->assertEquals($post->title, $comment->post->title);
    }

    /** @test */
    public function test_relation_with_user()
    {
        $user = factory(User::class)->create();

        $comment = factory(Comment::class)
                 ->create(['user_id' => $user->id]);

        $comment = Comment::with(['user'])->find($comment->id);

        $this->assertEquals($user->name, $comment->user->name);
    }

    /** @test */
    public function likes_grow_when_user_hit_like_button()
    {
        $user = factory(User::class)->create();
        $comment = factory(Comment::class)
                 ->create(['likes' => 0]);

        $comment->likeUp($user->id,$comment->id);
        $this->assertEquals($comment->likes, 1);
    }

    /**
     * @test
     * @expectedException App\Exceptions\DoubleLikeException
     */
    public function an_user_can_like_a_comment_just_once()
    {
        $user = factory(User::class)->create();
        $comment = factory(Comment::class)
                 ->create(['likes' => 0]);

        $comment->likeUp($user->id,$comment->id);
        $comment->likeUp($user->id,$comment->id);
    }
}
