<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PemasukanInventarisRequest extends FormRequest
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
            'inventaris_id' => 'required',
            'waktu' => 'required',
            'kuantitas' => 'required',
            'satuan' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [ 
            'inventaris_id.required' => 'Jenis inventaris harus dipilih',
            'waktu.required' => 'Waktu Wajib Diisi',
            'kuantitas.required' => 'Kuantitas Wajib Diisi',
            'satuan.required' => 'Satuan Wajib Dipilih'
        ];
    }
}
