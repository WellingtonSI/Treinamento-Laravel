@extends('layouts.app')
@section('htmlheader_titulo', 'Cadastar Entrada e Saída')

@section('conteudo')
    <div class="card">
        <section class="content-header">
            <div class="col-sm-12">
            <h2>Cadastro de Entrada e Saída do Estoque</h2>
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
                <form action="/estoque" method="POST">
                    @csrf
                    <div class="form-row"> 
                        <div class="form-group col-md-3">
                            <label>Produto</label><br>
                            <select name="produto" class="form-control @error('produto') is-invalid @enderror">
                                <option value="{{ (old("produto") == "" ? "selected":"") }}">Selecione</option>
                                @foreach($produto_estoque as $produto)
                                    <option value="{{$produto->id}} " {{ (old("produto") == $produto->id ? "selected":"") }}>{{$produto->titulo}}</option>
                                @endforeach
                            </select>
                            @error('produto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <br><br>
                        <div class="form-group col-md-3">
                            <label>Quantidade</label><br>
                            <input type="number" name="quantidade" class="form-control @error('quantidade') is-invalid @enderror">
                            @error('quantidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tipo</label><br>
                            <select name="tipo" class="form-control @error('tipo') is-invalid @enderror">
                                <option value="{{ (old("tipo") == "" ? "selected":"") }}">Selecione</option>
                                <option value="entrada" {{ (old("tipo") == "entrada" ? "selected":"") }}>Entrada</option>
                                <option value="saida" {{ (old("tipo") == "saida"? "selected":"") }}>Saída</option>
                            </select>
                            @error('tipo')
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