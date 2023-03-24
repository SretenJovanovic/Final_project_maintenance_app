<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class EquipementUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */


    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'manufacturer' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'serial' => ['required', 'string', Rule::unique('equipements', 'serial')->ignore($this->equipement)],
            'description' => ['required', 'string', 'min:3', 'max:1000'],
            'section' => ['required', 'string', Rule::exists('sections', 'id')],
        ];

        return $rules;
    }
}
