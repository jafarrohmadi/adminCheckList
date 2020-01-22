<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveOperTugasRequest extends FormRequest
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
            'location_id'  => 'required',
            'reason'       => 'required',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date',
        ];
    }
}
