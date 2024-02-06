<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
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
            'nama' => 'required',
            'jumlah' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [ 
            'nama.required' => 'Nama Barang Wajib Diisi',
            'jumlah.required' => 'Jumlah Barang Wajib Diisi'
        ];
    }
}
