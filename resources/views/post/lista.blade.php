@extends('layouts.layout')

@section('content')

<h1>Posts</h1><br>

<ul class="list-group">		
	@foreach ($posts as $post)		       
	<li class="list-group-item">	
		<h2>{{ $post->titulo }}</h2>
		<p>{{ $post->resumen }}</p>
		<p>{{ $post->fecha }}</p>		
		<p><span class="label label-info">{{ $categoria->nombre }}</span></p>
	</li>
	@endforeach	
	<br>

	<p><a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Añadir post</a></p>


</ul>

@stop