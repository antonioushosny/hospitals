<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Admin\Models\Language;


class BloodTypeRequest extends FormRequest
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
        $id = $this->segment(4) ? $this->segment(4) : null ;
        $rules = [
            'blood_types_type'     => 'required|unique:mysql.blood_types,blood_types_type,'.$id.',blood_types_id',
            'blood_types_amount'     => 'required',
        ];
 
        
        return $rules;
    }
}
