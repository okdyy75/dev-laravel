<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    public function testRelation()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);
        $comment = Comment::factory()->create([
            'post_id' => $post->id
        ]);

        $this->assertEquals($user->id, $post->user->id);
        $this->assertEquals($comment->id, $post->comments[0]->id);
    }
}
