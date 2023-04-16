<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;


class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_new_post()
    {
        $this->withoutExceptionHandling();
    
        // Crear un usuario de prueba
        $user = User::factory()->create();
    
        // Autenticar al usuario de prueba
        $this->actingAs($user);
    
        // Datos para crear un nuevo post
        $data = [
            'title' => 'Nuevo Post',
            'description' => 'Este es un nuevo post de prueba',
            'user_id' => $user->id,
        ];
    
        // Enviar una solicitud POST a la ruta de creación de post
        $response = $this->post('/post', $data);
    
        // Obtener el post recién creado
        $post = Post::where($data)->first();
    
        // Comprobar que el post ha sido creado
        $this->assertNotNull($post);
    
     
    }
    
    
}

