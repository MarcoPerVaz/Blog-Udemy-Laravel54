<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /* 
        | ----------------------------------------
        | *Determina si el usuario está autorizado
        |   *false No - True Si
        | ----------------------------------------
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
    /* 
        | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        | *La variable $rules guarda el array de validaciones
        |   *'name' => 'required', El campo 'name' es obligatorio
        |   *'email' => ['required', Rule::unique('users')->ignore($this->route('user')->id)], El campo 'email' es obligatorio, se crea una regla donde el campo 'email' debe ser único y que permita actualizar si el campo 'email'
        |    es el mismo que el del usuario autenticado para evitar que lo tome como duplicado y se pueda guardar
        |       *$this Hace referencia al Request es equivalente a escribir $request en el controlador
        |       *route('user')->id Sirve para obtener el 'id' del usuario que queremos editar
        |           *'user' nos devuelve el usuario completo y solo obtenemos el id del usuario
        | *No olvidar importar use Illuminate\Validation\Rule;
        | *if ($this->filled('password')) Verifica si el campo 'password' contiene información
        | *$rules['password'] = ['confirmed', 'min:6']; El elemento input html 'password' debe ser igual al elemento input html 'password_confirmation' y debe tener al menos 6 caracteres
        | *Devuelve la variable $rules que son las reglas de validación y que se pasan a la función update(UpdateUserRequest $request, User $user) del controlador app\Http\Controllers\Admin\UsersController.php
        | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => [
                'required', 
                Rule::unique('users')->ignore($this->route('user')->id)
            ],
        ];

        if ($this->filled('password')) {
            $rules['password'] = ['confirmed', 'min:6'];
        }

        return $rules;
    }
}


/* Notas:
    | -------------------------------------------------------------------------------------------------------
    | *Más información sobre Form Requests en https://laravel.com/docs/5.5/validation#form-request-validation
    | -------------------------------------------------------------------------------------------------------
*/
