<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Language;

class OrderRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
            'orders_patient_name' 		=> 'required',
            'orders_patient_phone' 		=> 'required',
            // 'orders_patient_civil_no' 	=> 'required',
            // 'orders_patient_passport' 	=> 'required',
            // 'orders_patient_nationality'=> 'required',
            'orders_patient_blood_type' => 'required',
            'orders_patient_address' 	=> 'required',
			// 'orders_patient_email' 		=> 'required|email',
			// 'orders_companion_name' 	=> 'required',
			// 'orders_companion_phone' 	=> 'required',
			// 'orders_companion_civil_no' => 'required',
			// 'orders_companion_address' 	=> 'required',
			'diseases_id' 				=> 'required',
			// 'diseases_title' 		=> 'required',
			// 'clients_id' 				=> 'required',
			// 'order_images'				=> 'required|array',
			// 'order_images.*'			=> 'image',
		 
	 
		];
 
		$data = $this->request->get('diseases_id');
        if($data && $data == '0'){
            // $rules['diseases_title'] = 'required';
        }
		return $rules;
	}

	/**
	 * Get the validation messages that apply to the request.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
}
