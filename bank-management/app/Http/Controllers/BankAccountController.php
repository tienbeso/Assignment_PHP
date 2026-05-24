<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBankAccountRequest;
use App\Models\BankAccount;

class BankAccountController extends Controller
{
    public function index(Request $request){
        $query = BankAccount::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email',   'like', "%{$search}%")
                    ->orWhere('phone',   'like', "%{$search}%");
            });
        }
        if ($request->filled('min_balance')) {
            $query->where('balance', '>=', (float) $request->input('min_balance'));
        }
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->input('from_date'));
        }
        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->input('to_date'));
        }

        $accounts = $query->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('bank_accounts.index', compact('accounts'));
    }
    public function create()
    {
        return view('bank_accounts.create');
    }

    public function store(StoreBankAccountRequest $request)
    {
        BankAccount::create($request->validated());
        return redirect()
            ->route('bank-accounts.index')
            ->with('success', 'Tạo tài khoản thành công!');
    }

}
