<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Cash Deposit Id
     *
     * @var int|null
     */
    private ?int $userId;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $uniqueRule = Rule::unique(User::class);

        if ($this->userId) {
            $uniqueRule = $uniqueRule->ignore($this->userId);

            return [
                'name'                  => ['required', 'string', 'max:255'],
                'email'                 => ['required', 'email', $uniqueRule],
                'password'              => ['nullable', 'confirmed', 'min:6'],
                'password_confirmation' => ['nullable', 'min:6'],
                'image'                 => ['nullable', 'file', 'image'],
                'old_image'             => ['nullable', 'string'],
            ];

        } else {
            return [
                'name'                  => ['required', 'string', 'max:255'],
                'email'                 => ['required', 'email', $uniqueRule],
                'password'              => ['required', 'confirmed', 'min:6'],
                'password_confirmation' => ['required', 'min:6'],
                'image'                 => ['nullable', 'file', 'image'],

            ];
        }

    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->userId = $this->route('user');
    }

}
