<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProdutoEstoque extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /** para não ter que criar 2 arquivos para o request, foi add um if verificando se é um método do tipo PUT (edição) ou POST (add) */
        if($this->method() == "PUT") {
           
            return [
                'titulo_produto' => ['required', 'string', 'max:255','regex:/^([a-zA-Zà-úÀ-Ú]|-|_|\s)+$/'],
                'valor_produto' =>  ['required', 'numeric'],
                'volume_tipo' =>  ['required','string','max:255','regex:/^([a-zA-Zà-úÀ-Ú]|-|_|\s)+$/'],
                'descricao_produto' => ['required','string','max:255']
            ];
            
        }
        if($this->method() == "POST") {
           
           return[
            'titulo_produto' => ['required', 'string', 'max:255','regex:/^([a-zA-Zà-úÀ-Ú]|-|_|\s)+$/'],
            'valor_produto' => ['required', 'numeric'],
            'volume_tipo' => ['required','string','max:255','regex:/^([a-zA-Zà-úÀ-Ú]|-|_|\s)+$/'],
            'descricao_produto' => ['required','string','max:255']
           ];
        }
        
       // return array_merge($dados);
    }
    public function attributes(){
        return [];
    }
    public function messages(){
        return [];
    }
}
