<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categoria;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $posts = Post::all();
        //$categoria = Categoria::findOrFail($id);

        return view('post/lista', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $categorias = Categoria::all();
        
        return view('post/nuevo', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $datos = $request->validate([
            'titulo' => 'required|string|max:50', 
            'resumen' => 'required|string|max:100', 
            'contenido' => 'required|string|max:255', 
            'categoria' => 'required',             
            'palabras' => 'required|string|max:100'
        ]);

        $post = new Post();
        $post->titulo = $datos['titulo'];
        $post->resumen = $datos['resumen'];
        $post->contenido = $datos['contenido'];
        $post->categoria = $datos['categoria'];
        $post->palabras = $datos['palabras'];  
        $post->fecha = time()+3600;      
        $post->save();
        $this->index();
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
    public function update(Request $request, $id)
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
