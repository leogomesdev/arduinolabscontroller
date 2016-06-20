@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Laboratório</div>
                <div class="panel-body">
                    <a href="{{url('/laboratorios')}}" title="Voltar" class="text-left btn btn-box-tool botao-voltar">
                        <i class="glyphicon glyphicon-arrow-left"></i>
                    </a>
                        @if(isset($laboratorio))
                            Edição
                            {!! Form::open(array('url' => "/laboratorios/editar/$laboratorio->id", 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        @else
                            Cadastro
                            {!! Form::open(array('url' => "/laboratorios/cadastrar", 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                                        @endif 
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <div class="form-group">
                            {!! Form::label('number', 'Número', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                                {!! Form::text('number', isset($laboratorio->number) ? $laboratorio->number : '', array ('placeholder' => 'insira aqui o número', 'class' => 'form-control')) !!}
                            </div>
                        </div>
            </div>
            <div class="box-footer">
                <!-- DIV para o botao enviar -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-floppy-open"></i> Salvar
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
    </div>
</div>
</div>
</div>
@endsection