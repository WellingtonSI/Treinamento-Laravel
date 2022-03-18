@extends('layouts.app')
@section('htmlheader_titulo', 'Alterar Entrada e Saída')

@section('conteudo')
    <div class="card">
        <section class="content-header">
            <div class="col-sm-12">
            <h2>Alterar Entrada ou Saída do Estoque</h2>
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
                <form action="/estoque/{{$estoque->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-3"> 
                            <label>Produto</label><br>
                            <select name="produto" class="form-control @error('produto') is-invalid @enderror">
                                <option value="{{ (old("produto") == "" ? "selected":"") }}">Selecione</option>
                                @foreach($produto_estoque as $produto)
                                    <option value="{{$produto->id}}" 
                                    @if($produto->id==$estoque->fk_produto_estoque) 
                                    selected @endif>{{$produto->titulo}}</option>
                                @endforeach
                            </select>
                            @error('produto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Quantidade</label><br>
                            <input type="text" name="quantidade" value="{{$estoque->quantidade}}" class="form-control @error('quantidade') is-invalid @enderror">
                            @error('quantidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tipo</label><br>
                            <select name="tipo" class="form-control @error('tipo') is-invalid @enderror">
                                <option value="" @if($estoque->flag=="") selected @endif>Selecione</option>
                                <option value="entrada" @if($estoque->flag=="entrada") selected @endif>Entrada</option>
                                <option value="saida" @if($estoque->flag=="saida") selected @endif>Saída</option>
                            </select>
                            @error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            <br><br>
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