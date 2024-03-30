<?php

namespace App\Http\Requests;

use App\Models\Staff;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MarketingExpenseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'staff_id'                      => ['required', 'integer', 'min:1', Rule::exists(Staff::class, 'id')],
            'marketing_expense_date'        => ['required'],
            'expense_name'                  => ['required', 'string'],
            'marketing_expense_description' => ['nullable', 'string'],
            'marketing_expense_amount'      => ['required', 'numeric'],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
    }

}
