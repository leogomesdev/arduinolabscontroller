@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Configurações</div>
                <div class="panel-body">
                    <a href="{{url('/configurations')}}" title="Voltar" class="text-left btn btn-box-tool botao-voltar">
                        <i class="glyphicon glyphicon-arrow-left"></i>
                    </a>
                            Edição das configurações do sistema
                            {!! Form::open(array('url' => "/configurations/edit/$configuration->id", 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <div class="form-group">
                            {!! Form::label('plink_path', 'Instalação do Plink', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="fa fa-linux"></i></span>
                                {!! Form::text('plink_path', isset($configuration->plink_path) ? $configuration->plink_path : '', array ('placeholder' => 'Insira aqui o caminho de instalação do Plink', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                       <div class="form-group">
                            {!! Form::label('psshutdown_path', 'Instalação do PsShutdown', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="fa fa-windows"></i></span>
                                {!! Form::text('psshutdown_path', isset($configuration->psshutdown_path) ? $configuration->psshutdown_path : '', array ('placeholder' => 'Insira aqui o caminho de instalação do PsShutdown', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('arduino_port', 'Porta de Conexão do Arduino', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="fa fa-sliders"></i></span>
                                {!! Form::text('arduino_port', isset($configuration->arduino_port) ? $configuration->arduino_port : '', array ('placeholder' => 'Insira aqui a Porta de conexão utilizado pelo Arduino', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('communication_delay', 'Tempo de espera', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                {!! Form::text('communication_delay', isset($configuration->communication_delay) ? $configuration->communication_delay : '', array ('placeholder' => 'Insira aqui o tempo (s) de pause entre as comunicações via Serial', 'class' => 'form-control')) !!}
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