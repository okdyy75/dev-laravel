<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function testRelation()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);
        $comment = Comment::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertEquals($post->id, $user->posts[0]->id);
        $this->assertEquals($comment->id, $user->comments[0]->id);
    }
}
