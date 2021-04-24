<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Admin\Models\Language;


class HospitalsTreatmentRequest extends FormRequest
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
 
       
        $rules = [
        'hospitals_treatments_status'  => 'required',
        'hospitals_id'      => 'required',
        'diseases_id'      => 'required',
        'doctors_id'      => 'required',
        'hospitals_treatments_period'      => 'required',
        'hospitals_treatments_cost'      => 'required',
        'hospitals_treatments_program'      => 'required',
        'hospitals_treatments_status'      => 'required',
   
        ];
 
        $languages = Language::active()->get();
        foreach ($languages as $language) {
            
        }

        if ($this->isMethod('PUT')) {

        }
     
       
        return $rules;
    }
}
