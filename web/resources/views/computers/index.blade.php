@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Computadores
                    <a href="{{url('/computers/new')}}" title="Adicionar">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
                
                <div class="panel-body">
                    @include('messages')
                    <table class="table text-center table-hover table-bordered" cellspacing="0" width="100%" id="example">
                        <thead class="cabecalhodetabelageral">
                            <tr>
                                <th class='text-center'>Nome</th>
                                <th class='text-center'>IP</th>
                                <th class='text-center'>MAC</th>
                                <th class='text-center'>Laboratório</th>
                                <th class='text-center'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($computers as $computer)
                                <tr>
                                    <td>{{ $computer->name }}</td>
                                    <td>{{ $computer->ip }}</td>
                                    <td>{{ $computer->mac }}</td>
                                    <td>{{ $computer->lab ? $computer->lab->number : '' }}</td>
                                    <td>
                                        <a href='{{url("/computers/edit/{$computer->id}")}}' title="Editar">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href='{{url("/computers/delete/{$computer->id}")}}' title="Excluir" onclick="return confirm('Deletar esse registro?')">
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
