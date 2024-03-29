<?php

namespace App\Http\Requests;

use App\Models\ExpenseCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OfficeExpenseRequest extends FormRequest
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
            'expense_category_id'        => ['required', 'integer', 'min:1', Rule::exists(ExpenseCategory::class, 'id')],
            'expense_date'               => ['required'],
            'expense_name'               => ['required', 'string' ],
            'office_expense_description' => ['nullable', 'string', 'max:255'],
            'office_expense_amount'      => ['required', 'numeric'],
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
