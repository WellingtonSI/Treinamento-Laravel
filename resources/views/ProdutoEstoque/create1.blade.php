@extends('layouts.app')
@section('htmlheader_titulo', 'Criar produto')

@section('scripts_adicionais')
<!-- <script type="text/javascript" src=" {{asset('plugins/maskedinput/jquery.maskedinput.min.js')}}"></script>
<script  type="text/javascript" >
    $(document).ready( function($){
        $("#valor_produto").mask("99,99");
    });    
</script> -->

@endsection

@section('conteudo')
    <div class="card">
        <section class="content-header">
            <div class="col-sm-12">
                <h2>Cadastro do Produto Estoque</h2>
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
                <form action="/produto-estoque" method="POST">
                    @csrf
                    <div class="form-row"> 
                        <div class="form-group col-md-3">
                            <label>Título</label>
                            <input type="text" name="titulo_produto" class="form-control @error('titulo_produto') is-invalid @enderror" value="{{ old('titulo_produto') }}">
                            @error('titulo_produto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label>Valor</label>
                            <input type="text" name="valor_produto" class="form-control @error('valor_produto') is-invalid @enderror" value="{{ old('valor_produto') }}">
                            @error('valor_produto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            
                        </div>
                        <div class="form-group col-md-2">
                            <label>Volume</label>
                            <input type="text" name="volume_tipo" class="form-control @error('volume_tipo') is-invalid @enderror" value="{{ old('volume_tipo') }}">
                            @error('volume_tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Descrição</label>
                            <textarea type="text" row="10" name="descricao_produto" class="form-control @error('descricao_produto') is-invalid @enderror" >{{ old('descricao_produto') }}</textarea>
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

