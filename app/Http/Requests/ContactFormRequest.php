<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name'      => ['required', 'min:3', 'max:100', 'string'],
            'email'     => ['required', 'max:200', 'email'],
            'subject'   => ['required', 'max:200'],
            'message'   => ['required', 'max:200'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required'     =>  '',
    //         'name.min'          =>  '',
    //         'name.max'          =>  '',
    //         'name.string'       =>  '',
    //         'email.required'    =>  '',
    //         'email.email'       =>  '',
    //         'subject.required'  =>  '',
    //         'subject.max'       =>  '',
    //         'message.required'  =>  '',
    //         'message.max'       =>  '',
    //     ];
    // }
}
