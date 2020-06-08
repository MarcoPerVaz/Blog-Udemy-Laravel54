<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /* 
        | -----------------
        | *Determina si el usuario está autorizado
        |   *false No - True Si
        | -----------------
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
        return [

            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'excerpt' => 'required',

        ];
    }
}


/* Notas:
    | ------------------------------------------------------------------------------------------------------
    | *Más información sobre Form Request en https://laravel.com/docs/5.4/validation#form-request-validation
    | ------------------------------------------------------------------------------------------------------
*/
