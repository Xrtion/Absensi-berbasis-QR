<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePertemuanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kelas_id' => 'required|exists:kelas,id',
            'tanggal' => 'required',
            'guru_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'topik' => 'required',
            'ruang_id' => 'required'
        ];
    }
}
