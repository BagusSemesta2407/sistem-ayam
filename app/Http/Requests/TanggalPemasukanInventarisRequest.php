<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TanggalPemasukanInventarisRequest extends FormRequest
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
            'waktu' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'waktu.required' => 'Tanggal Wajib Diisi'
        ];
    }
}
