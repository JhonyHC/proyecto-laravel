<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaginaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pagina_dashboard()
    {
        $response = $this->get('/landingpage');

        $response->assertStatus(200);
        $response->assertSeeText(['100%','Hecha','Tienda de la Esquina']);
    }

    public function test_pagina_contacto()
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
    }
    
    /** @test */
    public function envio_formulario_contacto()
    {
        $response = $this->post('/contacto', [
            'name' => '',
            'email' => 'jonhatanMAL',
            'comentario' => 'as',
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name',
            'email',
            'comentario',
        ]);
    }

    /** @test */
    public function prellenado_formulario_contacto()
    {
        $response = $this->get('/contacto/1234');
        $response->assertStatus(200);
        $this->assertEquals('pepe',$response['nombre']);
    }
}
