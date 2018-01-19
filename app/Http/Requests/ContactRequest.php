<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            //
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required | email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Please fill the name.',
            'email.required' => 'Please fill the email.',
            'telephone.required' => 'Please fill the telephone.',
            'subject.required' => 'Please fill the subject.',
            'message.required' => 'Please fill the message.',
        ];
    }
}
