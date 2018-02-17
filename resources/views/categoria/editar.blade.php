@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Categoria</div>

                <div class="panel-body">
                    {{ Form::model($categoria, array('route' => array('categorias.update', $categoria->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('nombre', 'Nombre') }}
                            </div>
                            <div class="col-md-9">
                                {{ Form::text('nombre', $categoria->nombre, array('class' => 'form-control')) }}

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <div class="col-md-3"> 
                                {{ Form::label('descripcion', 'Descripcion') }}
                            </div>
                            <div class="col-md-9">
                                {{ Form::text('descripcion', $categoria->descripcion, array('class' => 'form-control'))}}

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
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