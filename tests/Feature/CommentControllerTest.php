<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
public function an_authenticated_user_can_create_a_comment_on_an_existing_post()
{
    $this->withoutExceptionHandling();

    // Crear usuario
    $user = User::factory()->create();

    // Crear un post
    $post = Post::factory()->create();

    // Autenticar el usuario
    $this->actingAs($user);

    // Data para el comentario
    $data = [
        'content' => 'Este es un nuevo comentario',
        'user_id' => $user->id,
        'post_id' => $post->id, // Agregar el id del post
    ];

    // Enviar una solicitud POST a la ruta de creación de comment
   
$response = $this->post("/post/{$post->id}/comments", $data);



    // Verificar que se creó el comment
    $this->assertDatabaseHas('comments', $data);
}
}
