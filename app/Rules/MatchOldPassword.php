<?php
  
namespace App\Rules;
  
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Auth ;
class MatchOldPassword implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   
        if(Auth::guard('client')->check()) {
            return Hash::check($value,  auth::guard('client')->user()->password);
        }
        elseif(Auth::guard('doctor')->check()) {
            return Hash::check($value,  auth::guard('doctor')->user()->password);
        }
        
    }
  
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('lang.current_password');
    }
}