<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
            'firstname'=>['required','string','min:2'],
            'lastname'=>['required','string','min:2'],
            'phone'=>['required','string','min:10'],
            'email'=>['required','string','min:4'],
            'message'=>['required','string','min:4'],

        ];
    }
}
