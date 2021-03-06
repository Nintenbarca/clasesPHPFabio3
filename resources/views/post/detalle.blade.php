@extends('layouts.layout')

@section('content')

<?php

use App\Categoria;
use App\User;

?>

<ul class="list-group">				       
	<li class="list-group-item">	
		<h2>{{ $post->titulo }}</h2>
		<p>Autor: {{ User::findOrFail($post->user_id)->name }}</p>
		<p>{{ $post->palabras }}</p>
		<p>{{ $post->contenido }}</p>
		<p>{{ $post->created_at->format('d/m/Y') }}</p>		
		<p><span class="label label-info">{{ Categoria::findOrFail($post->categoria)->nombre }}</span></p>

		@if(!Auth::guest() && $post->user_id == Auth::user()->id)

		<p><a href="{{ url('/posts') }}/{{ $post->id }}/edit" class="btn btn-primary btn-sm">Editar</a></p>
		{{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) }}
		{{ Form::submit('Borrar', array('class' => 'btn btn-danger btn-sm')) }}
		{{ Form::close() }}

		@endif
	</li>
</ul>

@stop