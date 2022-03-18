@extends('layouts.app')
@section('htmlheader_titulo', 'Alterar produto')

@section('conteudo')
    <div class="card">
        <section class="content-header">
            <div class="col-12">
                <h2>Alteração do Produto Estoque</h2>
            </div>
        </section>
        @if(Session::has('mensagem')) 
            <div class="alert alert-danger alert-dismissible">
                <!-- data-dismiss - clas para fechar o button que abrir sem precisar de nada  -->
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h5><i class="icon fas fa-ban"></i>Atenção!</h5>
                {{Session::get('mensagem')}}
            </div>
        @endif
        <div> <a href="/produto-estoque" class="btn btn-outline-info float-right col-1" style="margin:0 20px 20px 0;"><b>Voltar</b></a></div>
        <div class="card-body">
            <div class="container">
                <form action="/produto-estoque/{{$produto_estoque->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row"> 
                        <div class="form-group col-3">
                            <label>Título</label><br>
                            <input type="text" name="titulo_produto" value="{{$produto_estoque->titulo}}" class="form-control @error('titulo_produto') is-invalid @enderror">
                            @error('titulo_produto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-2">
                            <label>Valor</label><br>
                            <input type="text" name="valor_produto" value="{{$produto_estoque->valor}}" class="form-control @error('valor_produto') is-invalid @enderror">
                            @error('valor_produto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-2">
                            <label>Volume</label>
                            <input type="text" name="volume_tipo" value="{{$produto_estoque->volume}}" class="form-control @error('volume_tipo') is-invalid @enderror">
                            @error('volume_tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-3">
                            <label>Descrição</label>
                            <textarea type="text" row="10" name="descricao_produto" class="form-control @error('descricao_produto') is-invalid @enderror">{{$produto_estoque->descricao}}</textarea>
                            @error('descricao_produto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info float-right" style="margin:32px 0 0 50px;">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
