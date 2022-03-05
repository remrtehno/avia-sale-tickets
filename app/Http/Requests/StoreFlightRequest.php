<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlightRequest extends FormRequest
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
            'flight' => 'required|min:2',
            'count_chairs' => 'required|min:1',
            'price_adult' => 'required|min:1',
            'price_child' => 'required|min:1',
            'price_infant' => 'required|min:1',
            'date' => 'required|min:10',
            'date_arrival' => 'required|min:10',
            'logo' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            'direction_from' => 'required|min:4',
            'direction_to' => 'required|min:4',
        ];
    }
}
