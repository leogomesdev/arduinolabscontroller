@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Configurações
                </div>
                
                <div class="panel-body">
                    @include('messages')
                    <div class="box-body table-responsive no-padding">
                        <form class="form-horizontal">
                            <div class="form-group">
                                {!! Form::label('plink_path', 'Instalação do Plink', array('class' => 'col-sm-4 control-label')) !!}
                                <div class='col-sm-8'>
                                            <p class="form-control-static">{{$configuration->plink_path}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('psshutdown_path', 'Instalação do PsShutdown', array('class' => 'col-sm-4 control-label')) !!}
                                <div class='col-sm-8'>
                                            <p class="form-control-static">{{$configuration->psshutdown_path}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('absolute_public_path', 'Caminho completo da pasta "public"', array('class' => 'col-sm-4 control-label')) !!}
                                <div class='col-sm-8'>
                                            <p class="form-control-static">{{$configuration->absolute_public_path}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('arduino_port', 'Porta de Conexão do Arduino', array('class' => 'col-sm-4 control-label')) !!}
                                <div class='col-sm-8'>
                                            <p class="form-control-static">{{$configuration->arduino_port}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('communication_delay', 'Tempo de espera', array('class' => 'col-sm-4 control-label')) !!}
                                <div class='col-sm-8'>
                                            <p class="form-control-static">{{$configuration->communication_delay}}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-footer">
                <!-- DIV para o botao editar -->
                <div class="form-group text-center">
                    <a href="{{URL::to('/configurations/edit/'.$configuration->id)}}" class="btn btn-default">
                        <i class="glyphicon glyphicon-pencil"></i> Editar
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
