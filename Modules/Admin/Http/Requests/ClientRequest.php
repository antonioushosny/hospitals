<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Admin\Models\Language;


class ClientRequest extends FormRequest
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
        'clients_status'  => 'required',
        'clients_phone'   => 'required',
        'email'      => 'required',
        'clients_name'      => 'required',
        'clients_civil_no'      => 'required',
   
        ];


            $languages = Language::active()->get();
            foreach ($languages as $language) {
               
            }

            if ($this->isMethod('PUT')) {
                 
            }
     
       
        return $rules;
    }
}