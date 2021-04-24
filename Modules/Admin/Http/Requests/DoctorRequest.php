<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Admin\Models\Language;


class DoctorRequest extends FormRequest
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
        'doctors_status'  => 'required',
        'doctors_phone'   => 'required|unique:doctors,doctors_phone',
        'countries_id'      => 'required',
        'specialties_id'      => 'required',
        'departments_id'      => 'required',
        'hospitals_id'      => 'required',
        'doctors_email'      => 'required',
        'doctors_name'      => 'required',
        // 'doctors_civil_no'      => 'required',
   
        ];

        $id = request()->segment(4) ;
        // dd($id) ;
            $languages = Language::active()->get();
            foreach ($languages as $language) {
               
            }

            if ($this->isMethod('PUT')) {
                $rules['doctors_phone']   = "required|numeric|unique:doctors,doctors_phone,$id,doctors_id";
            }
     
       
        return $rules;
    }
}
