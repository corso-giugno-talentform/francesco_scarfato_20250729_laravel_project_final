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
            'name' => ['required', 'max:100', 'string'],
            'author' => ['required', 'max:64', 'string'],
            'image' => ['mimes:jpg, jpeg, png, bmp'],
            'page' => ['nullable', 'integer'],
            'year' => ['integer']
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
            'author.required' => 'Nome autore richiesto',
            'author.max' => 'Nome troppo lungo (max 64 chars)',
            'page.integer' => 'Deve essere un numero intero',
            'year.integer' => 'Deve essere un numero intero',
        ];
    }
}
