<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        if (!Auth::guest()) {
            
            $categorias = Categoria::all();

            return view('categoria/lista', compact('categorias'));
        }else{

            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        if (!Auth::guest()) {

            return view('categoria/nueva');
        }else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        if (!Auth::guest()) {
            
            $datos = $request->validate([
            'nombre' => 'required|string|max:50', 
            'descripcion' => 'required|string|max:255'
            ]);

            $categoria = new Categoria();
            $categoria->nombre = $datos['nombre'];
            $categoria->descripcion = $datos['descripcion'];
            $categoria->save();
            return $this->index();
        }else{
            return redirect('/login');
        }
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        if (!Auth::guest()) {
            
            $categoria = Categoria::findOrFail($id);

            return view('categoria/editar', compact('categoria'));
        }else{
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        if (!Auth::guest()) {
            
            $datos = $request->validate([
            'nombre' => 'required|string|max:50', 
            'descripcion' => 'required|string|max:255'
            ]);

            $categoria = Categoria::findOrFail($id);
            $categoria->nombre = $datos['nombre'];
            $categoria->descripcion = $datos['descripcion'];
            $categoria->save();
            return $this->index();
        }else{
            return redirect('/login');
        }
    }

}
