<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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

    public function prepareForValidation()
    {

        $filtered_query = array_filter($this->all(), function ($value) {
            return !empty($value) && $value !== "null" && $value !== "-";
        });

        $this->replace($filtered_query);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'to' => 'nullable|string',
            'from' => 'nullable|string',
            'departure' => 'nullable|string',
            'returning' => 'nullable|string',
            'adult' => 'nullable|string',
            'child' => 'nullable|string',
        ];
    }
}
