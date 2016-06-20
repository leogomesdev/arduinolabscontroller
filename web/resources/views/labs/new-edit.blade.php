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
                                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                {!! Form::text('number', isset($laboratorio->number) ? $laboratorio->number : '', array ('placeholder' => 'insira aqui o número', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('linux_user', 'Usuário Linux', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                {!! Form::text('linux_user', isset($laboratorio->linux_user) ? $laboratorio->linux_user : '', array ('placeholder' => 'insira aqui o usuário Linux', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('linux_password', 'Senha do Usuário Linux', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
                                {!! Form::text('linux_password', isset($laboratorio->linux_password) ? $laboratorio->linux_password : '', array ('placeholder' => 'insira aqui a senha do usuário Linux', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('windows_user', 'Usuário Windows', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                {!! Form::text('windows_user', isset($laboratorio->windows_user) ? $laboratorio->windows_user : '', array ('placeholder' => 'insira aqui o usuário Windows', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('windows_password', 'Senha do Usuário Windows', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
                                {!! Form::text('windows_password', isset($laboratorio->windows_password) ? $laboratorio->windows_password : '', array ('placeholder' => 'insira aqui a senha do Usuário Windows', 'class' => 'form-control')) !!}
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