<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemasukanAyamRequest extends FormRequest
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
        $rules = [
            'kandang_id' => 'required',
            'tanggal_masuk' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'kandang_id.required' => 'Kandang Wajib Diisi',
            'tanggal_masuk.required' => 'Tanggal Masuk Wajib Diisi',
        ];
    }
}
