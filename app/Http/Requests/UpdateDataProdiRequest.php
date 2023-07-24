<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataProdiRequest extends FormRequest
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
            'id_jurusan' => 'required|string|min:3|max:70',
            'id_prodi' => 'required|string|min:3|max:70',
            'nama_prodi' => 'required|string|min:3|max:70',
        ];
    }
}
