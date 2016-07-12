@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Laboratório</div>
                <div class="panel-body">
                    <a href="{{url('/labs')}}" title="Voltar" class="text-left btn btn-box-tool botao-voltar">
                        <i class="glyphicon glyphicon-arrow-left"></i>
                    </a>
                        @if(isset($lab))
                            Edição
                            {!! Form::open(array('url' => "/labs/edit/$lab->id", 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        @else
                            Cadastro
                            {!! Form::open(array('url' => "/labs/new", 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('number', 'Número', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                {!! Form::text('number', isset($lab->number) ? $lab->number : '', array ('placeholder' => 'insira aqui o número', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('linux_user', 'Usuário Linux', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="fa fa-linux" aria-hidden="true"></i></span>
                                {!! Form::text('linux_user', isset($lab->linux_user) ? $lab->linux_user : '', array ('placeholder' => 'insira aqui o usuário Linux', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('linux_password', 'Senha do Usuário Linux', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
                                {!! Form::text('linux_password', isset($lab->linux_password) ? $lab->linux_password : '', array ('placeholder' => 'insira aqui a senha do usuário Linux', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('windows_user', 'Usuário Windows', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="fa fa-windows" aria-hidden="true"></i></span>
                                {!! Form::text('windows_user', isset($lab->windows_user) ? $lab->windows_user : '', array ('placeholder' => 'insira aqui o usuário Windows', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('windows_password', 'Senha do Usuário Windows', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
                                {!! Form::text('windows_password', isset($lab->windows_password) ? $lab->windows_password : '', array ('placeholder' => 'insira aqui a senha do Usuário Windows', 'class' => 'form-control')) !!}
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