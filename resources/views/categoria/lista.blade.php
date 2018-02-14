@extends('layouts.layout')

@section('content')

<h1>Categorias</h1><br>

<ul class="list-group">		
	@foreach ($categorias as $categoria)		       
	<li class="list-group-item">	
		<h2><span class="label label-info">{{ $categoria->nombre }}</span></h2>
		<p>{{ $categoria->descripcion }}</p>
		<a href="{{ url('/categorias') }}/{{ $categoria->id }}/edit" class="btn btn-primary btn-sm">Editar</a>		
	</li>
	@endforeach	
	<br>

	<p><a href="{{ route('categorias.create') }}" class="btn btn-primary btn-sm">Añadir categoria</a></p>


</ul>

@stop
