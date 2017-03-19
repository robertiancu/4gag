<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;
use App\User;
use App\Admin;

class PostControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function http_status_found_hot()
    {
        $response = $this->get('/hot');

        $response->assertStatus(200);
    }

    /** @test */
    public function http_status_found_fresh()
    {

        $response = $this->get('/fresh');

        $response->assertStatus(200);
    }


    /** @test */
    public function http_status_found_newpost()
    {
        $response = $this->get('/newpost');

        $response->assertStatus(200);
    }

    /** @test */
    public function http_status_found_show_post()
    {
        $post = factory(Post::class)->create();

        $response = $this->get('/post/' . $post->id);

        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function http_status_post_not_found()
    {
        $response = $this->get('/post/' . 1000);

        $response->assertStatus(404);
    }


    /** @test */
    public function can_submit_a_post()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('POST', '/newpost/submit',[
            'category'=>1,
            'title'=>'test',
            'content'=>'test',
            'url'=>'https://i.vimeocdn.com/portrait/58832_300x300',
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function guest_cant_submit_a_post()
    {
        $response = $this->json('POST', '/newpost/submit',[
            'category'=>1,
            'title'=>'test',
            'content'=>'test',
            'url'=>'https://i.vimeocdn.com/portrait/58832_300x300',
        ]);

        $response->assertStatus(500);
    }

    /** @test */
    public function just_owner_can_delete_a_post()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->json('DELETE', '/post/' . $post->id . '/delete',['id'=>$post->id,]);

        $response->assertStatus(302);
    }

    /** @test */
    public function just_admin_can_delete_a_post()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['user_id' => $user->id + 1]);
        $admin = factory(Admin::class)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->json('DELETE', '/post/' . $post->id . '/delete',['id'=>$post->id,]);

        $response->assertStatus(302);
    }

    /** @test */
    public function normal_users_cant_delete_a_post_if_that_post_are_not_made_by_them()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['user_id' => $user->id-1]);

        $response = $this->actingAs($user)->json('DELETE', '/post/' . $post->id . '/delete',['id'=>$post->id,]);

        $response->assertStatus(500);
    }

    /** @test */
    public function every_user_can_report_a_post()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();

        $response = $this->actingAs($user)->json('POST', '/post/' . $post->id . '/report',[
            'post_id' => $post->id,
            'reason' => 'Adult content',
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function guests_cant_report_a_post()
    {
        $post = factory(Post::class)->create();

        $response = $this->json('POST', '/post/' . $post->id . '/report',[
            'post_id' => $post->id,
            'reason' => 'Adult content',
        ]);

        $response->assertStatus(500);
    }
}
