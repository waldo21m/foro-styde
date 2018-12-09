<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * El problema de este Trait es que si tenemos muchísimas migraciones, las
     * pruebas van a ser demasiada lentas. Es por ello que es conveniente usar
     * el otro Trait.
     */
    //use DatabaseMigrations;

    /**
     * El detalle de este Trait es que debemos correr las migraciones UNA SOLA
     * VEZ de forma manual, ejecutando: php artisan migrate --database=mysql_tests
     */
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'Eduardo Marquez',
            'email' => 'eduardo20.3263@gmail.com'
        ]);

        $this->actingAs($user, 'api')
             ->visit('api/user')
             ->see('Eduardo Marquez')
             ->see('eduardo20.3263@gmail.com');

        /**
         * Esto último resulta muy inteligente pero es importante que para el
         * Testing no dependamos de valores aleatorios
         */

        //$user = factory(\App\User::class)->create();
        //
        //$this->actingAs($user, 'api')
        //    ->visit('api/user')
        //    ->see($user->name);
    }
}
