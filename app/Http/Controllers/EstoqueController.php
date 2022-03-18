<?php

namespace App\Http\Controllers;
use App\Http\Requests\RequestEstoque;
use Illuminate\Http\Request;
use App\ProdutoEstoque;
use App\Estoque;
use DataTables;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
{

    public function index()
    {
        $estoque = Estoque::get();
        return view('Estoque.index1',compact('estoque'));
    }

    public function create()
    {
        $produto_estoque = ProdutoEstoque::get(); 
        return view('Estoque.create1',compact('produto_estoque'));
    }

    public function edit($id)
    {
        $estoque = Estoque::find($id); 
        $produto_estoque = ProdutoEstoque::get();
        return view('Estoque.edit1', compact('produto_estoque','estoque'));
    }

    public function store(RequestEstoque $request)
    {
        try {
            $estoque = new Estoque();
            $estoque->fk_produto_estoque = $request->produto;
            $estoque->quantidade = $request->quantidade;
            $estoque->flag = $request->tipo;

            $estoque->save();
            Session::flash('mensagem','Fluxo de caixa foi criado!');
            return Redirect::to('/estoque');

        } catch (\Exception $th) {
            Session::flash('mensagem', 'Não foi possível cadastrar!');
            // dd(back()->withInput(),$request->produto);
            return back()->withInput();
        }
        
        
        
    }

    public function update(RequestEstoque $request, $id)
    {
        try {
            $estoque = Estoque::find($id);
            $estoque->fk_produto_estoque = $request->produto;
            $estoque->quantidade = $request->quantidade;
            $estoque->flag = $request->tipo;

            $estoque->save();
            Session::flash('mensagem','Fluxo de caixa foi atualizado!');
            return Redirect::to('/estoque');
        } catch (\Exception $error) {
            Session::flash('mensagem', 'Não foi possível atualizar!');
            return back()->withInput();
        }
        

        return Redirect::to('/estoque/'.$estoque->id.'/edit');
    }

    public function show($id){

        $estoque = Estoque::get();

        return Datatables::of($estoque)
        ->editColumn('titulo', function ($estoque) {
            return $estoque->produto_estoque->titulo;
        })
        ->editColumn('valor', function ($estoque) {
            return $estoque->produto_estoque->valor;
        })
        ->editColumn('volume', function ($estoque) {
            return $estoque->produto_estoque->volume;
        })
        ->editColumn('acao', function ($estoque) {
            return '
                <div class="btn-group btn-group-sm">
                    <a href="/estoque/'.$estoque->id.'/edit"
                        class="btn btn-info"
                        title="Editar" data-toggle="tooltip">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="#"
                        class="btn btn-danger btnExcluir"
                        data-id="'.$estoque->id.'"
                        title="Excluir" data-toggle="tooltip">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>';
        })
        ->escapeColumns([0])
        ->make(true);
    }

    public function destroy($id)
    {
        try {
            $estoque = Estoque::find($id);
            $estoque->delete();
            return response()->json(array('status' => "OK"));
        }catch (\Exception  $erro) {
            return response()->json(array('erro' => "ERRO"));
        }
      
    }
}
