<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'first_name'=>'required',
            'middle_name' =>'required',
            'last_name' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'department' => 'required',
            'salary' => 'required',
            'membership' => 'required',
            'imployment' => 'required',

        ];
    }
}
