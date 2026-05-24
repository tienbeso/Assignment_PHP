<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    /** @use HasFactory<\Database\Factories\BankAccountFactory> */
    use HasFactory;
    protected $fillable = [ 'account_number', 'full_name', 'email',
                            'phone', 'balance', 'status',
    ];
    protected $casts = ['balance' => 'decimal:2',];
}
