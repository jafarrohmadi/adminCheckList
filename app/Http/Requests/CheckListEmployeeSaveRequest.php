<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckListEmployeeSaveRequest extends FormRequest
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
            'user_id'        => 'required',
            'location_id'    => 'required',
            'days'           => 'required',
            'check_list_ids' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required'        => 'You must choose a user',
            'location_id.required'    => 'You must choose a location',
            'days.required'           => 'You must choose a days',
            'check_list_ids.required' => 'You must choose a Checklist',
        ];
    }
}
