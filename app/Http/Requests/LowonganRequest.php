<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LowonganRequest extends FormRequest
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
        return [
            'photo_url' => 'required|image|mimes:png,jpg,jpeg|max:5000|dimensions:width=1280,height=720',
            'job_payment' => 'required|numeric|max:500000000|min:500000',
            'job_due_date' => 'required|date',
            'job_description' => 'required|max:500|min:100'
        ];
    }
}
