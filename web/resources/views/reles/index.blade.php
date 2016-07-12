@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Relés
                    <a href="{{url('/reles/new')}}" title="Adicionar">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
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
                    <table class="table text-center table-hover table-bordered" cellspacing="0" width="100%" id="example">
                        <thead class="cabecalhodetabelageral">
                            <tr>
                                <th class='text-center'>Nome</th>
                                <th class='text-center'>Pino</th>
                                <th class='text-center'>Laboratório</th>
                                <th class='text-center'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reles as $rele)
                                <tr>
                                    <td>{{ $rele->name }}</td>
                                    <td>{{ $rele->pin }}</td>
                                    <td>{{ $rele->lab ? $rele->lab->number : '' }}</td>
                                    <td>
                                        <a href='{{url("/reles/edit/{$rele->id}")}}' title="Editar">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href='{{url("/reles/delete/{$rele->id}")}}' title="Excluir" onclick="return confirm('Deletar esse registro?')">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
