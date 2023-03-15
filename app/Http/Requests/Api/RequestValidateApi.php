<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
class RequestValidateApi extends FormRequest
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
            'dni' => 'required|max:9|unique:users|regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i',
            'email' => 'required|email|unique:users',
            'contraseña' => ['required',
            Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols(),
    ],
            'confirmarContraseña' => 'required|same:contraseña',
            'telefono' => 'min:9|max:12|nullable|regex:/^[+]{1}[0-9]/',
            'pais' => 'alpha|nullable',
            'iban' => 'alpha_num|min:24|max:30|required|regex:/^[A-Za-z]{2}[0-9]{22}+$/u',
            'sobreTi' => 'min:20|max:250|nullable|regex:/^[A-Za-z0-9,.]+/',

        ];
    }
    

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'code' => '422',
            'message' =>$validator->errors(),
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}