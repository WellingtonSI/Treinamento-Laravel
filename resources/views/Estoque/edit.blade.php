<html>
    <body>
        <h2>Alterar Entrada ou Saída do Estoque</h2>
        <form action="/estoque/{{$estoque->id}}" method="POST">
            @csrf
            @method('PUT')
            <label>Produto</label><br>
            <select name="produto">
                <option value="">Selecione</option>
                @foreach($produto_estoque as $produto)
                    <option value="{{$produto->id}}" @if($produto->id==$estoque->fk_produto_estoque) selected @endif>{{$produto->titulo}}</option>
                @endforeach
            </select>
           <br><br>
            <label>Quantidade</label><br>
            <input type="number" name="quantidade" value="{{$estoque->quantidade}}"><br><br>
            <label>Tipo</label><br>
            <select name="tipo">
                <option value="" @if($estoque->flag=="") selected @endif>Selecione</option>
                <option value="entrada" @if($estoque->flag=="entrada") selected @endif>Entrada</option>
                <option value="saida" @if($estoque->flag=="saida") selected @endif>Saída</option>
            </select><br><br>
           <button type="submit">enviar</button>
        </form>
    </body>
</html>