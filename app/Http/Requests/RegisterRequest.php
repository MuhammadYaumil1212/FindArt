<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Auth;   
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'numeric','digits:13'],
            'address'=> ['required','string'],
            'province_id'=>['required'],
            'city_id' => ['required'],
            'district_id'=>['required'],
            'sub_district_id'=>['required'],
            'role'=>['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation'=>['required']
        ];
    }
}
