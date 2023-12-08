<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ParcelStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @throws AuthorizationException
     */
    public function authorize(): bool
    {
        if (!auth()->check()) {
            throw new AuthorizationException('User is not authenticated.');
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code'              => 'required|min:8|numeric|unique:parcels',
            'price'             => 'required|numeric',
            'address'           => 'required',
            'number_of_items'   => 'required|numeric',
            'comment'           => ''
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json(['errors' => $validator->errors()], 422));
    }
}
