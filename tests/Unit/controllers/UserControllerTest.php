<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function http_redirect_guest_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/');
    }

    /** @test */
    public function http_status_dashboard()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }

    /** @test */
    public function http_status_user_found()
    {
        $user = factory(User::class)->create();

        $response = $this->get('/user/' . $user->id);

        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function http_status_user_not_found()
    {
        $response = $this->get('/user/' . 1000);

        $response->assertStatus(404);
    }
}
