<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $categorias = Categoria::all();

        return view('categoria/lista', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('categoria/nueva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $datos = $request->validate([
            'nombre' => 'required|string|max:50', 
            'descripcion' => 'required|string|max:255'
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $datos['nombre'];
        $categoria->descripcion = $datos['descripcion'];
        $categoria->save();
        return $this->index();
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $categoria = Categoria::findOrFail($id);

        return view('categoria/editar', compact('categoria'));        
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
            'nombre' => 'required|string|max:50', 
            'descripcion' => 'required|string|max:255'
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $datos['nombre'];
        $categoria->descripcion = $datos['descripcion'];
        $categoria->save();
        return $this->index();

    }

}
