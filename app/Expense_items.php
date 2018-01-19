<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense_items extends Model
{
    protected $fillable = [
        'value',
        'quantity',
        'amount',
        'note',
        'asset',

    ];
}
