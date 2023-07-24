<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataJudulRequest extends FormRequest
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
            'nidn' => 'required|string|min:3|max:70',
            'nama_jurusan' => 'required|string|min:3|max:70',
            'judul' => 'required|string|min:3|max:70',
            'deskripsi' => 'required|string|min:3|max:70',
        ];
    }
}
