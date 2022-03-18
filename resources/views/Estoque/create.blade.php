<html>
    <body>
        <h2>Cadastro de Entrada e Saída do Estoque</h2>
        <form action="/estoque" method="POST">
            @csrf
            <label>Produto</label><br>
            <select name="produto">
                <option value="">Selecione</option>
                @foreach($produto_estoque as $produto)
                    <option value="{{$produto->id}}">{{$produto->titulo}}</option>
                @endforeach
            </select>
           <br><br>
            <label>Quantidade</label><br>
            <input type="number" name="quantidade"><br><br>
            <label>Tipo</label><br>
            <select name="tipo">
                <option value="">Selecione</option>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select><br><br>
           <button type="submit">enviar</button>
        </form>
    </body>
</html>