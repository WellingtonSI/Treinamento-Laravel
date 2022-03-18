@extends('layouts.app')

@section('htmlheader_titulo', 'Treinamento')
@section('links_adicionais')
  <link rel="stylesheet" href="{{asset('plugins/AdminLTE-3.2.0-rc/plugins/DataTable/datatables.min.css')}}">
@endsection
@section('scripts_adicionais')
  <script src="{{asset('plugins/AdminLTE-3.2.0-rc/plugins/DataTable/datatables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/listar_estoque.js') }}"></script>
@endsection

@section('conteudo')
    <div class="card">
        @if(Session::has('mensagem'))
            <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{Session::get('mensagem')}}
            </div>
        @endif
        <div class="card-body">
            <div class="container">
                <h2>Listagem das Entradas e das Saídas</h2><br>
                <a href="/estoque/create" class="btn btn-outline-info col-2"><b>Cadastro de Entrada/Saída</b></a>
                <br> <br> <br>
                <table id="estoque" class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título do Produto</th>
                            <th>Valor do Produto</th>
                            <th>Volume do Produto</th>
                            <th>Quantidade</th>
                            <th>Tipo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
 