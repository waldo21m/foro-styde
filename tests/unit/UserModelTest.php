<?php

use App\Comment;
use App\Post;
use App\User;

class UserModelTest extends TestCase
{
    // Solución al ejercicio de la lección 20
    function test_author_own_a_post()
    {
        $comment = factory(Comment::class)->make();

        $this->assertTrue($comment->post->user->owns($comment->post));
    }

    function test_authors_does_not_have_a_own_post()
    {
        $user = factory(User::class)->make();

        $comment = factory(Comment::class)->make();

        $this->assertFalse($user->owns($comment->post));
    }

    // Solución al ejercicio de la lección 20 propuesta por la comunidad
    function test_user_owner_of_model_owns_the_model()
    {
        $user = new User();
        $user->id = 1;
        $post = new Post();
        $post->user_id = $user->id;
        $this->assertTrue($user->owns($post));
    }
    function test_user_non_owner_of_model_does_not_own_the_model()
    {
        $user = new User();
        $user->id = 1;
        $post = new Post();
        $post->user_id = 2;
        $this->assertFalse($user->owns($post));
    }
}
