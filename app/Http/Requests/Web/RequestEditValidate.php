<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class RequestEditValidate extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:2|max:20|regex:/^[\pL\s]+$/u',
            'apellidos' => 'required|min:2|max:40|regex:/^[\pL\s]+$/u',
            'dni' => 'required|max:9|regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i',
            'telefono' => 'min:9|max:12|nullable|regex:/^[+]{1}[0-9,+]*$/',
            'pais' => 'alpha|nullable',
            'iban' => 'alpha_num|min:24|max:30|required|regex:/^[A-Za-z]{2}[0-9]{22}+$/u',
            'sobreTi' => 'min:20|max:250|nullable|regex:/^[A-Za-z0-9]*$/',
        ];
    }
}
