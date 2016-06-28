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
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                              @foreach($errors->all() as $mensagem)
                                    {!! $mensagem !!}
                              @endforeach
                    </div>
                @endif
                @if(isset($mensagem))
                entrei no if
                    <div class="alert alert-success">
                        {!! $mensagem !!}
                    </div>
                @endif

                @if(Session('mensagem'))
                entrei no if 2
                    <div class="alert alert-success">
                       lalalal
                    </div>
                @endif
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
                <div class="box-footer">
                <!-- DIV para o botao editar -->
                <div class="form-group text-center">
                    <a href="/configurations/edit/{{$configuration->id}}" class="btn btn-default">
                        <i class="glyphicon glyphicon-pencil"></i> Editar
                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
