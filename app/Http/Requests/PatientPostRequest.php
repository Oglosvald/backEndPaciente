<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'Photo' => 'nullable|string',
            'Name' => 'required|string',
            'MothersName' => 'required|string',
            'Birth' => 'required|date',
            'CPF' => 'required|string',
            'CNS' => 'required|string',
            'address.id => required| unic',
        ];
    }
}
