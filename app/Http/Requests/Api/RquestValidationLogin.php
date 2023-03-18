<?php

namespace App\Http\Requests\Api;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class RquestValidationLogin extends FormRequest
{
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            RouteServiceProvider::CODE => '422',
            RouteServiceProvider::MESSAGE =>$validator->errors(),
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
