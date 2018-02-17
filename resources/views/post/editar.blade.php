@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Post</div>

                <div class="panel-body">
                    {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('titulo', 'Titulo') }}
                            </div>
                            <div class="col-md-9">
                                {{ Form::text('titulo', $post->titulo, array('class' => 'form-control')) }}

                                @if ($errors->has('titulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('resumen') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('resumen', 'Resumen') }}
                            </div>
                            <div class="col-md-9">
                                {{ Form::text('resumen', $post->resumen, array('class' => 'form-control')) }}

                                @if ($errors->has('resumen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resumen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contenido') ? ' has-error' : '' }}">
                            <div class="col-md-3"> 
                                {{ Form::label('contenido', 'Contenido') }}
                            </div>
                            <div class="col-md-9">
                                {{ Form::text('contenido', $post->contenido, array('class' => 'form-control'))}}

                                @if ($errors->has('contenido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contenido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group{{ $errors->has('palabras') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('palabras', 'Palabras') }}
                            </div>
                            <div class="col-md-9">
                                {{ Form::text('palabras', $post->palabras, array('class' => 'form-control')) }}

                                @if ($errors->has('palabras'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('palabras') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('categoria', 'Categoria') }}
                            </div>
                            <div class="col-md-9">
                                {{ Form::select('categoria', $categorias) }}

                                @if ($errors->has('categoria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categoria') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>                      

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}                                
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection