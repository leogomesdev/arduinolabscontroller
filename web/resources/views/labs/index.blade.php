@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Laboratórios
                    <a href="{{url('/laboratorios/cadastrar')}}" title="Adicionar">
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
                                <th class='text-center'>Número</th>
                                <th class='text-center'>Usuário Linux</th>
                                <th class='text-center'>Usuário Windows</th>
                                <th class='text-center'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laboratorios as $laboratorio)
                                <tr>
                                    <td>{{ $laboratorio->number }}</td>
                                    <td>{{ $laboratorio->linux_user }}</td>
                                    <td>{{ $laboratorio->windows_user }}</td>
                                    <td>
                                        <a href='{{url("/laboratorios/editar/{$laboratorio->id}")}}' title="Editar">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href='{{url("/laboratorios/apagar/{$laboratorio->id}")}}' title="Excluir" onclick="return confirm('Deletar esse registro?')">
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
