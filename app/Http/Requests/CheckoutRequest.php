<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'firstname' => 'required',
            'shipping_firstname' => 'required',
            'lastname' => 'required',
            'shipping_lastname' => 'required',
            'telephone' => 'required',
            'email' => 'required | email',
            'address' => 'required',
            'shipping_address' => 'required',
            'shopname' => 'required',
            'shipping_shopname' => 'required',
            
        ];
    }

    public function messages()
    {
        return [

            'firstname.required' => 'Please Enter First Name',
            'shipping_firstname.required' => 'Please Enter Shpping First Name',
            'lastname.required' => 'Please Enter Last Name',
            'shipping_lastname.required' => 'Please Enter Shipping Last Name',
            'telephone.required' => 'Please Enter Telephone',
            'email.required' => 'Please Enter Email',
            'address.required' => 'Please Enter Address',
            'shipping_address.required' => 'Please Enter Shipping Address',
            'shopname.required' => 'Please Enter Shop Name',
            'shipping_shopname.required' => 'Please Enter Shipping Shop Name',
        ];
    }
}
