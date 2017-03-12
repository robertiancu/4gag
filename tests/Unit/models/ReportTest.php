<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;
use App\Report;
use App\User;

class ReportTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_relation_with_post()
    {
        $post = factory(Post::class)->create();

        $report = factory(Report::class)
                 ->create(['post_id' => $post->id]);

        $report = Report::with(['post'])->find($report->id);

        $this->assertEquals($post->id, $report->post->id);
    }

    /** @test */
    public function test_relation_with_user()
    {
        $user = factory(User::class)->create();

        $report = factory(Report::class)
                 ->create(['user_id' => $user->id]);

        $report = Report::with(['user'])->find($report->id);

        $this->assertEquals($user->id, $report->user->id);
    }
}
