<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = ['fk_produto_estoque, quantidade, flag'];

    public function produto_estoque()
    {
        return $this->belongsTo('App\ProdutoEstoque','fk_produto_estoque');
    }
    

}
