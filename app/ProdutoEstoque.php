<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoEstoque extends Model
{
    protected $fillable = ['titulo, valor, volume, descricao'];
    
    public function valor_estoque()
    {
        $entrada = Estoque::where('fk_produto_estoque',$this->id)
                           ->where('flag','entrada')->sum('quantidade');

        $saida = Estoque::where('fk_produto_estoque',$this->id)
                           ->where('flag','saida')->sum('quantidade');
        
        return $entrada-$saida;
    }
}
