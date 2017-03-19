<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Admin;
use App\User;

class AdminTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_relation_with_user()
    {

        $user = factory(User::class)->create();

        $admin = factory(Admin::class)
                ->create(['user_id' => $user->id]);

        $admin = Admin::with(['user'])->find($admin->id);

        $this->assertEquals($user->name, $admin->user->name);
    }

    /** @test */
    public function rank_up_an_admin()
    {
        $admin = factory(Admin::class)->create(['rank'=> 2]);
        $admin->rankUp();

        $this->assertEquals($admin->rank,3);
    }

    /** @test */
    public function rank_down_an_admin()
    {
        $admin = factory(Admin::class)->create(['rank'=> 2]);
        $admin->rankDown();

        $this->assertEquals($admin->rank,1);
    }

    /**
     * @test
     * @expectedException App\Exceptions\RankOverflowException
     */
    public function limit_of_rank_up_an_admin()
    {
        $admin = factory(Admin::class)->create(['rank'=> 3]);
        $admin->rankUp();

    }

    /**
     * @test
     * @expectedException App\Exceptions\RankOverflowException
     */
    public function limit_of_rank_down_an_admin()
    {
        $admin = factory(Admin::class)->create(['rank'=> 1]);
        $admin->rankDown();

    }
}
