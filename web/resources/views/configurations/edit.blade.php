@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Configurações</div>
                <div class="panel-body">
                    @include('messages')
                    <a href="{{url('/configurations')}}" title="Voltar" class="text-left btn btn-box-tool botao-voltar">
                        <i class="glyphicon glyphicon-arrow-left"></i>
                    </a>
                            Edição das configurações do sistema
                            {!! Form::open(array('url' => "/configurations/edit/$configuration->id", 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <div class="form-group required">
                            {!! Form::label('plink_path', 'Instalação do Plink', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="fa fa-linux"></i></span>
                                {!! Form::text('plink_path', isset($configuration->plink_path) ? $configuration->plink_path : '', array ('placeholder' => 'Insira aqui o caminho de instalação do Plink', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                       <div class="form-group required">
                            {!! Form::label('psshutdown_path', 'Instalação do PsShutdown', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="fa fa-windows"></i></span>
                                {!! Form::text('psshutdown_path', isset($configuration->psshutdown_path) ? $configuration->psshutdown_path : '', array ('placeholder' => 'Insira aqui o caminho de instalação do PsShutdown', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::label('absolute_public_path', 'Caminho da pasta "public"', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="fa fa-windows"></i></span>
                                {!! Form::text('absolute_public_path', isset($configuration->absolute_public_path) ? $configuration->absolute_public_path : '', array ('placeholder' => 'Insira aqui o caminho de acesso à pasta public do projeto', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::label('arduino_port', 'Porta de Conexão do Arduino', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="fa fa-sliders"></i></span>
                                {!! Form::text('arduino_port', isset($configuration->arduino_port) ? $configuration->arduino_port : '', array ('placeholder' => 'COM4', 'class' => 'form-control', 'id' => 'arduino_port')) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::label('communication_delay', 'Tempo de espera', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                {!! Form::text('communication_delay', isset($configuration->communication_delay) ? $configuration->communication_delay : '', array ('placeholder' => '2', 'class' => 'form-control', '' => 'communication_delay')) !!}
                            </div>
                        </div>
                        <label class="required">Indica campo obrigatório</label>
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
<script type="text/javascript">
    $(document).ready (function(){
        $('#communication_delay').mask('0');
        $('#arduino_port').mask('AAAA');
    });
</script>
@endsection