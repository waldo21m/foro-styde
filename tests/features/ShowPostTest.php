<?php

class ShowPostTest extends FeatureTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_see_the_post_details()
    {
        // Having
        $user = $this->defaultUser([
            'name' => 'Eduardo Marquez',
        ]);

        $post = $this->createPost([
            'title' => 'Este es el titulo del post',
            'content' => 'Este es el contenido del post',
            'user_id' => $user->id,
        ]);

        // When
        $this->visit($post->url)
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see('Eduardo Marquez');
    }

    function test_old_urls_are_redirected()
    {
        // Having
        $post = $this->createPost([
            'title' => 'Old title',
        ]);

        $url = $post->url;

        $post->update(['title' => 'New title']);
        // When
        $this->visit($url)
            ->seePageIs($post->url);
    }

    /**
     * Esta prueba la comentaremos ya que haremos uso de una nueva funcionalidad.
     * Una que permita buscar las url viejas y las redireccione a las nuevas url.
     */
    //function test_post_url_with_wrong_slug_still_work()
    //{
    //    // Having
    //    $user = $this->defaultUser([
    //        'name' => 'Eduardo Marquez',
    //    ]);
    //
    //    $post = factory(\App\Post::class)->make([
    //        'title' => 'Old title',
    //    ]);
    //
    //    $user->posts()->save($post);
    //
    //    $url = $post->url;
    //
    //    $post->update(['title' => 'New title']);
    //
    //    // When
    //    //$this->visit($url)
    //    //    ->assertResponseStatus(200)
    //    //    //También podemos usar
    //    //    //->assertResponseOk()
    //    //    ->see('New title');
    //
    //    /**
    //     * Esto anterior no debería funcionar porque un usuario puede ingresar un
    //     * slug random y la página seguiría funcionando. Es por ello que debería
    //     * retornar entonces es un error 404
    //     */
    //
    //    // When
    //    $this->get($url)
    //        ->assertResponseStatus(404);
    //}
}
