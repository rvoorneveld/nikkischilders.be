<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required|email',
            'phoneNumber' => 'required',
            'availability' => 'required|numeric',
            'treatment' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'Vul uw voornaam in',
            'lastName.required'  => 'Vul uw achternaam in',
            'emailAddress.required'  => 'Vul uw e-mailadres in',
            'phoneNumber.required'  => 'Vul uw telefoonnummer in',
            'emailAddress.email'  => 'Vul uw e-mailadres correct in',
        ];
    }

}
