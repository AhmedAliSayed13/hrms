<?php

namespace App\Http\Requests\leave;

use Illuminate\Foundation\Http\FormRequest;

class ApplyLeaveStoreRequest extends FormRequest
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
            'leave_type' => 'required',
            'dateFrom'   => 'required|date|after_or_equal:today',
            'dateTo'     => 'required|date|after_or_equal:dateFrom',
            'time_from'  => 'required|before:time_to',
            'time_to'    => 'required|after:time_from',
            'reason'     => 'required|string|max:500',
        ];

    }

    public function messages()
    {
        return [
            'dateFrom.after_or_equal' => 'The start date must be today or later.',
            'dateTo.after_or_equal'   => 'The end date must be the same or after the start date.',
        ];
    }

}
