<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Favourite;
use App\Post;

class FavouriteControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function http_status_found_favourites()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/favourites');

        $response->assertStatus(200);
    }

    /** @test */
    public function http_status_not_found_favourites_for_guests()
    {
        $response = $this->get('/favourites');

        $response->assertRedirect('/');
    }

    /** @test */
    public function user_can_add_posts_to_favourites()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();

        $response = $this->actingAs($user)->json('POST','/addtofavourites',[
        'post_id' => $post->id,
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function guests_cant_add_posts_to_favourites()
    {
        $post = factory(Post::class)->create();

        $response = $this->json('POST','/addtofavourites',[
        'post_id' => $post->id,
        ]);

        $response->assertStatus(500);
    }

    /** @test */
    public function user_can_delete_only_his_favourites_post()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();
        $fav = factory(Favourite::class)->create([
            'post_id' => $post->id,
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->json('DELETE','/favourites/'. $fav->id . '/delete',[]);

        $response->assertStatus(302);
    }

    /** @test */
    public function another_user_cant_delete_your_favourites()
    {
        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();
        $fav = factory(Favourite::class)->create([
            'post_id' => $post->id,
            'user_id' => $user->id + 1,
        ]);

        $response = $this->actingAs($user)->json('DELETE','/favourites/'. $fav->id . '/delete',[]);

        $response->assertStatus(500);
    }
}
