<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Like;
use App\User;

class LikeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_relation_with_user()
    {
        $user = factory(User::class)->create();

        $like = factory(Like::class)
                 ->create(['user_id' => $user->id]);

        $like = Like::with(['user'])->find($like->id);

        $this->assertEquals($user->id, $like->user->id);
    }
}
