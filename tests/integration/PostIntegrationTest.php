<?php

use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostIntegrationTest extends TestCase
{
    use DatabaseTransactions;

    function test_a_slug_is_generated_and_saved_to_the_database()
    {
        $user = $this->defaultUser();

        $post = factory(Post::class)->make([
            'title' => 'Como instalar Laravel'
        ]);

        $user->posts()->save($post);

        $this->seeInDatabase('posts', [
            'slug' => 'como-instalar-laravel'
        ]);

        $this->assertSame('como-instalar-laravel', $post->slug);

        // Esto es el equivalente a traerse el registro de la base de datos de esta manera
        // $post = Post::first();

        $this->assertSame('como-instalar-laravel', $post->fresh()->slug);
    }

    function test_get_a_url_attribute_correctly()
    {
        $user = $this->defaultUser();

        $post = factory(Post::class)->make([
            'title' => 'Generar el atributo url'
        ]);

        $user->posts()->save($post);

        $this->seeInDatabase('posts', [
            'slug' => 'generar-el-atributo-url'
        ]);

        $this->assertSame('generar-el-atributo-url', $post->slug);

        $this->assertSame(route('posts.show', [$post->id, 'generar-el-atributo-url']), $post->url);
    }
}
