<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'name'   => ['required', 'max:100', 'string'],
            'author_id' => ['integer'],
            'image'  => ['mimes:jpg, jpeg, png, bmp', 'max:1024'],
            'page'   => ['nullable', 'integer'],
            'year'   => ['integer']
        ];
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nome libro richiesto',
            'name.max' => 'Nome troppo lungo (max 100 chars)',
            'page.integer' => 'Deve essere un numero intero',
            'year.integer' => 'Deve essere un numero intero',
        ];
    }
}
