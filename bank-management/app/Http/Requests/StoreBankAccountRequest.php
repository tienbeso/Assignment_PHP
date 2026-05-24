<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBankAccountRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'digits:10', 'unique:bank_accounts,account_number'],
            'email' => ['required', 'email', 'unique:bank_accounts,email'],
            'phone' => ['required', 'string', 'max:20'],
            'balance' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Họ và tên không được để trống.',
            'account_number.required' => 'Số tài khoản không được để trống.',
            'account_number.digits' => 'Số tài khoản phải là số và có đúng 10 ký tự.',
            'account_number.unique' => 'Số tài khoản đã tồn tại.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'balance.numeric' => 'Số dư phải là số.',
            'balance.min' => 'Số dư phải >= 0.',
        ];
    }
}
