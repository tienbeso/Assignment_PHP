@extends('layouts.app')
@section('title', 'Thêm tài khoản')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

            {{-- Header gradient --}}
            <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-5">
                <h3 class="text-white font-bold text-lg">Thông tin tài khoản</h3>
                <p class="text-indigo-100 text-xs mt-1">
                    Trường có dấu <span class="text-red-300">*</span> là bắt buộc
                </p>
            </div>

            {{-- ✨ THÊM: Block lỗi tổng quát --}}
            @if ($errors->any())
                <div class="m-6 mb-0 p-4 bg-red-50 border-l-4 border-red-500">
                    <p class="font-bold text-red-700 mb-1">⚠ Có {{ $errors->count() }} lỗi cần khắc phục:</p>
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bank-accounts.store') }}" method="POST" class="p-6 space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Họ tên --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Họ và tên <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="full_name"
                               value="{{ old('full_name') }}"
                               placeholder="Nguyễn Văn An"
                               class="w-full px-3 py-2.5 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-indigo-200
                                      @error('full_name') border-red-400 bg-red-50 @else border-slate-300 @enderror">
                        @error('full_name')
                        <p class="text-red-500 text-xs mt-1">⚠ {{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Số TK --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Số tài khoản <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="account_number"
                               value="{{ old('account_number') }}"
                               maxlength="10" placeholder="10 chữ số"
                               class="w-full px-3 py-2.5 border rounded-lg text-sm font-mono outline-none focus:ring-2 focus:ring-indigo-200
                                      @error('account_number') border-red-400 bg-red-50 @else border-slate-300 @enderror">
                        @error('account_number')
                        <p class="text-red-500 text-xs mt-1">⚠ {{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="user@example.com"
                               class="w-full px-3 py-2.5 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-indigo-200
                                      @error('email') border-red-400 bg-red-50 @else border-slate-300 @enderror">
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">⚠ {{ $message }}</p>
                        @enderror
                    </div>

                    {{-- SĐT --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Số điện thoại <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="phone"
                               value="{{ old('phone') }}"
                               placeholder="0123456789"
                               class="w-full px-3 py-2.5 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-indigo-200
                                      @error('phone') border-red-400 bg-red-50 @else border-slate-300 @enderror">
                        @error('phone')
                        <p class="text-red-500 text-xs mt-1">⚠ {{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Số dư --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Số dư ban đầu (VNĐ)
                        </label>
                        <input type="number" name="balance"
                               value="{{ old('balance', 0) }}" min="0" step="0.01"
                               class="w-full px-3 py-2.5 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-indigo-200
                                      @error('balance') border-red-400 bg-red-50 @else border-slate-300 @enderror">
                        @error('balance')
                        <p class="text-red-500 text-xs mt-1">⚠ {{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Trạng thái</label>
                        <select name="status"
                                class="w-full px-3 py-2.5 border border-slate-300 rounded-lg text-sm outline-none focus:ring-2 focus:ring-indigo-200 bg-white">
                            <option value="active"   @selected(old('status') === 'active')>Active</option>
                            <option value="inactive" @selected(old('status') === 'inactive')>Inactive</option>
                            <option value="banned"   @selected(old('status') === 'banned')>Banned</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-2 pt-5 border-t">
                    <a href="{{ route('bank-accounts.index') }}"
                       class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium">
                        Hủy
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-semibold shadow">
                        💾 Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
