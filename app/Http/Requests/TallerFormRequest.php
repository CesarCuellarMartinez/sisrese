<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TallerFormRequest extends FormRequest
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
            'nomb'=>'required | max:200',
            'desc'=>'max:200',
            'capa'=>'required',
            'prec'=>'required'
        ];
    }
}
