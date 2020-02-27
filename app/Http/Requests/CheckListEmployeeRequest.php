<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckListEmployeeRequest extends FormRequest
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
            'location_id'    => 'required',
            'check_list_ids' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'location_id.required'    => 'You must choose a location',
            'check_list_ids.required' => 'You must choose a Checklist',
        ];
    }
}
