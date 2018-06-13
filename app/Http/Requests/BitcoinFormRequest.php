<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BitcoinFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required',
            'details_no' => 'required',
            'amount_paid' => 'required',
            'depositor_name' => 'required',
            'receipt_dir' => 'required|mimes:png,jpg,pdf'
        ];
    }
}
