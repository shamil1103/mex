<?php

namespace App\Http\Requests;

use App\Models\MobileBankingDeposit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MobileBankingDepositRequest extends FormRequest
{
    /**
     * Cash Deposit Id
     *
     * @var int|null
     */
    private ?int $mobileBankingDepositId;

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
        $uniqueRule = Rule::unique(MobileBankingDeposit::class);

        if ($this->mobileBankingDepositId) {
            $uniqueRule = $uniqueRule->ignore($this->mobileBankingDepositId);
        }

        return [
            'deposit_type'        => ['required', 'string', 'max:30'],
            'deposit_date'        => ['required'],
            'depositor_id'        => ['required', 'string', 'max:20', $uniqueRule],
            'depositor_name'      => ['required', 'string', 'max:100'],
            'depositor_mobile_no' => ['required', 'max:20', $uniqueRule],
            'txid_no'             => ['required', 'max:20', $uniqueRule],
            'depositor_address'   => ['nullable', 'string'],
            'depositor_nid_no'    => ['nullable', 'string', 'max:20', $uniqueRule],
            'deposit_amount'      => ['required', 'numeric'],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->mobileBankingDepositId = $this->route('mobile_banking_deposit');
    }

}
