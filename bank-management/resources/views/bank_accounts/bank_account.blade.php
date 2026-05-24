<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bank Accounts</title>
</head>

<body class="bg-gray-100 p-6">
<div class="flex flex-wrap items-center gap-3 mb-6">
    <a href="{{ route('bank-accounts.create') }}" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
        Thêm tài khoản
    </a>
</div>
<div class="max-w-6xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">Bank Account List</h1>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
            <tr>
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Account Number</th>
                <th class="px-4 py-3">Full Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">Balance</th>
                <th class="px-4 py-3">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bankAccounts as $acc1)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $acc1->id }}</td>
                    <td class="px-4 py-3">{{ $acc1->account_number }}</td>
                    <td class="px-4 py-3">{{ $acc1->full_name }}</td>
                    <td class="px-4 py-3">{{ $acc1->email }}</td>
                    <td class="px-4 py-3">{{ $acc1->phone_number }}</td>

                    <td class="px-4 py-3 text-green-600 font-semibold">
                        {{ number_format($acc1->balance, 0, ',', '.') }} VND
                    </td>

                    <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded text-white text-xs
                                {{ $acc1->status == 'active' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ $acc1->status }}
                            </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination_footer">{{ $bankAccounts->links() }}</div>
    </div>

</div>

</body>
</html>
