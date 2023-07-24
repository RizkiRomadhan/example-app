<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataMahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nim' => 'required|string|min:3|max:70',
            'nama_mahasiswa' => 'required|string|min:3|max:70',
            'id_jurusan' => 'required|string|min:3|max:70',
            'id_prodi' => 'required|string|min:3|max:70',
            'email' => 'required|string|min:3|max:70',
            'nomor_ponsel' => 'required|string|min:3|max:70',
            'status' => 'required|string|min:3|max:70',
        ];
    }
}
