<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Admin\Models\Language;


class HospitalRequest extends FormRequest
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
        // dd(request()->all());
       
        $rules = [
        'hospitals_status'  => 'required',
        'hospitals_phone'   => 'required',
        // 'countries_id'      => 'required',
        'cities_id'      => 'required',
        'areas_ids'      => 'nullable|array',
        'departments_ids'      => 'nullable|array',
        'specialties_ids'      => 'nullable|array',
        'hospital_images'	=>	'required',
        ];


            $languages = Language::active()->get();
            foreach ($languages as $language) {
                $rules[$language->locale. '.hospitals_title']   = 'required|min:2|max:255';
                $rules[$language->locale. '.hospitals_address'] = 'required|min:2';
                $rules[$language->locale. '.hospitals_desc'] = 'required|min:2';
            }

            if ($this->isMethod('PUT')) {
                $rules['hospital_images'] = 'nullable';
            }
     
       
        return $rules;
    }
}
