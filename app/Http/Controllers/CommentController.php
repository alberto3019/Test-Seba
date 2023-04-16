<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\actualizacion;
use App\Http\Requests\create;
use App\Models\Comment;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'content' => 'required|max:255',
        'user_id' => 'required|exists:users,id',
    ]);

    // Crear un nuevo comentario
    $comment = new Comment();
    $comment->content = $validatedData['content'];
    $comment->user_id = $validatedData['user_id'];
    $comment->post_id = $postId;

    // Guardar el comentario en la base de datos
    $comment->save();

    // Redirigir de vuelta a la página del post
    return redirect()->route('post.show', ['id' => $postId]);

}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(actualizacion $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
