<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookingRequest extends FormRequest
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
            'infants.*.birthday' => 'sometimes|required|date_format:' . config('app.date_format'),
            'adults.*.birthday' => 'sometimes|required|date_format:' . config('app.date_format'),
            'children.*.birthday' => 'sometimes|required|date_format:' . config('app.date_format')
        ];
    }
}
