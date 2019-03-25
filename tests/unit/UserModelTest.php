<?php

use App\Comment;
use App\User;

class UserModelTest extends TestCase
{
    function test_author_own_a_post()
    {
        $comment = factory(Comment::class)->make();

        $this->assertTrue($comment->post->user->owns($comment->post));
    }

    function test_authors_do_not_have_a_own_post()
    {
        $user = factory(User::class)->make();

        $comment = factory(Comment::class)->make();

        $this->assertFalse($user->owns($comment->post));
    }
}
