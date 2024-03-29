<?php

namespace App\Http\Requests;

use App\Models\Staff;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffRequest extends FormRequest
{
    /**
     * Cash Deposit Id
     *
     * @var int|null
     */
    private ?int $staffId;

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
        $uniqueRule = Rule::unique(Staff::class);

        if ($this->staffId) {
            $uniqueRule = $uniqueRule->ignore($this->staffId);
        }

        return [
            'staff_id'            => ['required', 'string', 'max:30'],
            'staff_name'          => ['required', 'string', 'max:100'],
            'staff_mobile_no'     => ['required', 'string', 'max:16'],
            'staff_address'       => ['nullable', 'string', 'max:255'],
            'staff_nid_no'        => ['nullable'],
            'staff_email_address' => ['nullable', 'string', 'lowercase', 'email', 'max:255', $uniqueRule],
            'staff_salary_amount' => ['required', 'string', 'max:100'],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->staffId = $this->route('staff');
    }

}
