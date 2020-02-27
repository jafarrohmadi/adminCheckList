<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveOperTugasListRequest extends FormRequest
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
            'from_user_id' => 'required',
            'to_user_id'   => 'required',
            'reason'       => 'required',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'from_user_id.required' => 'You must choose a user from ',
            'to_user_id.required'   => 'You must choose a user to',
            'reason.required'       => 'You must write a reason',
            'start_date.required'   => 'You must choose a start date',
            'end_date.required'     => 'You must choose a end date',
        ];
    }
}
