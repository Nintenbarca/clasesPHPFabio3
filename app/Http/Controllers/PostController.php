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
        $post->slug = implode('_', explode(' ', $datos['titulo']));
        $post->resumen = $datos['resumen'];
        $post->contenido = $datos['contenido'];
        $post->categoria = $datos['categoria'];
        $post->palabras = $datos['palabras'];  
        $post->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
        $post = Post::findOrFail($id);

        return view('post/detalle', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $post = Post::findOrFail($id);

        return view('post/editar', compact('post')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $datos = $request->validate([
            'titulo' => 'required|string|max:50', 
            'resumen' => 'required|string|max:100', 
            'contenido' => 'required|string|max:255', 
            'categoria' => 'required',             
            'palabras' => 'required|string|max:100'
        ]);

        $post = Post::findOrFail($id);
        $post->titulo = $datos['titulo'];
        $post->resumen = $datos['resumen'];
        $post->contenido = $datos['contenido'];
        $post->categoria = $datos['categoria'];
        $post->palabras = $datos['palabras'];        
        $post->save();
        $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $post = Post::findOrFail($id);
        $post->delete();
        return $this->index();
    }
}
