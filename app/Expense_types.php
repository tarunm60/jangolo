<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense_types extends Model
{
    protected $fillable = [
        'title',
        'description',
        
    ];
}