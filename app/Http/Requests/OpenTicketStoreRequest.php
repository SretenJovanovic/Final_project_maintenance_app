<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class OpenTicketStoreRequest extends FormRequest
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
            'user' => ['required', 'string', 'max:255', Rule::exists('users', 'id')],
            'equipement' => ['required', 'string', 'max:255', Rule::exists('equipements', 'id')],
            'category' => ['required', 'string', 'max:255', Rule::exists('ticket_categories', 'id')],
            'description' => ['required', 'string', 'min:3', 'max:1000'],
        ];

        return $rules;
    }
}
