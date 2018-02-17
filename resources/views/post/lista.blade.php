@extends('layouts.layout')

@section('content')

<?php

use App\Categoria;

?>

<h1>Posts</h1><br>

<ul class="list-group">		
	@foreach ($posts as $post)		       
	<li class="list-group-item">	
		<h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->titulo }}</a></h2>
		<p>{{ $post->resumen }}</p>
		<p>{{ $post->created_at->format('d/m/Y') }}</p>		
		<p><span class="label label-info">{{ Categoria::findOrFail($post->categoria)->nombre }}</span></p>		
	</li>
	@endforeach	
	<br>

	<p><a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Añadir post</a></p>


</ul>

@stop