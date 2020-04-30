<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreOrderRequest extends FormRequest
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
            'nama'=>'required',
            'email'=>'required|email|unique:registers,email',
            'nim'=>'required|numeric|digits:10|unique:registers,nim',
            'tlp'=>'required|min:8|max:15|unique:registers,tlp',
            'lineId'=>'required|unique:registers,lineId',
            'jurusan'=>'required',
	    'batch'=>'required'

        ];
    }
}
