@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Computador</div>
                <div class="panel-body">
                    <a href="{{url('/computers')}}" title="Voltar" class="text-left btn btn-box-tool botao-voltar">
                        <i class="glyphicon glyphicon-arrow-left"></i>
                    </a>
                        @if(isset($computer))
                            Edição
                            {!! Form::open(array('url' => "/computers/edit/$computer->id", 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        @else
                            Cadastro
                            {!! Form::open(array('url' => "/computers/new", 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('name', 'Nome', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                {!! Form::text('name', isset($computer->name) ? $computer->name : '', array ('placeholder' => 'Insira aqui o nome', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('ip', 'IP', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                {!! Form::text('ip', isset($computer->ip) ? $computer->ip : '', array ('placeholder' => 'Insira aqui o endereço IP', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('mac', 'MAC', array('class' => 'col-sm-3 control-label')) !!}
                            <div class='col-sm-5 input-group'>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
                                {!! Form::text('mac', isset($computer->mac) ? $computer->mac : '', array ('placeholder' => 'Insira aqui o endereço MAC', 'class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                                    {!! Form::label('lab_id', 'Laboratório', array('class' => 'col-sm-3 control-label')) !!}
                                    <div class='col-sm-5 input-group'>
                                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                                <select name="lab_id" class="chosen-select form-control">
                                                            <option value=null>Selecione</option>
                                                            @foreach ($labs as $lab)
                                                                        <option value="{{$lab->id}}"
                                                                            @if(null !== (Request::old('lab_id')) && ($$lab->id==Request::old('lab_id')))
                                                                                selected
                                                                            @else
                                                                                @if(isset($computer->lab->id))
                                                                                    @if($lab->id==$computer->lab->id)   
                                                                                        selected
                                                                                    @endif
                                                                                @endif
                                                                            @endif
                                                                            >{{ $lab->number }}</option>
                                                            @endforeach
                                                </select>
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