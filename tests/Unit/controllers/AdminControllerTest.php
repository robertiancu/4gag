<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Admin;

class AdminControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function http_status_found_admins_list()
    {
        $response = $this->get('/admins');

        $response->assertStatus(200);
    }

    /** @test */
    public function http_status_found_reports()
    {
        $user = factory(User::class)->create();

        $admin = factory(Admin::class)
               ->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get('/reports');

        $response->assertStatus(200);
    }

    /** @test */
    public function redirect_reports_for_normal_users()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/reports');
        $response->assertRedirect('/');

        $response = $this->get('/reports');
        $response->assertRedirect('/');
    }

    /** @test */
    public function make_new_admin()
    {
        $user = factory(User::class)->create();

        $response = $this->json('POST', '/admins', ['user_id' => $user->id]);

        $response->assertStatus(200);

        $admin = Admin::where('user_id','=',$user->id)->first();

        $this->assertEquals($user->id, $admin->user->id);
    }

    /** @test */
    public function change_rank_of_admin()
    {
        $user = factory(User::class)->create();

        $admin = factory(Admin::class)
            ->create([
                'user_id' => $user->id,
                'rank' => 1
            ]);

        $response = $this->json('PUT', '/user/' . $user->id . '/setrank', ['setrank' => 1]);

        $admin = Admin::find($admin->id);

        $this->assertEquals($admin->rank, 2);
    }

    /** @test */
    public function delete_admin_from_admins_table()
    {
        $user = factory(User::class)->create();
        $admin = factory(Admin::class)->create(['user_id' => $user->id]);

        $response = $this->json('DELETE', '/user/' . $user->id . '/takeadmin', []);

        $this->assertEquals(Admin::find($admin->id), NULL);
    }

    /** @test */
    public function cant_change_rank_of_no_admin()
    {
        $user = factory(User::class)->create();

        $response = $this->json('PUT', '/user/' . $user->id . '/setrank', ['setrank' => 1]);

        $response->assertStatus(404);
    }

    /** @test */
    public function cant_take_admin_from_a_normal_user()
    {
        $user = factory(User::class)->create();

        $response = $this->json('DELETE', '/user/' . $user->id . '/takeadmin', []);

        $response->assertStatus(404);
    }
}
