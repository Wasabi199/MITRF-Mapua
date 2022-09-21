<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalReimbursmentRequest extends FormRequest
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
            //
            'reimbursment_type'=>'required',
            'amount'=>'required',
            'medical_benifit'=>'required',

            'medical_record1'=>'file|mimes:jpg,png,jpeg,pdf',
            'medical_record2'=>'file|mimes:jpg,png,jpeg,pdf',
            // 'medical_record3'=>'file|mimes:jpg,png,jpeg,pdf',
        ];
    }
}
