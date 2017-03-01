<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutoFormRequest extends FormRequest
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
            'nomb_inst'=>'required | max:200',
            'nomb_cont'=>'max:200',
            'corr_inst'=>'max:200',
            'corr_cont'=>'required | max:200',
            'tele_inst'=>'max:200',
            'tele_cont'=>'required | max:200',
            'codi'=>'required | max:50'
        ];
    }
}
