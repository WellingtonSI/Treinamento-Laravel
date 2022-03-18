@extends('layouts.app')

@section('htmlheader_titulo', 'Treinamento')
@section('links_adicionais')
  <link rel="stylesheet" href="{{asset('plugins/AdminLTE-3.2.0-rc/plugins/DataTable/datatables.min.css')}}">
@endsection
@section('scripts_adicionais')
  <script src="{{asset('plugins/AdminLTE-3.2.0-rc/plugins/DataTable/datatables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/listar_produto_estoque.js') }}"></script>
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
          <h2>Listagem dos Produtos</h2><br>
              <a href="/produto-estoque/create" class="btn btn-outline-info col-2"><b>Cadastro de Produto</b></a>
              <br> <br> <br>
          <table id="produtos" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Título</th>
              <th>Valor</th>
              <th>Volume</th>
              <th>Descrição</th>
              <th>Estoque</th>
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
