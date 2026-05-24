@extends('layouts.app')

@section('title', 'Danh sách tài khoản')

@section('content')

    {{-- HEADER TRANG --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-slate-800">Danh sách tài khoản</h3>
            <p class="text-sm text-slate-500 mt-1">
                Tổng: <span class="font-semibold text-indigo-600">{{ $accounts->total() }}</span> tài khoản
            </p>
        </div>
        <a href="{{ route('bank-accounts.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-lg shadow font-medium">
            + Thêm tài khoản
        </a>
    </div>
    <form method="GET" action="{{ route('bank-accounts.index') }}"
          class="bg-white rounded-xl shadow-sm border p-5 mb-6">
        <h4 class="font-semibold text-slate-700 mb-4 pb-3 border-b">🔍 Bộ lọc nâng cao</h4>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase mb-1.5">Tìm kiếm</label>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Tên, email, SĐT..."
                       class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase mb-1.5">Số dư ≥ (VNĐ)</label>
                <input type="number" name="min_balance" value="{{ request('min_balance') }}" min="0"
                       placeholder="VD: 10000000"
                       class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase mb-1.5">Từ ngày</label>
                <input type="date" name="from_date" value="{{ request('from_date') }}"
                       class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase mb-1.5">Đến ngày</label>
                <input type="date" name="to_date" value="{{ request('to_date') }}"
                       class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-5 pt-4 border-t">
            <a href="{{ route('bank-accounts.index') }}"
               class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium">
                ↻ Reset
            </a>
            <button type="submit"
                    class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium shadow">
                🔍 Áp dụng
            </button>
        </div>
    </form>
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-xs uppercase text-slate-600 border-b">
                <tr>
                    <th class="px-4 py-3 text-left">#</th>
                    <th class="px-4 py-3 text-left">Số TK</th>
                    <th class="px-4 py-3 text-left">Họ tên</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">SĐT</th>
                    <th class="px-4 py-3 text-right">Số dư</th>
                    <th class="px-4 py-3 text-center">Trạng thái</th>
                    <th class="px-4 py-3 text-left">Ngày tạo</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                @forelse ($accounts as $acc)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 text-slate-500">{{ $acc->id }}</td>
                        <td class="px-4 py-3 font-mono font-semibold text-indigo-600">{{ $acc->account_number }}</td>
                        <td class="px-4 py-3 font-medium">{{ $acc->full_name }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $acc->email }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $acc->phone }}</td>
                        <td class="px-4 py-3 text-right font-semibold text-emerald-600">
                            {{ number_format((float) $acc->balance, 0, ',', ',') }}đ
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($acc->status === 'active')
                                <span class="bg-emerald-100 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full">Active</span>
                            @elseif($acc->status === 'inactive')
                                <span class="bg-amber-100 text-amber-700 text-xs font-semibold px-2.5 py-1 rounded-full">Inactive</span>
                            @else
                                <span class="bg-red-100 text-red-700 text-xs font-semibold px-2.5 py-1 rounded-full">Banned</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-slate-500">{{ $acc->created_at?->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-12 text-center text-slate-400">
                            <p class="font-medium">Không tìm thấy tài khoản nào</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-4 border-t bg-slate-50">
            {{ $accounts->links() }}
        </div>
    </div>

@endsection
