<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataDosenRequest extends FormRequest
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
            'nidn' => 'required|string|min:3|max:70|unique:tbl_dosen,nidn',
            'nama_dosen' => 'required|string|min:3|max:70',
            'id_jurusan' => 'required|string|min:3|max:70',
            'email' => 'required|string|min:3|max:70',
            'nomor_ponsel' => 'required|string|min:3|max:70',
            'status' => 'required|string|min:3|max:70',
        ];
    }
}
